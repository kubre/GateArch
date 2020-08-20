<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Student;
use App\TestSeries;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    public function show($id)
    {
        $series = TestSeries::findOrFail($id);
        /** @var Student */
        $user = auth('student')->user();

        if ($series->price == 0) {
            $user
                ->test_series()
                ->syncWithoutDetaching([(int)$id]);
            return redirect(route('students.exams'))
                ->with('message', 'Added Test Series SuccessfullY!');
        }

        $txnId = Str::random(20);
        $key = config('payu.key');
        $salt = config('payu.salt');
        $firstName = explode(' ', $user->name)[0];
        $amount = $series->discounted_price;
        $product = $series->id;
        $hash = "$key|$txnId|$amount|$product|$firstName|{$user->email}|{$user->id}||||||||||$salt";
        $hash = strtolower(hash('sha512', $hash));
        return view('students.purchase.show', [
            'series' => $series,
            'txnId' => $txnId,
            'key' => $key,
            'salt' => $salt,
            'hash' => $hash,
            'product' => $product,
            'amount' => $amount,
            'firstName' => $firstName,
            'user' => $user,
        ]);
    }

    public function success(Request $request)
    {
        abort_unless($this->isValidPaymentRequest($request), Response::HTTP_FORBIDDEN);
        Auth::loginUsingId($request->udf1);

        $data = $this->mapRequestToTransaction($request);

        if ($data['status'] == 'success') {
            Student::findOrFail((int)$data['student_id'])
                ->test_series()
                ->syncWithoutDetaching([$data['test_series_id']]);
        }

        return view('students.purchase.success', [
            'transaction' => $this->makeTransaction($data),
        ]);
    }

    public function failure(Request $request)
    {
        abort_unless($this->isValidPaymentRequest($request), Response::HTTP_FORBIDDEN);
        Auth::loginUsingId($request->udf1);

        $data = $this->mapRequestToTransaction($request);
        $data['admin_comment'] = $request->field9;
        return view('students.purchase.failure', [
            'transaction' => $this->makeTransaction($data),
        ]);
    }

    public function isValidPaymentRequest(Request $request)
    {
        $key = config('payu.key');
        $salt = config('payu.salt');
        $retHashSeq = "$salt|{$request->status}||||||||||{$request->udf1}|{$request->email}|{$request->firstname}|{$request->productinfo}|{$request->amount}|{$request->txnid}|$key";
        $hash = hash('sha512', $retHashSeq);
        return $hash == $request->hash;
    }

    public function mapRequestToTransaction(Request $request)
    {
        return [
            'student_id' => $request->udf1,
            'test_series_id' => $request->productinfo,
            'txn_id' => $request->txnid,
            'payu_id' => $request->payuMoneyId,
            'bank_ref_num' => $request->bank_ref_num,
            'mode' => $request->mode,
            'amount' => $request->amount,
            'status' => $request->status,
        ];
    }

    public function makeTransaction($data): Transaction
    {
        $transaction = Transaction::where('student_id', (int)$data['student_id'])
            ->where('test_series_id', (int)$data['test_series_id'])
            ->where('status', $data['status'])
            ->first();
        if (!$transaction)
            $transaction = Transaction::create($data);
        return $transaction;
    }
}

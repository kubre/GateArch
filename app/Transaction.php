<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'student_id', 'test_series_id', 'amount', 'txn_id',
        'payu_id',  'bank_ref_num', 'mode', 'status',
        'student_comment', 'admin_comment',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function test_series()
    {
        return $this->belongsTo(TestSeries::class);
    }
}

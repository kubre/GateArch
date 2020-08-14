<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')->constrained();
            $table->foreignId('test_series_id')->constrained();
            $table->unsignedInteger('amount');
            $table->string('txn_id');
            $table->string('payu_id');
            $table->string('bank_ref_num')->nullable()->default(null);
            $table->string('mode')->nullable()->default(null);
            $table->string('status');
            $table->string('student_comment')->nullable()->default(null);
            $table->string('admin_comment')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}

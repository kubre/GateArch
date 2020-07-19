<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('txn_id', 30);
            $table->string('payu_money_id', 20);
            $table->string('payu_mode', 2);
            $table->string('payu_status', 30);
            $table->foreignId('student_id')->constrained();
            $table->unsignedInteger('amount');
            $table->timestamp('successful_at')->nullable();
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
        Schema::dropIfExists('payments');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDiscountDescriptionToTestSeries extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_series', function (Blueprint $table) {
            $table->decimal('discount', 5, 2);
            $table->mediumText('description');
            $table->date('start_date')->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test_series', function (Blueprint $table) {
            $table->dropColumn([
                'discount',
                'description',
                'start_date'
            ]);
        });
    }
}

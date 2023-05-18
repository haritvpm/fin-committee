<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ex_members', function (Blueprint $table) {
            $table->decimal('actual_amount_paid', 15, 2)->nullable();
            $table->string('amount_words');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ex_members', function (Blueprint $table) {
            //
        });
    }
};

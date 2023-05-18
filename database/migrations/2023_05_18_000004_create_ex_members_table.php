<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExMembersTable extends Migration
{
    public function up()
    {
        Schema::create('ex_members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('index')->unique();
            $table->string('name');
            $table->longText('address');
            $table->string('place');
            $table->string('district');
            $table->decimal('distance_oneside', 15, 2);
            $table->decimal('ta_calculated', 15, 2)->nullable();
            $table->decimal('ta_eligible', 15, 2)->nullable();
            $table->decimal('honorarium', 15, 2)->nullable();
            $table->decimal('amount_payable', 15, 2)->nullable();
            $table->boolean('amount_paid')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

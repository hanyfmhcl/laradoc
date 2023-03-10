<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersManagementsTable extends Migration
{
    public function up()
    {
        Schema::create('members_managements', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hajji_no');
            $table->string('national_id_card_no');
            $table->string('full_name');
            $table->integer('phone_number');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}

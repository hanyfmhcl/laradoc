<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocMembersManagementPivotTable extends Migration
{
    public function up()
    {
        Schema::create('doc_members_management', function (Blueprint $table) {
            $table->unsignedBigInteger('doc_id');
            $table->foreign('doc_id', 'doc_id_fk_8149858')->references('id')->on('docs')->onDelete('cascade');
            $table->unsignedBigInteger('members_management_id');
            $table->foreign('members_management_id', 'members_management_id_fk_8149858')->references('id')->on('members_managements')->onDelete('cascade');
        });
    }
}

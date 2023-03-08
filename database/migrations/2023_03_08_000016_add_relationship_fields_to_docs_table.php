<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDocsTable extends Migration
{
    public function up()
    {
        Schema::table('docs', function (Blueprint $table) {
            $table->unsignedBigInteger('doc_type_id')->nullable();
            $table->foreign('doc_type_id', 'doc_type_fk_8149810')->references('id')->on('documents');
        });
    }
}

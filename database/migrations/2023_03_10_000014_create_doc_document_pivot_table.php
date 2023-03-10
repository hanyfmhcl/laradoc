<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocDocumentPivotTable extends Migration
{
    public function up()
    {
        Schema::create('doc_document', function (Blueprint $table) {
            $table->unsignedBigInteger('doc_id');
            $table->foreign('doc_id', 'doc_id_fk_8161535')->references('id')->on('docs')->onDelete('cascade');
            $table->unsignedBigInteger('document_id');
            $table->foreign('document_id', 'document_id_fk_8161535')->references('id')->on('documents')->onDelete('cascade');
        });
    }
}

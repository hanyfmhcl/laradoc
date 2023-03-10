<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocTripPivotTable extends Migration
{
    public function up()
    {
        Schema::create('doc_trip', function (Blueprint $table) {
            $table->unsignedBigInteger('doc_id');
            $table->foreign('doc_id', 'doc_id_fk_8161606')->references('id')->on('docs')->onDelete('cascade');
            $table->unsignedBigInteger('trip_id');
            $table->foreign('trip_id', 'trip_id_fk_8161606')->references('id')->on('trips')->onDelete('cascade');
        });
    }
}

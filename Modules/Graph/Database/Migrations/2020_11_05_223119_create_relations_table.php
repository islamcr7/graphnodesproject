<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationsTable extends Migration
{
   
    public function up()
    {
        Schema::create('Relations', function (Blueprint $table) {
         
            $table->bigInteger('graph_id')->unsigned();
            $table->bigInteger('parent_id')->unsigned();
            $table->foreign('parent_id')->references('node_id')->on('nodes')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('child_id')->unsigned();
            $table->foreign('child_id')->references('node_id')->on('nodes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('graph_id')->references('graph_id')->on('graphs')->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['graph_id','parent_id', 'child_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Relations');
    }
}

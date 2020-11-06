<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    protected $primaryKey = ['node_id'];
    public function up()
    {
       
        Schema::create('nodes', function (Blueprint $table) {
            $table->id('node_id');
            $table->bigInteger('node_num')->nullable();
            $table->bigInteger('graph_id')->unsigned();
            $table->foreign('graph_id')->references('graph_id')->on('graphs')->onUpdate('cascade')->onDelete('cascade');
         
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nodes');
    }
}

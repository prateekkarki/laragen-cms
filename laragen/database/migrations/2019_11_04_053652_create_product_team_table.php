<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTeamTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('product_team', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger("product_id")->unsigned()->nullable();
            $table->foreign("product_id")->references("id")->on("products")->onDelete("set null");
            $table->bigInteger("team_id")->unsigned()->nullable();
            $table->foreign("team_id")->references("id")->on("extras")->onDelete("set null");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('product_team');
    }
}

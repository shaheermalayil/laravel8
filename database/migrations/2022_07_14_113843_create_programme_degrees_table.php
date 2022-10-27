<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammeDegreesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('programme_degrees', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('graduation_id');
                $table->string('degree_name', 20);
                $table->boolean('status')->default(1);
                $table->integer('created_by');
                $table->integer('updated_by')->nullable();
                $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('programme_degrees');
    }
}

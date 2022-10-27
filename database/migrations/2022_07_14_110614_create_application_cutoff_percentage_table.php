<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationCutoffPercentageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('application_cutoff_percentage', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('course_id');
                $table->integer('quota_id');
                $table->integer('qualifying_exam_id');
                $table->float('percentage');
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
        Schema::dropIfExists('application_cutoff_percentage');
    }
}

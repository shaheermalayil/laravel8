<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColoumnsToCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::table('courses', function (Blueprint $table) {
                $table->integer('degree_id')->nullable();
                $table->string('stream', 50)->nullable();
                $table->boolean('paper_display')->default(1);
                $table->boolean('attendance_display')->default(1);
                $table->boolean('assessment_display')->default(1);
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses', function (Blueprint $table) {
            //
        });
    }
}

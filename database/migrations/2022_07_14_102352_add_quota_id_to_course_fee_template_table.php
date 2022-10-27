<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class AddQuotaIdToCourseFeeTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

                Schema::table('course_fee_template', function (Blueprint $table) {
                    $table->integer('quota_id')->after('adm_year_id')->default(0);
                    $table->integer('stage')->after('amount')->default(1);
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_fee_template', function (Blueprint $table) {
            //
        });
    }
}

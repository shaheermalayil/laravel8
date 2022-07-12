<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Repositories\TableConfig;

class AddLastExamDateToCourseCertificate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $db_data = TableConfig::getTableConfig();
        foreach ($db_data as $db) {
            $table = 'course_certificate';
            $table_name = $db->dbName . '.' . $table;

            if ($db->institution_id > 14 || $db->institution_id == 0) {
                Schema::table($table_name, function (Blueprint $table) {
                    $table->date('last_exam_date')->after('fee_details_json')->nullable();
                });
            }
        } 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_certificate', function (Blueprint $table) {
            //
        });
    }
}

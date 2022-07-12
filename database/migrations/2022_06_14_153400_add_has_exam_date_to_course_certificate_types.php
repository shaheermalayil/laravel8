<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Repositories\TableConfig;

class AddHasExamDateToCourseCertificateTypes extends Migration
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
            $table = 'course_certificate_types';
            $table_name = $db->dbName . '.' . $table;

            Schema::table($table_name, function (Blueprint $table) {
                $table->integer('has_exam_date')->default(0)->after('authority_display_name');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('course_certificate_types', function (Blueprint $table) {
            //
        });
    }
}

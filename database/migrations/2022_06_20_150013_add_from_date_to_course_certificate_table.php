<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Repositories\TableConfig;

class AddFromDateToCourseCertificateTable extends Migration
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
            if($db->institution_id > 175 || $db->institution_id == 0){

            Schema::table($table_name, function (Blueprint $table) {
                $table->date('from_date')->nullable();
                $table->date('to_date')->after('from_date')->nullable();
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

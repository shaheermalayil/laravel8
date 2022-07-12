<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Repositories\TableConfig;


class DropIndexUidNumberFromStudentTable extends Migration
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

            $table = 'student';
            $table_name = $db->dbName . '.' . $table;
            if ($db->institution_id > 51 || $db->institution_id == 0) {

                Schema::table($table_name, function (Blueprint $table) {
                    $table->dropIndex('uid_number');
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
        Schema::table('student', function (Blueprint $table) {
            //
        });
    }
}

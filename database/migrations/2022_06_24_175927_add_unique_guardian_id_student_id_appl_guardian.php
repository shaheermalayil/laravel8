<?php

use App\Repositories\TableConfig;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueGuardianIdStudentIdApplGuardian extends Migration
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
            if ($db->institution_id > 125 || $db->institution_id == 0 ) {
                $table = 'appl_student_guardian';
                $table_name = $db->dbName . '.' . $table;
                Schema::table($table_name, function (Blueprint $table) {
                    $table->unique(['student_id', 'guardian_id'], 'unique_guardian_id_student_id');
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
        Schema::table('appl_student_guardian', function (Blueprint $table) {
            //
        });
    }
}

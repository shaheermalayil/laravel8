<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Repositories\TableConfig;


class AddIsAntiDowryToApplStudentTable extends Migration
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

            $table = 'appl_student';
            $table_name = $db->dbName . '.' . $table;

            if ($db->institution_id > 14 ||  $db->institution_id == 0) {
                Schema::table($table_name, function (Blueprint $table) {
                    $table->boolean('is_anti_dowry')->default(0)->after('ration_details');
                    $table->string('is_anti_ragging')->after('is_anti_dowry')->nullable();
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
        Schema::table('appl_student', function (Blueprint $table) {
            //
        });
    }
}

<?php

use App\Repositories\TableConfig;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataCloumnToUpdatePapersLogTable extends Migration
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

            if ($db->institution_id > 180 || $db->institution_id == 0) {
                $table = 'update_papers_log';
                $table_name = $db->dbName . '.' . $table;
                Schema::table($table_name, function (Blueprint $table) {
                    $table->text('data')->nullable();
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
        Schema::table('update_papers_log', function (Blueprint $table) {
            //
        });
    }
}

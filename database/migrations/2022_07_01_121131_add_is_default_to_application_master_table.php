<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Repositories\TableConfig;

class AddIsDefaultToApplicationMasterTable extends Migration
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

            $table = 'application_master';
            $table_name = $db->dbName . '.' . $table;
            if ($db->institution_id != 186) {


                Schema::table($table_name, function (Blueprint $table) {
                    $table->integer('is_default')->default(0)->after('display_order');
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
        Schema::table('application_master', function (Blueprint $table) {
            //
        });
    }
}

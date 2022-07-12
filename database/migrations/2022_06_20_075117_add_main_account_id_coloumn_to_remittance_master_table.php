<?php

use App\Repositories\TableConfig;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMainAccountIdColoumnToRemittanceMasterTable extends Migration
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
            $table = 'remittance_master';
            $table_name = $db->dbName . '.' . $table;

            if ($db->institution_id > 173 || $db->institution_id == 0) {

                Schema::table($table_name, function (Blueprint $table) {
                    $table->integer('main_account_id')->after('ledger_id')->nullable();
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
        Schema::table('remittance_master', function (Blueprint $table) {
            //
        });
    }
}

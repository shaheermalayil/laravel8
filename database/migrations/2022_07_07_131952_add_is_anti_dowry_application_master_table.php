<?php

use App\Repositories\TableConfig;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;

class AddIsAntiDowryApplicationMasterTable extends Migration
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
            
            DB::table($table_name)->insert(
                array(
                    [
                        'id' => 19,
                        'sections' => 'Other Details',
                        'status' => 1,
                        'is_skibble' => 1,
                        'display_order' => 16,
                        'is_default' => 0,
                        'created_by' => 1001,
                        'created_at' => Carbon::now(),
                    ],

                )
            );
        }

    }
}

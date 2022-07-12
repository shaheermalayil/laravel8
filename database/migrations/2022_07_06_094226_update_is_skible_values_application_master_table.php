<?php

use App\Repositories\TableConfig;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class UpdateIsSkibleValuesApplicationMasterTable extends Migration
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

            $data = DB::table($table_name)
                ->get();

            foreach ($data as $dat) {
                $application = DB::table($table_name)
                    ->where('is_default', 1)
                    ->update([
                        'is_skibble' => 0,
                    ]);
            }
        }
    }
}

<?php

use App\Repositories\TableConfig;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AddAssetRequestIdToAssetRequestOrderTable extends Migration
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
            $table = 'asset_request_order';
            $table_name = $db->dbName . '.' . $table;

        Schema::table($table_name, function (Blueprint $table) {
            $table->Integer('asset_request_id')->after('item_id');
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
        Schema::table('asset_request_order', function (Blueprint $table) {
            //
        });
    }
}

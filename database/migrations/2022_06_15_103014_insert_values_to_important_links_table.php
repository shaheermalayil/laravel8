<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Repositories\TableConfig;
use Carbon\Carbon;

class InsertValuesToImportantLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $now = carbon::now();

        $db_data = TableConfig::getTableConfig();
        foreach ($db_data as $db) {
            $table = 'important_link_categories';
            $table_name = $db->dbName . '.' . $table;

            $table1 = 'important_links';
            $table_name1 = $db->dbName . '.' . $table1;

            $category = DB::table($table_name)
            ->insertGetId(
                [
                    'name' => 'Study Material',
                    'created_by' => 1001,
                    'status' => 1,
                    'created_at' => $now,
                ]
            );

            $data = DB::table($table_name1)
            ->insertGetId(
                [
                    'link_name' => 'Study Material',
                    'url' => 'https://epgp.inflibnet.ac.in/',
                    'display_order' => 4,
                    'important_link_category_id' => $category,
                    'created_by' => 1001,
                    'status' => 1,
                    'created_at' => $now,
                ]
            );
        }
    }

}

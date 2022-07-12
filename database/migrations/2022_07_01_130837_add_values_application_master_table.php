<?php

use App\Repositories\TableConfig;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;

class AddValuesApplicationMasterTable extends Migration
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
                DB::table($table_name)
                    ->delete();

                DB::table($table_name)->insert(
                    array(
                        [
                            'id' => 1,
                            'sections' => 'Course details',
                            'status' => 1,
                            'is_skibble' => 0,
                            'display_order' => 0,
                            'is_default' => 1,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 2,
                            'sections' => 'Personal details',
                            'status' => 1,
                            'is_skibble' => 1,
                            'display_order' => 0,
                            'is_default' => 1,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 3,
                            'sections' => 'National unique id',
                            'status' => 1,
                            'is_skibble' => 0,
                            'display_order' => 1,
                            'is_default' => 0,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 4,
                            'sections' => 'Guardian Details',
                            'status' => 1,
                            'is_skibble' => 1,
                            'display_order' => 2,
                            'is_default' => 0,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 5,
                            'sections' => 'CAP registration',
                            'status' => 1,
                            'is_skibble' => 1,
                            'display_order' => 3,
                            'is_default' => 0,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 6,
                            'sections' => 'Last studied info',
                            'status' => 1,
                            'is_skibble' => 0,
                            'display_order' => 4,
                            'is_default' => 0,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 7,
                            'sections' => 'Add your photo',
                            'status' => 1,
                            'is_skibble' => 0,
                            'display_order' => 5,
                            'is_default' => 0,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 8,
                            'sections' => 'Add your signature',
                            'status' => 1,
                            'is_skibble' => 0,
                            'display_order' => 6,
                            'is_default' => 0,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 9,
                            'sections' => 'Marks',
                            'status' => 1,
                            'is_skibble' => 0,
                            'display_order' => 7,
                            'is_default' => 0,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 10,
                            'sections' => 'Attachments',
                            'status' => 1,
                            'is_skibble' => 0,
                            'display_order' => 8,
                            'is_default' => 0,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 11,
                            'sections' => 'Payment',
                            'status' => 1,
                            'is_skibble' => 1,
                            'display_order' => 9,
                            'is_default' => 0,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 12,
                            'sections' => 'Declarations',
                            'status' => 1,
                            'is_skibble' => 0,
                            'display_order' => 100,
                            'is_default' => 1,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 13,
                            'sections' => 'Reference',
                            'status' => 1,
                            'is_skibble' => 1,
                            'display_order' => 10,
                            'is_default' => 1,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 14,
                            'sections' => 'Differently Abled',
                            'status' => 1,
                            'is_skibble' => 1,
                            'display_order' => 11,
                            'is_default' => 0,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 15,
                            'sections' => 'Birth Details',
                            'status' => 1,
                            'is_skibble' => 1,
                            'display_order' => 12,
                            'is_default' => 0,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 16,
                            'sections' => 'Physique Details',
                            'status' => 1,
                            'is_skibble' => 1,
                            'display_order' => 13,
                            'is_default' => 0,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 17,
                            'sections' => 'Ration Card Details',
                            'status' => 1,
                            'is_skibble' => 1,
                            'display_order' => 14,
                            'is_default' => 0,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],
                        [
                            'id' => 18,
                            'sections' => ' Co Curricular Details',
                            'status' => 1,
                            'is_skibble' => 1,
                            'display_order' => 15,
                            'is_default' => 0,
                            'created_by' => 1001,
                            'created_at' => Carbon::now(),
                        ],


                    )
                );
            }
        }
    }
}

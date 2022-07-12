<?php

use App\Repositories\TableConfig;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDayOrderIdToTimetableTimeslots extends Migration
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
            $table = 'timetable_timeslots';
            $table_name = $db->dbName . '.' . $table;

            Schema::table($table_name, function (Blueprint $table) {
                $table->integer('day_order_id')->after('display_order');
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
        Schema::table('timetable_timeslots', function (Blueprint $table) {
            //
        });
    }
}

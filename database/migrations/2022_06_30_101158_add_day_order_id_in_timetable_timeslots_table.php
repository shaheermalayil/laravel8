<?php

use App\Repositories\TableConfig;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDayOrderIdInTimetableTimeslotsTable extends Migration
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
            
            $table = 'timetable_dayorder';
            $table_name = $db->dbName . '.' . $table;

            $table1 = 'timetable_timeslots';
            $table_name1 = $db->dbName . '.' . $table1;


            $data = DB::table($table_name)
                ->select('id', 'name')
                ->get();

            foreach ($data as $dat) {
                $book = DB::table($table_name1)
                    ->where('day', $dat->name)
                    ->update([
                        'day_order_id' => $dat->id,
                    ]);
            }
        }
    }
}

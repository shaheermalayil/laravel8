<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Repositories\TableConfig;

class CreateStudentLogTable extends Migration
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
            if($db->institution_id > 125) {
            $table = 'student_log';
            $table_name = $db->dbName . '.' . $table;
            Schema::create($table_name, function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('operation')->default(-1);
                $table->string('message');
                $table->integer('fk_table_id');
                $table->integer('table_type_id');
                $table->integer('created_by');
                $table->timestamp('created_at');
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
        Schema::dropIfExists('student_log');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Repositories\TableConfig;

class CreateCertificateCourseTable extends Migration
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
            $table = 'certificate_course';
            $table_name = $db->dbName . '.' . $table;

        Schema::create($table_name , function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('course_name');
            $table->integer('dep_id');
            $table->date('from_date');
            $table->date('to_date');
            $table->integer('hours');
            $table->integer('intake');
            $table->integer('coordinator');
            $table->integer('status')->default(1);
            $table->Integer('created_by');
            $table->Integer('updated_by')->nullable();
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
   
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
        Schema::dropIfExists('certificate_course');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Repositories\TableConfig;

class CreatePaperGroupTable extends Migration
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
            $table = 'paper_group';
            $table_name = $db->dbName . '.' . $table;

            Schema::create($table_name, function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('group_name');
                $table->integer('paper_id');
                $table->integer('faculty_id');
                $table->integer('status')->default(1);
                $table->integer('created_by');
                $table->integer('updated_by')->nullable();
                $table->timestamps();
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
        Schema::dropIfExists('paper_group');
    }
}

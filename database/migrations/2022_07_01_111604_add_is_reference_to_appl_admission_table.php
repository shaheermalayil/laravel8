<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Repositories\TableConfig;

class AddIsReferenceToApplAdmissionTable extends Migration
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

            $table = 'appl_admission';
            $table_name = $db->dbName . '.' . $table;

            if ($db->institution_id != 186) {

                Schema::table($table_name, function (Blueprint $table) {
                    $table->integer('is_reference')->default(0);//->after('progress_bar');
                    $table->string('reference')->after('is_reference')->nullable();
                    $table->integer('ncc')->default(0)->after('reference');
                    $table->string('grade')->after('ncc')->nullable();
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
        Schema::table('appl_admission', function (Blueprint $table) {
            //
        });
    }
}

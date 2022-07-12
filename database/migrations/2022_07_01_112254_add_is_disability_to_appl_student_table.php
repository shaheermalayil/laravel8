<?php

use App\Repositories\TableConfig;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsDisabilityToApplStudentTable extends Migration
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

            $table = 'appl_student';
            $table_name = $db->dbName . '.' . $table;

            if ($db->institution_id != 186 && $db->institution_id > 14) {

                Schema::table($table_name, function (Blueprint $table) {
                    $table->integer('is_disability')->default(0);//->after('guardian_relation_id');
                    $table->integer('disability_type_id')->after('is_disability')->nullable();
                    $table->decimal('percentage', 8, 2)->after('disability_type_id')->nullable();
                    $table->string('certificate_number')->after('percentage')->nullable();
                    $table->integer('country_id')->after('certificate_number')->nullable();
                    $table->integer('state_id')->after('country_id')->nullable();
                    $table->string('place')->after('state_id')->nullable();
                    $table->string('height')->after('place')->nullable();
                    $table->string('weight')->after('height')->nullable();
                    $table->string('ration_details')->after('weight')->nullable();
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
        Schema::table('appl_student', function (Blueprint $table) {
            //
        });
    }
}

<?php

use App\Repositories\TableConfig;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUniqueUserIdUserTypeUsersTable extends Migration
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
            $table = 'users';
            $table_name = $db->dbName . '.' . $table;

            if($db->institution_id > 165 || $db->institution_id == 0 ){
            Schema::table($table_name, function (Blueprint $table) {
                $table->unique(['user_type', 'user_id'], 'unique_user_id_user_type');
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
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}

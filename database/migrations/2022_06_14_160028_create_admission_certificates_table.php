<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Repositories\TableConfig;
class CreateAdmissionCertificatesTable extends Migration
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
            $table = 'admission_certificates';
            $table_name = $db->dbName . '.' . $table;

            Schema::create($table_name, function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->integer('graduation_id');
                $table->integer('digi_document_id');
                $table->integer('is_mandatory')->default(0);
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
        Schema::dropIfExists('admission_certificates');
    }
}

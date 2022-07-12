<?php

use App\Repositories\TableConfig;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetQuotationTable extends Migration
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
            $table = 'asset_quotation';
            $table_name = $db->dbName . '.' . $table;

            if ($db->institution_id > 163 || $db->institution_id == 0 ) {
                Schema::create($table_name, function (Blueprint $table) {
                    $table->bigIncrements('id');
                    $table->bigInteger('purchase_order_id')->unsigned();
                    // $table->foreign('purchase_order_id')->references('id')->on('purchase_order');
                    $table->string('quotations');
                    $table->date('date');
                    $table->string('code');
                    $table->string('remarks')->nullable();
                    $table->string('attachment')->nullable();
                    $table->Integer('status')->default(1);
                    $table->Integer('created_by');
                    $table->Integer('updated_by')->nullable();
                    $table->timestamp('created_at');
                    $table->timestamp('updated_at')->nullable();
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
        Schema::dropIfExists('asset_quotation');
    }
}

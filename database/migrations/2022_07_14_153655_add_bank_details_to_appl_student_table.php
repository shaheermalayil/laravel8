<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBankDetailsToApplStudentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                Schema::table('appl_student', function (Blueprint $table) {
                    $table->string('bank_name')->after('is_anti_ragging')->nullable();
                    $table->string('bank_account_number')->after('bank_name')->nullable();
                    $table->string('ifsc_code')->after('bank_account_number')->nullable();
                });
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

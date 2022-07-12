<?php

use App\Repositories\TableConfig;
use Illuminate\Database\Migrations\Migration;

class ChangeValueCertificateTypeIdInCourseCertificateTable extends Migration
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
            if ($db->institution_id > 129) {
                $table = 'course_certificate';
                $table_name = $db->dbName . '.' . $table;

                $data = DB::table($table_name)
                    ->select('id', 'certificate_type', 'certificate_type_id')
                    ->get();

                foreach ($data as $dat) {
                    $certificate_type_id = $dat->certificate_type_id;

                    if ($dat->certificate_type == 'Course') {
                        $certificate_type_id = 1;
                    } elseif ($dat->certificate_type == 'Bona fide') {
                        $certificate_type_id = 2;
                    }

                    DB::table($table_name)
                        ->where('id', $dat->id)
                        ->update([
                            'certificate_type_id' => $certificate_type_id,
                        ]);
                }
            }
        }
    }

}

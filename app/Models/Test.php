<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Test extends Model
{
    use HasFactory;

    //protected $table = 'bdcuser.app_user_login';
    

    public function getUpcomingTest($registration_id)
    {
        try {
            $sql = "select * from bdcuser.app_user_std_test where registration_id = '" . $registration_id . "' 
            order by test_date , test_time";

                
            return DB::connection('oracle')->select($sql);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getHistoryTest($registration_id)
    {
        try {
            $sql = "select * from bdcuser.app_user_std_test_hist where registration_id = '" . $registration_id . "' 
            order by test_date , test_time";

                
            return DB::connection('oracle')->select($sql);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}

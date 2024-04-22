<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Training extends Model
{
    public function getUpcomingTraining($registration_id)
    {
        try {
            $sql = "select * from bdcuser.app_user_std_training where registration_id = '" . $registration_id . "' 
            order by training_date , training_time";

                
            return DB::connection('oracle')->select($sql);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getHistoryTraining($registration_id)
    {
        try {
            $sql = "select * from bdcuser.app_user_std_training_hist where registration_id = '" . $registration_id . "' 
            order by training_date , training_time";

                
            return DB::connection('oracle')->select($sql);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

}

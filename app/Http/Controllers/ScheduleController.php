<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
            return view('schedule.index');

    }

    public function search(Request $request)
    {
        $reg_num = $request->input('reg_num');
        $schedule = Schedule::where('regnnumb',$reg_num)->get();
        return response()->json(['schedule'=>$schedule]);
    }

    public function store(Request $request){
        $schedule = Schedule::where('regnnumb', $request->regnnumb)->first();

        if($request->has('time')){
            $training_time = $request->time;
        }else{
            $training_time = $schedule->starttime;
        }
        
        if (is_null($schedule)) {
            $response = "Wrong Student ID or Student Don't Have Class Today, Please Check!!";
            return view('schedule.index',compact('response'));    

          }else{
            
            $currentDateTime = new DateTime();

            // Add 4 hours to the current date and time
            $currentDateTime->modify('+4 hours');
    
            // Format the modified date and time as per your requirement
            $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
    
            $currentDateTime = date('Y-m-d H:i:s');
    
            if($request->status == 'present')
            {
                $flag = 'P';
                $check_type = 'OUT';
            }
            else{
                $flag = 'A';
                $check_type = 'ABS';
            }
    
            $jsonData = '{
                "registration_id": "'.$request->regnnumb.'",
                "sb_no": "'.$schedule->sbno.'",
                "location_code": "006",
                "attendance_flag": "'.$flag.'",
                "training_time": "'.$training_time.'",
                "check_time": "'.$formattedDateTime.'",
                "check_type": "'.$check_type.'",
                "class_mode": "E",
                "image_path": "images",
                "operation_type": "M"
            }';
    
            $ch = curl_init(); 
            curl_setopt($ch, CURLOPT_URL, "https://api.bdc.ae/attendance-app/api/app/student/session"); 
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json'
            )); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);   
            curl_setopt($ch, CURLOPT_POST, 1); 
            curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    
            $output = json_decode(curl_exec($ch)); 
            $response = $output->message;
            return view('schedule.index',compact('response'));

          }
          
        

    }
}

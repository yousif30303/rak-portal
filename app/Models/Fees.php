<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fees extends Model
{

    public function getPendingFees($registration_id)
    {
        try {
            $sql = "select fs.REGNNUMB ,fs.locncode , loc.locnname as branch ,fs.feescode||'-'||FS.SERIALNO as fees_code 
            ,(select engdescr from ERPRAK.trcodmas  where HARDCODE = 'FCD' and SOFTCODE = fs.feescode) as fees_name
            ,nvl(FS.PAIDAMNT,0) - nvl(fs.RFNDAMNT,0) as fsAmount  
            ,( nvl(fs.PAIDAMNT,0)+ nvl(fs.VATPAMNT,0)  -  (  nvl(fs.DISCAMNT,0)  +nvl(fs.RFNDAMNT,0) ) )  as fees_paid_amount,
            ( BDCUSER.DFN_GetAmountWithVat('100',fs.feescode,(nvl(fs.newfsamt,0)+nvl(fs.RFNDAMNT,0)) - (nvl(fs.paidamnt,0) - nvl(fs.DISCAMNT,0) ),'O') ) as fees_pending_amount 
            from ERPRAK.TRSTDFES fs ,ORBBDC.trbrnmas loc 
            where fs.compcode = '100' and loc.locncode = fs.locncode and fs.REGNNUMB =  '". $registration_id ."'order by FS.CREADATE desc";

                
            return DB::connection('oracle')->select($sql);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function getPaidFees($registration_id)
    {
        try {
            $sql = "select REGNNUMB ,  branch , fsCode , fsName , fsDate ,fsAmount , fsPaidAmount , fsPendAmount
            from bdcuser.app_user_std_fees_hist fs where fs.REGNNUMB = '" . $registration_id . "'";

                
            return DB::connection('oracle')->select($sql);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

}

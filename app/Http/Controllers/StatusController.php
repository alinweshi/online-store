<?php

namespace App\Http\Controllers;

use App\Models\UserStatus;
use App\Jobs\ChangeUserStatus;

class StatusController extends Controller
{
    public function changestatus()
    {
        // $user_status=UserStatus::where('status','0');
        // $user_status->update(['status'=>'1']);
        // return 'users status changed';

        // $UserStatus = UserStatus::where('status', 1)->get();
        // foreach ($UserStatus as $Status) {
        //     // $Status->update(['status'=>0]);
        // }            return$UserStatus;

        ChangeUserStatus::dispatch();
        return 'users status changed';
    }
}

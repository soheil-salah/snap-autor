<?php

namespace App\Modules\Admins\Http\Controllers\Users\Ajax;

use App\Http\Controllers\Controller;
use App\Mail\Admin\UserAccountBannedMail;
use App\Models\Users\User;
use App\Models\Users\UserBan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BanUserController extends Controller
{
    public function ban(Request $request)
    {
        $from = null;
        $to = null;
        $duration_amount = null;
        $duration = null;
        $isExtended = false;

        if($request->ban_type == 'duration'){

            if($request->pick_duration == 'minute'){

                $request->validate([
                    'amount' => ['numeric', 'min:5'],
                ],[
                    'amount' => 'The duration must not be less than 5 minutes'
                ]);
            }

            $duration_amount = $request->amount;
            $duration = $request->pick_duration;
        }                
        
        if($request->ban_type == 'daterange'){

            $from = Carbon::createFromFormat('m/d/Y', explode(' - ', $request->daterange)[0])->now()->format('Y-m-d h:i:s');
            $to = Carbon::createFromFormat('m/d/Y', explode(' - ', $request->daterange)[1])->endOfDay()->format('Y-m-d h:i:s');
        }

        UserBan::updateOrCreate(['user_id' => $request->user_id],[
            'user_id' => $request->user_id,
            'ban_type' => $request->ban_type,
            'from' => $from,
            'to' => $to,
            'duration_amount' => $duration_amount,
            'duration' => $duration,
            'forever' => $request->ban_type == 'forever' ? 1 : 0,
        ]);

        $user = User::where('id', $request->user_id)->first();

        Mail::to($user->email)->send(new UserAccountBannedMail($user));
    }
}

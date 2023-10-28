<?php

namespace App\Modules\Admins\Http\Controllers\Users\Ajax;

use App\Http\Controllers\Controller;
use App\Mail\Admin\UserWelcomeMail;
use App\Models\Users\User;
use App\Models\Users\UserRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Modules\Admins\Http\Requests\UsersRequests\StoreUserRequest;

class CreateUserController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreUserRequest $request)
    {
        $user = User::create([
            'firstname' => $request->fname,
            'lastname' => $request->lname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'slug' => md5(uniqid())
        ]);

        UserRole::firstOrCreate(['user_id' => $user->id],[
            'user_id' => $user->id,
            'role_id' => 1

        ]);

        $password = $request->password;

        Mail::to($user->email)->send(new UserWelcomeMail($user, $password));
    }
}

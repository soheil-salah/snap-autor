<?php

namespace App\Modules\Admins\Http\Controllers\Users\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Users\User;
use App\Models\Users\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UpdateUserController extends Controller
{
    private $user_id, $user;

    public function __construct(Request $request)
    {
        $this->user_id = $request->input('user_id');
        $this->user = User::where('id', $this->user_id)->first();
    }

    public function update(Request $request)
    {
        $request->validate([
            'fname' => ['required', 'string', 'max:255', 'min:3'],
            'lname' => ['required', 'string', 'max:255', 'min:3'],
            'email' => ['required', 'string', 'max:255', 'email', 'unique:users,email,'.$this->user->id],
        ]);

        $this->user->update([
            'firstname' => $request->fname,
            'lastname' => $request->lname,
            'email' => $request->email,
        ]);
    }

    public function updatePersonalInfo(Request $request)
    {
        $request->validate([
            'phone' => ['nullable', 'numeric'],
        ]);

        UserInfo::updateOrCreate(['user_id' => $this->user->id], [
            "user_id" => $this->user->id,
            "phone" => $request->phone,
            "country" => $request->country,
            "city" => $request->city,
            "address" => $request->address,
            "facebook" => $request->facebook,
            "twitter" => $request->twitter,
            "youtube" => $request->youtube,
            "tiktok" => $request->tiktok,
            "snapchat" => $request->snapchat,
        ]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', 'min:6', 'string']
        ]);

        $this->user->update([
            'password' => Hash::make($request->password),
        ]);
    }

    public function updateImage(Request $request)
    {
        $user_path = uploads_path('users/'.$this->user->slug.'/personal-image');
        $image_name = md5(uniqid());

        // delete pervious image if exists
        if($this->user->info != null && $this->user->info->image != null){

            // get old image
            $old_image = uploads_path('users/'.$this->user->slug.'/personal-image/'.$this->user->info->image);

            // remove old image
            file_exists($old_image) ? unlink($old_image) : false;
        }

        // upload new file
        $request->file('image')->move($user_path, $image_name.'.'.$request->file('image')->getClientOriginalExtension());

        if($this->user->info == null){

            UserInfo::create([
                'user_id' => $this->user->id,
                'image' => $image_name.'.'.$request->file('image')->getClientOriginalExtension()
            ]);

        }else{

            UserInfo::where('user_id', $this->user->id)->update([
                'image' => $image_name.'.'.$request->file('image')->getClientOriginalExtension()
            ]);
        }
    }

    public function removeImage()
    {
        $user_image = uploads_path('users/'.$this->user->slug.'/personal-image/'.$this->user->info->image);
        
        // remove image
        file_exists($user_image) ? unlink($user_image) : false;

        // set image to null in db
        UserInfo::where('user_id', $this->user->id)->update([
            'image' => null,
        ]);
    }
}

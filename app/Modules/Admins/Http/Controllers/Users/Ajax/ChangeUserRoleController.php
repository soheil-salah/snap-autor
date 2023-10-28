<?php

namespace App\Modules\Admins\Http\Controllers\Users\Ajax;

use App\Http\Controllers\Controller;
use App\Models\Blog\Author;
use App\Models\Blog\Editor;
use App\Models\Users\Role;
use App\Models\Users\User;
use App\Models\Users\UserRole;
use App\Modules\Admins\Models\Admin;
use Illuminate\Http\Request;

class ChangeUserRoleController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        $role = Role::where('id', $request->role_id)->first();

        // check if user has an author role, if yes remove user role
        if($user->author != null || $user->editor != null){

            $this->removeAdminAuthor($user->id);
        }

        // check if user role is author then create admin and user author role
        if($role->type == 'author'){

            $admin = $this->createAdmin($user);

            Author::create([
                'admin_id' => $admin->id,
                'user_id' => $user->id,
            ]);
        }

        // check if user role is editor then create admin and user editor role
        if($role->type == 'editor'){

            $admin = $this->createAdmin($user);

            Editor::create([
                'admin_id' => $admin->id,
                'user_id' => $user->id,
            ]);
        }

        UserRole::updateOrCreate(['user_id' => $request->user_id],[
            'user_id' => $request->user_id,
            'role_id' => $request->role_id
        ]);
    }

    private function createAdmin($user)
    {
        return Admin::create([
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'email' => $user->email,
            'password' => $user->password,
        ]);
    }

    private function removeAdminAuthor($user_id)
    {
        $user = User::where('id', $user_id)->first();

        if($user->author != null){
            $author = Author::where('user_id', $user_id)->first();

            Admin::where('id', $author->belongsToAdmin->id)->delete();
        }

        if($user->editor != null){
            
            $editor = Editor::where('user_id', $user_id)->first();
            
            Admin::where('id', $editor->belongsToAdmin->id)->delete();
        }
    }
}

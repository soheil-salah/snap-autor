<?php

namespace App\Modules\Admins\Http\Controllers\Users;

use App\DataTables\UsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Users\Role;
use App\Models\Users\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(UsersDataTable $dataTable)
    {
        $countUsers = User::count();

        return $dataTable->render('admin.pages.user.index', compact('countUsers'));
    }

    public function show($slug)
    {
        $user = User::where('slug', $slug)->first();

        $user == null ? abort(404) : null;

        return view('admin.pages.user.show', compact('user'));
    }

    public function showPassword($slug)
    {
        $user = User::where('slug', $slug)->first();

        $user == null ? abort(404) : null;

        return view('admin.pages.user.password', compact('user'));
    }

    public function role($slug)
    {
        $user = User::where('slug', $slug)->first();
        $roles = Role::get();

        $user == null ? abort(404) : null;
        
        return view('admin.pages.user.role', compact('user', 'roles'));
    }

    public function ban($slug)
    {
        $user = User::where('slug', $slug)->first();

        $user == null ? abort(404) : null;

        return view('admin.pages.user.ban.index', compact('user'));
    }

    public function banType(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        
        $user == null ? abort(404) : null;

        switch($request->ban_type){

            case 'daterange':
                return view('admin.pages.user.ban.daterange', compact('user'));
            break;

            case 'duration':
                return view('admin.pages.user.ban.duration', compact('user'));
            break;

            case 'forever':
                return null;
            break;
        }
    }

    public function remove($slug)
    {
        $user = User::where('slug', $slug)->first();

        $user == null ? abort(404) : null;

        return view('admin.pages.user.remove', compact('user'));
    }

    public function create()
    {
        return view('admin.pages.user.create');
    }
}

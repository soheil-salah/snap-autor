<?php

namespace App\Modules\Admins\Http\Controllers\Users;

use App\DataTables\UserRolesDataTable;
use App\Http\Controllers\Controller;
use App\Models\Users\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function __invoke(UserRolesDataTable $datatable)
    {
        $countUsers = User::count();

        return $datatable->render('admin.pages.user-role.index', compact('countUsers'));
    }
}

<?php

namespace App\Modules\Admins\Http\Controllers\Users;

use App\DataTables\BannedUsersDataTable;
use App\Http\Controllers\Controller;
use App\Models\Users\User;
use App\Models\Users\UserBan;
use Illuminate\Http\Request;

class BannedUsersController extends Controller
{
    public function __invoke(BannedUsersDataTable $datatable)
    {
        $countUsers = User::count();

        return $datatable->render('admin.pages.banned-user.index', compact('countUsers'));
    }
}

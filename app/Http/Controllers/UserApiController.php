<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Filters\UserFilter;
use App\User;

class UserApiController extends Controller
{
    public function index(Request $request)
    {
        $users_query = User::query();
        $users = (new UserFilter($users_query, $request))->apply()->get();
        return response()->json(['users'=>$users]);
    }
}

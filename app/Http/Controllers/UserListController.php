<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserListController extends Controller
{
    public function Manage()
    {
      $users=User::all();
      return view('admin.user_lists',compact('users'));
    }
}

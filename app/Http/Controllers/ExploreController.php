<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index(){
        $users=User::paginate(9);
     //   dd($users);
        return view('explore.index',compact('users'));
    }
}

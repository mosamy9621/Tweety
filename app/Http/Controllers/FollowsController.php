<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class FollowsController extends Controller
{
    public function store(User $user)
    {
        $current_user = auth()->user();
        if ($current_user->isFollowing($user))
            $current_user->unfollows($user);
        else
            $current_user->follows($user);
        return back();
    }
    //
}

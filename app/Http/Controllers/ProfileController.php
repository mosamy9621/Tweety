<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use function Sodium\compare;

class  ProfileController extends Controller
{
    public function show(User $user){

    return view('profile.show',compact('user'));

    }

    public  function  edit(User $user){

        $this->authorize('edit',$user);
        return view('profile.edit',compact('user'));
    }


    public function  Update(Request $request, User $user){
       $this->authorize('edit',$user);
        //dd('all is good');
        if(!$request['password']) {
            $request['password'] = $user->getAuthPassword();
            $request['password_confirmation'] = $user->getAuthPassword();

        }
        $validated=$request->validate(
            ['name'=>['required','string'],
            'user_name'=>['required','alpha_dash',Rule::unique('users')->ignore($user)],
            'email'=>['required','email',Rule::unique('users')->ignore($user)],
             'password'=>['required','string','max:255', 'min:8'  ,'confirmed'],
              'avatar'=>['file']
            ]);
        $validated['password']=Hash::make($validated['password']);
        $validated['avatar']=$request['avatar']->store('avatars');
        $user->update($validated);
       // dd($validated);
        return redirect(route('profile',compact('user')));
    }

    //
}

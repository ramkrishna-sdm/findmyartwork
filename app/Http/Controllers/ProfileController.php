<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;
use App\Repository\UserRepository;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */

     public function __construct(UserRepository $userRepository,Request $request)
    {
        $this->userRepository = $userRepository;

        $this->request = $request;
       
    }

    public function edit()
    {
        $user = $this->userRepository->getData(['id'=> auth()->user()->id],'first',[],0);

        return view('profile.edit',compact('user'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update()
    {   
        $user = $this->userRepository->createUpdateData(['id'=> $this->request->id],$this->request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password()
    {
        auth()->user()->update(['password' => Hash::make($this->request->get('password'))]);

        return back()->withPasswordStatus(__('Password successfully updated.'));
    }
}

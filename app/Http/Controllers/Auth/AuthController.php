<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	use AuthenticatesUsers,RegistersUsers;

   
     protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
         return redirect('/');
        // $this->guard()->login($user);

        // return $this->registered($request, $user)
        //                 ?: redirect($this->redirectPath());
    }
	public function getRegister()
	{
		return $this->showRegistrationForm();
	}
	public function postRegister(Request $request)
	{
       return  $this->register($request);
	}
	public function getLogin()
	{
		return $this->showLoginForm();
	}
	public function getLogout(Request $request)
	{
		
        return $this->logout($request);
        
        
	}
	public function postLogin(Request $request)
	{
         return $this->login($request);
	}

	protected function guard()
    {
        return Auth::guard();
    }
    protected function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }
    protected function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }


}

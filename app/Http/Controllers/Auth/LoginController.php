<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    

    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
            'sede'=> 'required|integer'
        ]);
        $message = [
            'sede.required'=> 'Por favor seleccione la sede a que pertenece'
        ];
        
    }

    //Autenticación de sede
    protected function authenticated(Request $request, $user)
    {
        $credentials = $request->only('name', 'password', 'sede');
        $bandera = true;
        if (Auth::attempt($credentials)) {
            $bandera = true;
            return redirect()->intended('/');
        }else{
            Auth::logout();
            return redirect()->intended('login')->with('auth_status','Por favor revise sus datos');
        }
    }
    //redirecionamiento de tipo de usuario
    public function redirectPath()
    {
      
            if (auth()->user()->type_user == 3) {
                return '/direction';
            }elseif (auth()->user()->type_user == 2) {
                return '/reg-ctrol';
            }
            return route('admin.index');

    }

    //nombre del campo con el que valida
    public function username()
    {
        return 'name';
    }

}

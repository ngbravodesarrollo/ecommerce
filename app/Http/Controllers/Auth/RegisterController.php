<?php

namespace Ecommerce\Http\Controllers\Auth;

use Ecommerce\User;
use Ecommerce\Persona;
use Ecommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Ecommerce\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'] . $data['lastName'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
        if (array_has($data,'lastName')) {
            $persona= new Persona;
            $persona->idusuario=$user->id;
            $persona->tipo_persona='Cliente';
            $persona->nombre=$data['name'];
            $persona->apellido=$data['lastName'];
            if (array_has($data,'telefono')) {
                $persona->telefono=$data['telefono'];
            }
            $persona->cod_postal=$data['cp'];
            $persona->calle=$data['calle'];
            $persona->numero=$data['numero'];
            if (array_has($data,'piso')) {
                $persona->piso=$data['piso'];
            }
            $persona->localidad=$data['localidad'];
            $persona->partido=$data['partido'];
            $persona->save();
        }

        return $user;
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            // Informacion de empresa
            'empresa' => ['required', 'string', 'max:300'],
            'nrc' => ['required', 'string', 'max:17', 'unique:empresas'],
            'rubro' => ['required', 'string', 'max:100'],
            // Informacion de usuario
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        /* La forma de trabajo acá es diferente al resto del proyecto, ya que aquí solamente se adaptó
        a la forma en como vienen por defecto estos archivos al generarlos */
        // Crear empresa
        $empresas = Empresa::create([
            'nombre' => $data['empresa'],
            'nrc' => $data['nrc'],
            'rubro' => $data['rubro'],
        ]);

        // Crear usuario
        $data['rol'] = 1;
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'rol' => $data['rol'],
            'password' => Hash::make($data['password']),
            'empresas_id' => $empresas->id,
        ]);

        return $user;
    }
}

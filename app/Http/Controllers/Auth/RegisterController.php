<?php

namespace App\Http\Controllers\Auth;

use App\Alumno;
use App\Http\Controllers\Controller;
use App\Profesor;
use App\User;
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'tipo_usuario' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $idUser = User::where("email", $data["email"])->value("id");

        if ($data["tipo_usuario"] == "Alumno") {

            //
            //crea un nuevo usuario de tipo alumno
            //
            $user_data = Alumno::create([
                'idUser' => $idUser,
            ]);
        } else {

            //
            //crea un nuevo usuario de tipo profesor con sus respectivas materias
            //
            $user_data = Profesor::create([
                'idUser' => $idUser,
            ]);
            $idProfesor = Profesor::where("idUser", $idUser)->value("id");

            $materias_seleccionadas = $data["materias_seleccionadas"];
        }

        return $user;
    }
}

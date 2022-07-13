<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\PageActive;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Mail;
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
        // protected function validator(array $data)
        // {
        //     return Validator::make($data, [
        //         'name' => ['required', 'string', 'max:255'],
        //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //         'no_hp' => ['required'],
        //     ]);
        // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create()
    {

        $ce = User::where('email', request('email'))->count();
        if($ce>0){
            return redirect('daftar')->with(['error' => 'Email telah dipakai']);
        }
        $password = request('password');
        $aktived = '0';
        if(request('acc_kps')==1 ){
            $aktived = '1';
        }

        $degress = 'sarjana';
        $prodi1 = request('prodi1');
        if(request('degress') == 'pascasarjana'){
            $degress = 'pascasarjana';
            $prodi1 = request('prodi');
        }

        User::create([
            'name'     => request('name'),
            'email'    => request('email'),
            'username' => request('email'),
            'no_hp'    => request('no_hp'),
            'prodi'    => $prodi1,
            'prodi_1'  => request('prodi2'),
            'role'     => 'user',
            'year'     => date('Y'),
            'activated'=> $aktived,
            'degress'  => $degress,
            'password' => Hash::make($password)
        ]);

        $details = [
            'title' => 'Akun PMB IAKN Tarutung',
            'username' => request('email'),
            'password' => $password
        ];

        // \Mail::to(request('email'))->send(new \App\Mail\sendEmail($details));
        return redirect('daftar')->with(['success' => 'Daftar berhasil, silahkan login!']);
    }

    public function page(){
        return PageActive::all();
    }

    public function activepage(){
        PageActive::where('id', request('id_page'))->update([
            'activated' => request('activated')
        ]);

        $page = PageActive::all();

        return response()->json([
            'msg' => 'berhasil update data',
            'data'=> $page
        ]);
    }
}

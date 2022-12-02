<?php
namespace Rexoitgeo\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class LocationController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('location::auth.login');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('location::auth.registration');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {



            $update = User::query()
                ->update([
                'last_login_at' => Carbon::now()->toDateTimeString(),
                'last_login_ip' => $request->getClientIp(),
                 'longitude' => $request['longitude'],
                  'latitude' => $request['latitude']
            ]);


            $posts = User::orderBy('id', 'desc')->take(5)->get();

            return view('location::dashboard', compact('posts'));
        }

        return view("location::auth.login");
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required', 'numeric', 'min:11',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $data = $request->all();
        $check = $this->create($data);

        $posts = User::orderBy('id', 'desc')->take(5)->get();


        return view("location::dashboard", compact('posts'))->withSuccess('Great! You have Successfully loggedin');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function dashboard()
    {
        if(Auth::check()){

            $posts = User::orderBy('id', 'desc')->take(5)->get();

            return view('location::dashboard', compact('posts'));
        }

        return view("location::auth.login");
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
    }

    public function update(array $data)
    {



        return User::query()
        ->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => \Request::getClientIp(true),
            'longitude' => $data['longitude'],
            'latitude' => $data['latitude']
        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();

        return view('location::auth.login');
    }


}






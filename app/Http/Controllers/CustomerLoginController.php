<?php

use Illuminate\Foundation\Auth\AuthenticatesUsers;


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use App\User;


class CustomerLoginController extends Controller
{
    //
    use AuthenticatesUsers;


    protected $redirectTo = '/customer/home';

    public function __construct()
    {
        $this->middleware('guest:customer')->except('logout')->except('index');
    }
    
    public function index(Request $request){
        $Product = Product::when($request->keyword, function ($query) use ($request) {
            $query->where('title', 'like', "%{$request->keyword}%")
                ->orWhere('subtitle', 'like', "%{$request->keyword}%");
        })->paginate($request->limit ?? 50);
          
        $user = Auth::user();

          return view('front.welcome', compact('Product', 'user'));
    }


    
    public function showLoginForm()
    {
        return view('auth.login-front');
    }
    
    public function showRegisterForm()
    {
        return view('auth.register-front');
    }
    
    public function username()
    {
            return 'username';
    }
    
    protected function guard()
    {
          return Auth::guard('customer');
    }
    
    public function register(Request $request)
    {

        // try {
        //     $notification = array(
        //         'message' => 'Successfully register!                ',
        //         'alert-type' => 'success'
        //     );

        //     $request->validate([
        //         'username'      => 'required',
        //         'email'         => 'required',
        //         'password'      => 'required'
        //     ]);

            $Customer = User::where('name',$request->refferal_code)->first();

            if(empty($Customer)){
                $notification = array(
                    'message' => 'Referral code does not exist',
                    'alert-type' => 'error'
                );
                return redirect()->route('customer.register')->with($notification);
            }

            $request->merge([
                'sales_id' => $Customer->id,
                'store_name' => 'No Name',
                'permission' => 1,
                'percent' => 5
            ]);

            \App\Customer::create($request->all());
            return redirect()->route('customer.login')->with('success', 'Successfully register!');

        // } catch (\Throwable $th) {
        //     $notification = array(
        //         'message' => 'Register failed ! ',
        //         'alert-type' => 'error'
        //     );
        //     return redirect()->route('customer.login')->with($notification);
        // }
       
    }

    public function logout()
    {
        $this->auth->logout();
        Session::flush();
        return redirect('customer/login');
    }

  
    
}

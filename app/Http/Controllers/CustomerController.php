<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use App\Customer;
use App\User;

class CustomerController extends Controller
{
    //

    public function index()
    {
        $Customer = Customer::all();

        $privilege = [
            1 => 'Toko'
        ];

        $getsales = User::where('permission', 2)->get();


        return view('admin.listcustomers', ['customers' => $Customer, 
        'privilege' => $privilege,
        'getsales' => $getsales]);
    }

    public function store(Request $request)
    {
        
        try {
            $notification = array(
                'message' => 'Customer data has been saved successfully!                ',
                'alert-type' => 'success'
            );

            $request->validate([
                'username' => 'required',
                'sales' => 'required',
                'email' => 'required|unique:Customers|email',
            ]);

            Customer::create([
                'username' => $request->username,
                'email' => $request->email,
                'password' => Hash::make('opsokp2p123'),
                'permission' => $request->permission,
                'refferal_code' => $request->refferal_code,
                'sales_id' => $request->sales,
                'store_name' => $request->store_name
            ]);

            return Redirect::to('/customers-list')->with($notification);
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Customer data failed to save! ',
                'alert-type' => 'error'
            );
            return Redirect::to('/customers-list')->with($notification);
        }
    }

    public function edit(Request $request)
    {


        try {
            $Customer = Customer::find($request->id);
            $Customer->username = $request->username;
            $Customer->email = $request->email;
            $Customer->permission = $request->permission;
            $Customer->is_active = $request->is_active;
            $Customer->refferal_code = $request->refferal_code;
            $Customer->sales_id =  $request->sales;
            $Customer->store_name =  $request->store_name;
            if ($request->password) {
                $Customer->password = Hash::make($request->password);
            }
            
            $Customer->save();

            $notification = array(
                'message' => 'Customer data has been updated successfully!                ',
                'alert-type' => 'success'
            );
            return Redirect::to('/customers-list')->with($notification);
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Customer data failed to update!',
                'alert-type' => 'error'
            );
            return Redirect::to('/customers-list')->with($notification);
        }
    }

    public function destroy($id)
    {
        try {
            if (Auth::Customer()->id == $id) {
                $notification = array(
                    'message' => 'Cant delete your own account!',
                    'alert-type' => 'error'
                );
                return Redirect::to('/customers-list')->with($notification);
            }
            Customer::find($id)->delete();

            $notification = array(
                'message' => 'Customer data has been deleted successfully!',
                'alert-type' => 'success'
            );
            return Redirect::to('/customers-list')->with($notification);
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Customer data has failed to be deleted!',
                'alert-type' => 'error'
            );
            return Redirect::to('/customers-list')->with($notification);
        }
    }

    public function resetpassword($id)
    {
        try {
            $reset = Customer::find($id);
            $reset->password = Hash::make('admin123');
            $reset->is_re_password = 0;
            $reset->save();

            $notification = array(
                'message' => 'Customer data reset password successfully!',
                'alert-type' => 'success'
            );
            return Redirect::to('/customers-list')->with($notification);
        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Customer data failed to reset password!',
                'alert-type' => 'error'
            );
            return Redirect::to('/customers-list')->with($notification);
        }
    }
}

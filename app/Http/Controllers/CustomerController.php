<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
class CustomerController extends Controller
{
    public function __construct() {
        return $this->middleware('auth', ['except' => []]);
    }
    /* ------------------------------------------------------------- */
    # Main View page for customer_info
    /* ------------------------------------------------------------- */
    public function index(Request $request){
        if($request->isMethod('GET')){
            $all_customer = Customer::all();
            return view('customer/customer_info')->with('all_Customers', $all_customer);
        }
    }
    /* ------------------------------------------------------------- */
    # add View page for customer_info
    /* ------------------------------------------------------------- */
    public function add(Request $request){

        $customer = new Customer();
        $customer->name = $request->input('addid');
        $customer->name = $request->input('addname');
        $customer->price = $request->input('addprice');
        $customer->phone = $request->input('addphone');
        $customer->address = $request->input('addaddress');
        try {
            $customer->save();
            return response()->json([$customer,'success' => 'Your customer is successfully sent.']);
        } catch(\Exception $e) {
            return redirect('/customer_info')->with('error', 'حدث خطأ اثناء حفظ عميل جديد');
        }
    }

    /* ------------------------------------------------------------- */
    # Edit Page
    /* ------------------------------------------------------------- */

    public function edit(Request $request,$id)
    {
        $customers = Customer::find($id);
        $customers->name = $request->input('name');
        $customers->price = $request->input('price');
        $customers->phone = $request->input('phone');
        $customers->address = $request->input('address');
        $customers->save();
        return response()->json(['success' => 'Your customer is successfully updated.']);

    }

    /* ------------------------------------------------------------- */
    # Delete Page
    /* ------------------------------------------------------------- */
    public function delete($id){
            Customer::destroy($id);
           return response()->json(['success' => 'Your inquire is successfully sent']);
    }

    /* ------------------------------------------------------------- */
    #  Main View page for customer_sales
    /* ------------------------------------------------------------- */
    public function customer_sales(){
        return view('customer/customer_sales');
    }

}

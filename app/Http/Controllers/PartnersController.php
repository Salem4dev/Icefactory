<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;

class PartnersController extends Controller
{

    public function __construct() {
        return $this->middleware('auth', ['except' => []]);
    }
    /* ------------------------------------------------------------- */
    # Main View page for Partners_info
    /* ------------------------------------------------------------- */
    public function index(){
        $all_partners = Partner::all();
        return view('Partners/daily_Partners')->with('all_partners', $all_partners);
    }
    /* ------------------------------------------------------------- */
    # add View page for Partners_info
    /* ------------------------------------------------------------- */
    public function add(Request $request){

        $partners = new Partner();
        $partners->from_check = $request->input('addfrom');
        $partners->to_check = $request->input('addto');
        $partners->number = $request->input('addnumber');
        $partners->halek = $request->input('addhalek');
        $partners->Snowboard_price = $request->input('addprice');
//        $Partners->total_price = $request->input('addtotal');
        $partners->customer_id = $request->input('addcustomerid');
        try {
            $partners->save();
            return response()->json([$partners,'success' => 'Your Partners is successfully sent.']);
        } catch(\Exception $e) {
            return redirect('/daily_Partners')->with('error', 'حدث خطأ اثناء حفظ عميل جديد');
        }
    }

    /* ------------------------------------------------------------- */
    # Edit Page
    /* ------------------------------------------------------------- */

    public function update(Request $request,$id)
    {
        $partners = Partner::find($id);
        $partners->from_check = $request->input('from');
        $partners->to_check = $request->input('to');
//        $Partners->number_checks = $request->input('number');
        $partners->halek = $request->input('halek');
        $partners->Snowboard_price = $request->input('price');
//        $Partners->total_price = $request->input('total');
        $partners->customer_id = $request->input('customerid');
        $partners->save();
        return response()->json(['success' => 'Your Partners is successfully updated.']);

    }

    /* ------------------------------------------------------------- */
    # Delete Page
    /* ------------------------------------------------------------- */

    public function delete($id){
        Partner::destroy($id);
        return response()->json(['success' => 'Your inquire is successfully sent']);
    }

    /* ------------------------------------------------------------- */
    # monthly_Partners Page
    /* ------------------------------------------------------------- */

    public function monthly_Partners(){
        return view('Partners/monthly_Partners');
    }

    /* ------------------------------------------------------------- */
    # yearly_Partners Page
    /* ------------------------------------------------------------- */
    public function yearly_Partners(){
        return view('Partners/yearly_Partners');
    }


}

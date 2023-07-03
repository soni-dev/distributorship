<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function store(Request $request){
     
        $this->validate($request, [
            'brand_name' => 'string|nullable',        
            'register_user_id' => 'numeric',
            'appoint_distributors_id' => 'numeric',
            'mobile' => 'required|digits:10',
            'email' => 'required|email',         
            // 'interested_in' => 'required',         
            // 'message' => 'string',        
        ]);

        $brand ="Sales Agent";
        if(isset($request->brand_name)){
            $brand = $request->brand_name;
        } 
        $result = Enquiry::create(
            [
              'brand_name'=>$brand,
              'register_user_id'=>$request->register_user_id,
              'appoint_distributors_id'=>$request->appoint_distributors_id,
              'name'=>$request->name,
              'mobile'=>$request->mobile,
              'email'=>$request->email,
              'interested_in'=>$request->interested_in,
              'message'=>$request->message,
            ]
            );
         
        if($result){            
           return redirect()->back()->with("success","Send Inquiry Successfully!");
        }
        else{
            return redirect()->back()->with("fail","Fail !! to Send Inquiry");
        }
    }

    public function index(){
        $result = Enquiry::where("register_user_id",auth()->user()->id)->orderBy("created_at","desc")->get();

        return view('web.listing.inbox',compact('result'));
    }
}

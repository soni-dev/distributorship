<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Distributor;
use App\Models\Franchise;
use App\Models\Sale;
use App\Models\Category;
use App\Models\Country;
use App\Models\state;

class DistributorshipController extends Controller
{

    public function __construct() {
        $this->middleware('admin');
    }


    public function index($type)
    { 
      $table = ($type == 'distributor')?Distributor::query():(($type == 'frenchies')?Franchise::query():Sale::query());
      $lists = $table->orderBy('created_at','desc')->paginate(10);

      return view('admin.distributionship.list',compact('lists','type'));
    }

    public function UpdateFeatured(Request $request)
    {
        if($request->ajax())
        {
            $this->validate($request, 
            [
                'id'   => 'required|string',        
                'type' => 'required|string',   
                'featured' => 'required|string',   
            ]);

            $id   = trim($request->id);
            $type = trim($request->type);  
            $featured = trim($request->featured);     
           
            $table = ($type == 'distributor')?Distributor::query():(($type == 'frenchies')?Franchise::query():Sale::query());

        
                $result = $table->where('id',$id)->update(['is_featured'=>$featured]);              
                if ($result) 
                {
                    return response()->json(["msg"=>"success"],200);   
                }
                 else 
                 {
                    return response()->json(["msg"=>"error"],200);   
                }
        }
    }


    public function view(Request $request){

        if($request->ajax())
        {
            $this->validate($request, 
            [
                'id'   => 'required|numeric',        
                'type' => 'required|string',   
            ]);

            $id   = trim($request->id);
            $type = trim($request->type);       

            $table = ($type == 'distributor')?Distributor::query():(($type == 'frenchies')?Franchise::query():Sale::query());

            $data = $table->where('id',$id)->first();  
            $type_distributorship =  "";
            $sub_cat ="";
            if(!empty($data->sub_category_id))
            {
            $sub_cat_ids = array_map('intval', json_decode($data->sub_category_id));
            $sub_cat = Category::whereIn("id",$sub_cat_ids)->pluck('name');
           
            }
            $location ="";
            if(!empty($data->state_id))
            {
            $state_ids = array_map('intval', json_decode($data->state_id));
            $location = State::whereIn("id",$state_ids)->pluck('name');
           
            }
            $location2 = "";
            if(!empty($data->country_id))
            {
            $country_ids = array_map('intval', json_decode($data->country_id));
            $location2 = Country::whereIn("id",$country_ids)->pluck('name');
           
            }
            if($type == 'distributor') {                        
              //  $sub_cat = Category::whereIn("id")
             $type_distributorship =  !empty($data->type_distributorship)?implode(",",json_decode($data->type_distributorship)):"";
                
            }
            
           if(!empty($data))
           {
            return response()->json(['data'=>$data,'sub_cat'=>$sub_cat,'location'=>$location ,'location2'=>$location2,'type_distributorship'=>$type_distributorship],200);
           }

            return response()->json(['data'=>''],500);
        }
    }
}

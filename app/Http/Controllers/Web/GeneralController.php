<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Web\GeneralServiceInterface;
use App\Interfaces\Admin\CampaignsServiceInterface;
use Illuminate\Support\Facades\Auth;
use App\Models\Distributor;
use App\Models\listing_cat;
use App\Models\Franchise;
use App\Models\Sale;
use App\Models\Category;
use App\Models\Country;
use App\Models\State;
use App\Models\User;
use App\Helpers\Helper;
use File;
class GeneralController extends Controller
{
    private $GeneralServiceInterface;

    public function __construct(GeneralServiceInterface $GeneralServiceInterface, CampaignsServiceInterface $CampaignsServiceInterface) {
        $this->GeneralServiceInterface = $GeneralServiceInterface;
        $this->CampaignsServiceInterface = $CampaignsServiceInterface;
    }

    public function home() {
        $blogRand = $this->GeneralServiceInterface->blogRand();
        $distributors = $this->GeneralServiceInterface->allListing('distributor');
        $franchise = $this->GeneralServiceInterface->allListing('franchise');
        $sales = $this->GeneralServiceInterface->allListing('sales');
        return view('web.home',compact('blogRand','distributors','franchise','sales'));
    }

    public function dashboard() {
        //dd(Auth::user()->intrested);
        $blogRand = $this->GeneralServiceInterface->blogRand();
        
        $listing = $this->GeneralServiceInterface->userListing(Auth::id());
        return view('web.dash',compact('blogRand','listing'));
    }

    public function dash_gallery($id) {
        $mygals = $this->GeneralServiceInterface->gallery(Auth::user()->intrested,$id);
        if($mygals->gallery == null) {
            $gals = [];
        } else {
            $gals = json_decode($mygals->gallery);
        }
        return view('web.listing.gallery',compact('gals','id','mygals'));
    }

    public function add_listing() {
        $blogRand = $this->GeneralServiceInterface->blogRand();
       $getListingStates = $this->GeneralServiceInterface->getListingStates();
       $regions = $this->GeneralServiceInterface->regions();
       $countries = $this->GeneralServiceInterface->getListingCountries();
        return view('web.addlisting',compact('blogRand','getListingStates','regions','countries'));
    }

    public function edit_distributor($id){
        $blogRand = $this->GeneralServiceInterface->blogRand();
        $getListingStates = $this->GeneralServiceInterface->getListingStates();
        $regions = $this->GeneralServiceInterface->regions();
        $countries = $this->GeneralServiceInterface->getListingCountries();
        $dist = Distributor::findOrFail($id);
        $scats = json_decode($dist->sub_category_id);
        $catById =  $this->GeneralServiceInterface->catById($scats);
      return view('web.editlisting',compact('blogRand','getListingStates','regions','countries', 'dist','scats','catById'));
    }

    public function edit_french($id){
        $blogRand = $this->GeneralServiceInterface->blogRand();
        $getListingStates = $this->GeneralServiceInterface->getListingStates();
        $regions = $this->GeneralServiceInterface->regions();
        $countries = $this->GeneralServiceInterface->getListingCountries();
        $fran = Franchise::findOrFail($id);
        $scats = json_decode($fran->sub_category_id);
        $catById =  $this->GeneralServiceInterface->catById($scats);
       // dd($catById,$scats);
      return view('web.editlisting',compact('blogRand','getListingStates','regions','countries', 'fran','scats','catById'));
    }

    public function edit_sale($id){
        $blogRand = $this->GeneralServiceInterface->blogRand();
        $getListingStates = $this->GeneralServiceInterface->getListingStates();
        $regions = $this->GeneralServiceInterface->regions();
        $countries = $this->GeneralServiceInterface->getListingCountries();
        $sale = Sale::findOrFail($id);
        $scats = json_decode($sale->sub_category_id);
        $catById =  $this->GeneralServiceInterface->catById($scats);
      // dd($catById,$scats);
      return view('web.editlisting',compact('blogRand','getListingStates','regions','countries', 'sale','scats','catById'));
    }

    public function update_sale(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',        
            'agent_type' => 'required_if:mode,become',
            'experience' => 'required_if:mode,become',
            'education' => 'required_if:mode,become',
            'scats' => 'required',            
            'business_profile' => 'required', 
            'product_detail' => 'required',
            'target_customer' => 'required',
            'expected_work' => 'required',
            'cities_needed' => 'required',
            'image' => 'required_if:image,'.$request->logo,
            'state_id' => 'required_without:country_id',
            'country_id' => 'required_without:state_id',
            'remark' => 'required',
        ],[
            'name.required' => 'Name is required.',
            'agent_type.required' => 'Agent Type is required.',
            'establishment.required' => 'Establishment year is required.',
            'pan.required' => 'PAN is required.',
           // 'gst.required' => 'GST is required.',
            'scats.required' => 'Subcategory is required.',
            'business_profile.required' => 'Business Profile is required.',
            //'type_distributorship.required' => 'Type Of Distributorship is required.',
            'state_id.required_without'=>'Location Details is required',
            'country_id.required_without'=>'Location Details is required',
            'remark.required' => 'Remark is required.'
        ]);
        $this->GeneralServiceInterface->updateSalesAgent($request->all());
        return redirect('/dashboard');
        
    }

    public function update_dist(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'anualsale_start' => 'required_if:mode,appoint',
            'anualsale_end' => 'required_if:mode,appoint',
            'anualsale_unit' => 'required_if:mode,appoint',
            'scats' => 'required',
            'investment_time' => 'required_if:mode,become',           
            'product_keyword' => 'required_if:mode,appoint',
            'business_profile' => 'required_if:mode,appoint',             
            'state_id' => 'required_without:country_id',
            'country_id' => 'required_without:state_id',
            'logo' => 'required_if:logo,'.$request->logo,
            'remark' => 'required_if:mode,appoint',
        ],[
            'name.required' => 'Name is required.',
            'product_keyword.required' => 'Product Keyword is required.',
            'business_profile.required' => 'Business Profile is required.',
            'remark.required' => 'Remark is required.',
            'state_id.required_without'=>'Location Details is required',
            'country_id.required_without'=>'Location Details is required',
            'investment_time.required'=>'Investment time is required.',
            'scats.required' => 'Subcategory is required.',
        ]);

        $this->GeneralServiceInterface->updateDistributor($request->all());
        return redirect('/dashboard');
    }


    public function update_fran(Request $request){
        $this->validate($request, [
            'name' => 'required',   
            'brand' => 'required_if:mode,appoint',  
            'product_keywords' => 'required_if:mode,appoint',
            'industry_type' => 'required_if:mode,become',
            'investment_time' => 'required_if:mode,become',
            'scats' => 'required',  
            'business_profile' => 'required_if:mode,appoint', 
            'logo' => 'required_if:logo,'.$request->logo,
            'state_id' => 'required_without:country_id',
            'country_id' => 'required_without:state_id',
            'remark' => 'required',            
        ],[
            'name.required' => 'Name is required.',
            'brand.required' => 'Brand name is required.',           
            'product_keyword.required' => 'Product Keyword is required.',
            'investment_time.required' => 'Investment time is required.',
            //'type_distributorship.required' => 'Type Of Distributorship is required.',
            'remark.required' => 'Remark is required.',
            'state_id.required_without'=>'Location Details is required',
            'country_id.required_without'=>'Location Details is required',
            'scats.required' => 'Subcategory is required.',
        ]);
       // dd($request->all());
        $this->GeneralServiceInterface->updateFrenchise($request->all());
        return redirect('/dashboard');
    }

    public function listingdetail($slug) {
        $blogRand = $this->GeneralServiceInterface->blogRand();
        $listing = $this->GeneralServiceInterface->listingDetail($slug,0);
        $relatedCats = $this->GeneralServiceInterface->relatedCategory($listing->category_id,0,$listing->id);
        //$getListingStates = $this->GeneralServiceInterface->getListingStates();
       // $listingcats = $this->GeneralServiceInterface->getListingCats($listing->id, 0);
        $mygals = $this->GeneralServiceInterface->gallery(0,$listing->id);
      //  $regions = $this->GeneralServiceInterface->regions();
        // $mcats=[];
        // foreach($listingcats as $lc) {
        //     $mcats[] = $lc->name;
        // }
      //  $listCat = implode(',', $mcats);
         $listCat = Helper::getSubCat($listing->sub_category_id);
        if($mygals->gallery == null) {
            $gals = [];
        } else {
            $gals = json_decode($mygals->gallery);
        }
        if($listing->type_distributorship == null) {
            $type_distributorship = "";
        } else {
            $type_distributorship = json_decode($listing->type_distributorship);
            $type_distributorship =  implode(",",$type_distributorship);
        }
        
        $list_type = 'Distributor';
        return view('web.search-details.listingdetail',compact('blogRand','relatedCats','type_distributorship','listing', 'listCat','gals','list_type'));
    }

    public function listingdetail_fr($slug) {
        $blogRand = $this->GeneralServiceInterface->blogRand();
        $listing = $this->GeneralServiceInterface->listingDetail($slug,1);
        $relatedCats = $this->GeneralServiceInterface->relatedCategory($listing->category_id,1,$listing->id);
       // $listingcats = $this->GeneralServiceInterface->getListingCats($listing->id, 1);
        $mygals = $this->GeneralServiceInterface->gallery(1,$listing->id);
        $listCat = Helper::getSubCat($listing->sub_category_id);
        if($mygals->gallery == null) {
            $gals = [];
        } else {
            $gals = json_decode($mygals->gallery);
        }
        $list_type = 'Franchise';
        return view('web.search-details.fran',compact('blogRand','relatedCats','listing', 'listCat','gals','list_type'));
    }

    public function listingdetail_sa($slug) {
        $blogRand = $this->GeneralServiceInterface->blogRand();
        $listing = $this->GeneralServiceInterface->listingDetail($slug,2);
        $relatedCats = $this->GeneralServiceInterface->relatedCategory($listing->category_id,2,$listing->id);
        //$listingcats = $this->GeneralServiceInterface->getListingCats($listing->id, 2);
        $mygals = $this->GeneralServiceInterface->gallery(2,$listing->id);
      
        $listCat = Helper::getSubCat($listing->sub_category_id);
        if($mygals->gallery == null) {
            $gals = [];
        } else {
            $gals = json_decode($mygals->gallery);
        }
        $list_type = 'Sales';
        return view('web.search-details.sale',compact('blogRand','relatedCats','listing', 'listCat','gals','list_type'));
    }

    public function subcats($id){
        return json_encode($this->GeneralServiceInterface->subCat($id));
    }

    public function listsubmit(Request $request) {
        if($request->listing_type =='sales'){
            $this->validate($request, [
                'name' => 'required',
              //  'gst' => 'required_if:mode,become',
              //  'pan' => 'required_if:mode,become',
                'agent_type' => 'required_if:mode,become',
                'experience' => 'required_if:mode,become',
                'education' => 'required_if:mode,become',
                'scats' => 'required',                
                'business_profile' => 'required',             
               // 'type_distributorship' => 'required_if:mode,appoint',              
                'product_detail' => 'required',
                'target_customer' => 'required',
                'expected_work' => 'required',
                'cities_needed' => 'required',
                'image' => 'required',
                'state_id' => 'required_without:country_id',
                'country_id' => 'required_without:state_id',
                'remark' => 'required',
            ],[
                'name.required' => 'Name is required.',
                'agent_type.required' => 'Agent Type is required.',
                'establishment.required' => 'Establishment year is required.',
                'pan.required' => 'PAN is required.',
               // 'gst.required' => 'GST is required.',
                'scats.required' => 'Subcategory is required.',
                'business_profile.required' => 'Business Profile is required.',
                //'type_distributorship.required' => 'Type Of Distributorship is required.',
                'state_id.required_without'=>'Location Details is required',
                'country_id.required_without'=>'Location Details is required',
                'remark.required' => 'Remark is required.'
            ]);
        }
        else if($request->listing_type =='franchise'){
            $this->validate($request, [
                'name' => 'required',   
                'brand' => 'required_if:mode,appoint',  
                'product_keywords' => 'required_if:mode,appoint',
                'industry_type' => 'required_if:mode,become',
                'investment_time' => 'required_if:mode,become',
                'scats' => 'required',  
                'business_profile' => 'required_if:mode,appoint', 
                'logo' => 'required',
                'state_id' => 'required_without:country_id',
                'country_id' => 'required_without:state_id',
                'remark' => 'required',  
                
            ],[
                'name.required' => 'Name is required.',
                'brand.required' => 'Brand name is required.',
                'investment_capacity.required' => 'Investment Capacity is required.',
                'pan.required' => 'PAN is required.',
                'gst.required' => 'GST is required.',
                'product_keyword.required' => 'Product Keyword is required.',
                'investment_time.required' => 'Investment time is required.',
                //'type_distributorship.required' => 'Type Of Distributorship is required.',
                'remark.required' => 'Remark is required.',
                'scats.required' => 'Subcategory is required.',
                'state_id.required_without'=>'Location Details is required',
                'country_id.required_without'=>'Location Details is required',
            ]);
        }
      else if ($request->listing_type == 'distributor') {
         $this->validate($request, [
             'name' => 'required',
             'anualsale_start' => 'required_if:mode,appoint',
             'anualsale_end' => 'required_if:mode,appoint',
             'anualsale_unit' => 'required_if:mode,appoint',
             'scats' => 'required',
             'investment_time' => 'required_if:mode,become',           
             'product_keyword' => 'required_if:mode,appoint',
             'business_profile' => 'required_if:mode,appoint',             
             'state_id' => 'required_without:country_id',
             'country_id' => 'required_without:state_id',
             'logo' => 'required',
             'remark' => 'required_if:mode,appoint',
         ],[
             'name.required' => 'Name is required.',
             'product_keyword.required' => 'Product Keyword is required.',
             'business_profile.required' => 'Business Profile is required.',
             'remark.required' => 'Remark is required.',
             'state_id.required_without'=>'Location Details is required',
             'country_id.required_without'=>'Location Details is required',
             'investment_time.required'=>'Investment time is required.',
             'scats.required' => 'Subcategory is required.',
         ]);
        }
       // dd($request->all());
        $this->GeneralServiceInterface->saveList($request->all(),$request->scats);
        return redirect('/dashboard');
    }

    public function addgallery(Request $request) {
        /*$validatedData = $request->validate([
            'file' => 'required|jpg,jpeg,png|max:2048',
        ]);*/
        //dd($request);
        if($request->file('logo')) {
            $file = $request->file('logo');
            $filename = time().'_'.$file->getClientOriginalName();
            if(Auth::user()->intrested == 0) {
                $location = 'public/assets/uploads/distributors/gallary';
                $file->move($location,$filename);
            }
           else if(Auth::user()->intrested == 1) {
                $location = 'public/assets/uploads/franchise/gallary';
                $file->move($location,$filename);
            }
           else {
                $location = 'public/assets/uploads/sale/gallary';
                $file->move($location,$filename);
            }
            $this->GeneralServiceInterface->saveImage(['id'=>$request->listing_id, 'user_id' => Auth::id(), 'type'=>Auth::user()->intrested, 'filename'=>$filename]);
            return redirect()->back();
        }
    }

    public function searchresult(Request $request) {
        //dd($request->all());
        if($request->stype == 0){
            $result = $this->GeneralServiceInterface->search($request->all(),0);
            $blogRand = $this->GeneralServiceInterface->blogRand();           
            return view('web.search.distributor_search',compact('result','blogRand'));
        }
       else if($request->stype == 1){
            $result = $this->GeneralServiceInterface->search($request->all(),1);
            $blogRand = $this->GeneralServiceInterface->blogRand();
            return view('web.search.franchise_search',compact('result','blogRand'));
        }

       else if($request->stype == 2){
            $result = $this->GeneralServiceInterface->search($request->all(),2);
            $blogRand = $this->GeneralServiceInterface->blogRand();
            return view('web.search.sales_search',compact('result','blogRand'));
        }
        
    }
    
    public function searchDetails($type,$id) {
        //dd($request->all());
        if($type == 0){
          
            $listing = $this->GeneralServiceInterface->searchDetails($type,$id);
            $blogRand = $this->GeneralServiceInterface->blogRand();
            return view('web.listingdetail',compact('listing','blogRand'));
        }
       else if($type == 1){
          
            $result = $this->GeneralServiceInterface->searchDetails($type,$id);
            $blogRand = $this->GeneralServiceInterface->blogRand();
            return view('web.search-details.fran',compact('result','blogRand'));
        }
        else if($type == 2){
          
            $result = $this->GeneralServiceInterface->searchDetails($type,$id);
            $blogRand = $this->GeneralServiceInterface->blogRand();
            return view('web.search-details.sale',compact('result','blogRand'));
        }
       
        
    }
    public function contactUsShow() {
        return view('web.contact-us');
    }
    public function comingSoon() {
        //return view('web.coming-soon');
    }

    public function aboutUs() {
        return view('web.about-us');
    }

    public function view(Request $request){

        if($request->ajax())
        {
            $this->validate($request, 
            [
                'id'   => 'required|numeric',        
                'type' => 'required|numeric',   
            ]);

            $id   = trim($request->id);
            $type = trim($request->type);       

            $table = ($type == 0)?Distributor::query():(($type == 1)?Franchise::query():Sale::query());

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
            if($type == 0) {                        
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

    public function deleteImg(Request $request){
        if($request->ajax())
        {
            $this->validate($request, 
            [
                'id'   => 'required|numeric',        
                'type' => 'required|numeric',   
                'img'  => 'required|string',   
            ]);

            $id     =    trim($request->id);
            $type   =    trim($request->type);       
            $img    =    trim($request->img);    
            $path   =    "";
            if($type == 0) 
            {
                $data = Distributor::findOrFail($id);
                $path = public_path('public/assets/uploads/')."/distributors/gallary";
                //return $data;
            }
            if($type == 1) 
            {
                $data = Franchise::findOrFail($id);
                $path = public_path('public/assets/uploads/')."/franchise/gallary";
              
                //return $data;
            }
    
            if($type == 2) 
            {
                $data = Sale::findOrFail($id);
                $path = public_path('public/assets/uploads/')."/sale/gallary";
               // return $data;
            }

            $gallery_array = json_decode($data->gallery);
            foreach ($gallery_array as $key => $gallery) 
            {
                if ($gallery == $img)
                {  

                    unset($gallery_array[$key]);
                }
                   
            }
               // \DB::enableQueryLog();
                $gallery_image = json_encode(array_values($gallery_array));
                $result =  $data->update(['gallery' => $gallery_image]);
               
              
                //remove file
                $path = $path."/". $img;
             
            if (File::exists($path)) 
            {
                unlink($path);
            }
           
            if ($data) 
            {
                return response()->json(["msg"=>"success"],200);   
            }
             else 
             {
                return response()->json(["msg"=>"error"],200);   
            }

           

        }
    }

    public function profile(){
      $data =  User::where("id",auth()->user()->id)->first();
      return view('auth.profile',compact('data'));;
    }

    public function updateProfile(Request $request){
        $this->validate($request, [
            'name' => 'required|string|min:3',        
            'email' => 'required|email',
            'company_name' => 'required|string',                  
            'address' => 'required|string',  
            'city' => 'required|string|min:3',            
            'zipcode' => 'required|min:6|numeric',             
            'phone' => 'required|digits:10',
            'intrested' =>'required|digits:1'         
        ]);

        $user = User::findOrFail($request->id);
        $user->name  = $request->name;
        $user->email  = $request->email;
        $user->phone  = $request->phone;
        $user->company_name  = $request->company_name;
        $user->address  = $request->address;
        $user->city  = $request->city;
        $user->zipcode  = $request->zipcode;
        $user->intrested  = $request->intrested;

        if($user->save()){
            return redirect()->back()->with('success','Profile Updated Successfully!!');
        }
        return redirect()->back()->with('fail','Fail!! to Update Profile');
      }
   
}
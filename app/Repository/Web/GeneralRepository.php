<?php

namespace App\Repository\Web;

use App\Models\Web\QueryModel;
use App\Models\Category;
use App\Models\Country;
use App\Models\Distributor;
use App\Models\Franchise;
use App\Models\listing_cat;
use App\Models\Region;
use App\Models\State;
use App\Models\Sale;
use App\Services\Images\ImageServices;
use App\Interfaces\Web\GeneralInterface;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Helpers\Helper;

class GeneralRepository implements GeneralInterface
{
    private $imageService;
    
    public function __construct(ImageServices $imageService ) {
        $this->imageService = $imageService;
    }

    public function contactUs($request) {
        QueryModel::create($request);
    }

    public function search($request,$type) {
       // \DB::enableQueryLog();
       $category =isset($request['industry_category'])? $request['industry_category']:'';
       $result =[]; $alias = "";
        if($type == 0){
            $data = Distributor::query();   
            $data->leftJoin('users as u','u.id','=','distributors.user_id')->select("distributors.*","u.phone");  
            $alias = "distributors";    
        }
       else if($type == 1){
        $data = Franchise::query();
        $data->leftJoin('users as u','u.id','=','franchisees.user_id')->select("franchisees.*","u.phone"); 
        $alias = "franchisees";
        }
        else if($type == 2){            
            $data = Sale::query();
            $data->leftJoin('users as u','u.id','=','sales.user_id')->select("sales.*","u.phone"); 
            $alias = "sales";
           
        }

        if(!empty($request['searchkeywords'])){
            $data->where( $alias.'.name','like','%'.$request['searchkeywords'].'%');
            }
            if(!empty( $category)){
               
                $data->where('category_id', $category);
                //$data->whereJsonContains('category_id', $category);
            }
            $result = $data->get();
          
             return $result;
    }

    
    /*
    |--------------------------------------------------------------------------
    | Distributors abd categories save
    |--------------------------------------------------------------------------
    */
    public function saveImage($request) {
        if(Auth::user()->intrested == 0) {
                $mypost = Distributor::where('id',$request['id'])
                ->where('user_id',$request['user_id'])
                ->first(['gallery']);
                $gals = json_decode($mypost->gallery);
                $gals[] = $request['filename'];
                $dis = Distributor::find($request['id']);
                $dis->gallery = json_encode($gals);
                $dis->save();
        }
        else if(Auth::user()->intrested == 1) 
        {
            $mypost = Franchise::where('id',$request['id'])
            ->where('user_id',$request['user_id'])
            ->first(['gallery']);
            $gals = json_decode($mypost->gallery);
            $gals[] = $request['filename'];
            $dis = Franchise::find($request['id']);
            $dis->gallery = json_encode($gals);
            $dis->save();
       }
       else 
        {
            $mypost = Sale::where('id',$request['id'])
            ->where('user_id',$request['user_id'])
            ->first(['gallery']);
            $gals = json_decode($mypost->gallery);
            $gals[] = $request['filename'];
            $dis = Sale::find($request['id']);
            $dis->gallery = json_encode($gals);
            $dis->save();
       }
    }

    private function makeslug($a) {
        $slug = str_replace(' ','',$a);
        return preg_replace('/[^A-Za-z0-9\-]/', '', $slug);
    }

    public function saveList($request,$cats) {
        
        if(isset($request['listing_type']) && $request['listing_type'] == 'sales'){
            //dd($request);
            $logo = $request['image'];
            $imageUploadPath = 'assets/uploads/sales/logo';
            $newImageName = str_replace(' ', '_', $request['name'].time());
            $uploadedImageName = $this->imageService->uploadImageAdmin($logo,$imageUploadPath,$newImageName);
            $uploadedImagePathLogo = $imageUploadPath.'/'.$uploadedImageName;
            $listing = new Sale;
            $listing->name = $request['name'];
            $listing->mode = $request['mode'];
            $listing->agent_type = $request['agent_type'];
            $listing->annual_sale = $request['annual_sale'];
            $listing->dob = $request['dob'];
            $listing->experience = $request['experience'];
            $listing->education = $request['education'];
            $listing->pan = $request['pan'];
            $listing->gst = $request['gst'];
            $listing->logo = $uploadedImagePathLogo;
            $listing->user_id = auth()->user()->id;
            $subCat = $request['scats'];
            if(!empty($request['scats'])){
                $subCat = json_encode($request['scats']);
            }
            //$listing->category_id = $request['category_id'];
            $listing->sub_category_id = $subCat;
            $state = null;
            if(!empty($request['state_id']) && isset($request['state_id'])){
                $state = json_encode($request['state_id']);
            }
            $country = null;
            if(!empty($request['country_id']) && isset($request['country_id'])){
                $country = json_encode($request['country_id']);
            }
           
            $listing->state_id = $state;
            $listing->country_id = $country;
            $listing->business_profile = $request['business_profile'];
            $listing->product_detail = $request['product_detail'];
            $listing->target_customer = $request['target_customer'];
            $listing->expected_work = $request['expected_work'];
            $listing->cities_needed = $request['cities_needed'];
            $listing->remark = $request['remark'];
            $listing->category_id = $request['category_id'];
            $listing->status = 1;
            $listing->slug = $this->makeslug($request['name']);
            $listing->save();
            
            // foreach($cats as $c) {
            //     $cat = new listing_cat;
            //     $cat->listing_id = $listing->id;
            //     $cat->category_id = $c;
            //     $cat->save();
            // }
            
        }
        if(isset($request['listing_type']) && $request['listing_type'] == 'franchise'){
            //dd($request);
            $logo = $request['logo'];
            $imageUploadPath = 'assets/uploads/franchise/logo';
            $newImageName = str_replace(' ', '_', $request['name'].time());
            $uploadedImageName = $this->imageService->uploadImageAdmin($logo,$imageUploadPath,$newImageName);
            $uploadedImagePathLogo = $imageUploadPath.'/'.$uploadedImageName;
            $listing = new Franchise;
            $listing->name = $request['name'];
            $listing->mode = $request['mode'];
            $listing->brand = $request['brand'];
            $listing->establishment = $request['establishment'];
            $listing->total_companies = $request['total_companies'];
            $listing->total_franchisee = $request['total_franchisee'];
            $listing->space = $request['space'];
            $listing->gst = $request['gst'];
            $listing->pan = $request['pan'];
            $listing->remark = $request['remark'];
            $listing->investment_capacity = $request['investment_capacity'];
            $listing->logo = $uploadedImagePathLogo;
            $listing->user_id = auth()->user()->id;
            $listing->product_keywords = $request['product_keywords'];
            $listing->fr_partner = $request['fr_partner'];
            $listing->investment_amt = $request['investment_amt'];
            $listing->investment_unit = $request['investment_unit'];
            $listing->fee = $request['fee'];
            $listing->equip = $request['equip'];
            $listing->furn = $request['furn'];
            $listing->advert = $request['advert'];
            $listing->training_program = $request['training_program'];
            $listing->softsupport = $request['softsupport'];
            $listing->is_renew = $request['is_renew'];
            $listing->business_profile = $request['business_profile'];
            $listing->meta_title = $request['meta_title'];
            $listing->meta_desc = $request['meta_desc'];
            $listing->status = 1;
            $listing->slug = $this->makeslug($request['name']);
            $state = null;
            if(!empty($request['state_id']) && isset($request['state_id'])){
                $state = json_encode($request['state_id']);
            }
            $country = null;
            if(!empty($request['country_id']) && isset($request['country_id'])){
                $country = json_encode($request['country_id']);
            }
            $listing->state_id = $state;
            $listing->country_id = $country;
            $listing->industry_type  =$request['industry_type'];
            $listing->experience  =$request['experience'];
            $listing->investment_time  =$request['investment_time'];

            $subCat = $request['scats'];
            if(!empty($request['scats'])){
                $subCat = json_encode($request['scats']);
            }
            //$listing->category_id = $request['category_id'];
            $listing->sub_category_id = $subCat;
            $listing->category_id = $request['category_id'];
            $listing->save();
            
            // foreach($cats as $c) {
            //     $cat = new listing_cat;
            //     $cat->listing_id = $listing->id;
            //     $cat->category_id = $c;
            //     $cat->save();
            // }
            
        }
        if(isset($request['listing_type']) && $request['listing_type'] == 'distributor'){
            $logo = $request['logo'];
            $imageUploadPath = 'assets/uploads/distributors/logo';
            $newImageName = str_replace(' ', '_', $request['name'].time());
            $uploadedImageName = $this->imageService->uploadImageAdmin($logo,$imageUploadPath,$newImageName);
            $uploadedImagePathLogo = $imageUploadPath.'/'.$uploadedImageName;
            
            $listing = new Distributor;
            $listing->name = $request['name'];
            $listing->user_id = auth()->user()->id;
            $listing->mode = $request['mode'];
            $listing->gst = $request['gst'];
            $listing->pan = $request['pan'];
            $listing->brand = $request['brand'];
            $listing->establishment = $request['establishment'];
            $listing->anualsale_start = $request['anualsale_start'];
            $listing->anualsale_end = $request['anualsale_end'];
            $listing->anualsale_unit = $request['anualsale_unit'];
            $listing->total_distributors = $request['total_distributors'];
            $listing->space = $request['space'];
            $listing->logo = $uploadedImagePathLogo;
            $listing->business_profile = $request['business_profile'];
            $listing->experience = $request['experience'];

            $state = null;
            if(!empty($request['state_id']) && isset($request['state_id'])){
                $state = json_encode($request['state_id']);
            }
            $country = null;
            if(!empty($request['country_id']) && isset($request['country_id'])){
                $country = json_encode($request['country_id']);
            }
            $listing->state_id = $state;
            $listing->country_id = $country;
            $listing->remark = $request['remark'];
            $type_distributorship=  $request['type_distributorship'] ;
            if(!empty($request['type_distributorship'])){
               $type_distributorship =  json_encode($request['type_distributorship']);
            }
            $listing->type_distributorship = $type_distributorship;
            $listing->product_keyword = $request['product_keyword'];
            $listing->investment_required = $request['investment_required'];
            $listing->investment_time = $request['investment_time'];
            $listing->investment_capacity = $request['investment_capacity'];
            $subCat = $request['scats'];
            if(!empty($request['scats'])){
                $subCat = json_encode($request['scats']);
            }
            //$listing->category_id = $request['category_id'];
            $listing->sub_category_id = $subCat;
            $listing->category_id = $request['category_id'];
            $listing->slug = $this->makeslug($request['name']);
           // dd($listing);
            $listing->save();
            
            // foreach($cats as $c) {
            //     $cat = new listing_cat;
            //     $cat->listing_id = $listing->id;
            //     $cat->category_id = $c;
            //     $cat->save();
            // }
        }
    }

    public function blogList() {
        $blogs = AdminBlogModel::select('*')
        ->where('is_featured','0')
        ->orderBy('created_at', 'desc')
        ->where('scheduled_date','<=',Carbon::now()->format('Y-m-d'))
        ->paginate(6);
        $featuredBlog = AdminBlogModel::where('is_featured','1')
        ->select('*')
        ->where('scheduled_date','<=',Carbon::now()
        ->format('Y-m-d'))
        ->first();
        return ['blogs' => $blogs, 'featuredBlog' => $featuredBlog];
    }

    public function blogRand() {
        $cat = Category::where('parent_id','=',NULL)->orderBy('id', 'asc')->get();
        return ['cats'=>$cat, 'firstsubcat'=>Category::where('parent_id',$cat[0]->id)->get()];
    }

    public function catById($cat_ids) {
        $cat = Category::whereIn('id',$cat_ids)->orderBy('id', 'asc')->get();
        return $cat;
    }

    public function updateDistributor($request)
    {       
       
            $listing = Distributor::findOrFail($request["id"]);
            $listing->name = $request['name'];
            $listing->user_id = auth()->user()->id;
            $listing->mode = $request['mode'];
            $listing->gst = $request['gst'];
            $listing->pan = $request['pan'];
            $listing->brand = $request['brand'];
            $listing->establishment = $request['establishment'];
            $listing->anualsale_start = $request['anualsale_start'];
            $listing->anualsale_end = $request['anualsale_end'];
            $listing->anualsale_unit = $request['anualsale_unit'];
            $listing->total_distributors = $request['total_distributors'];
            $listing->space = $request['space'];
            //if image uploaded
            if(isset($request['logo']))
            {    
                $logo = $request['logo'];         
               $imageUploadPath = 'assets/uploads/distributors/logo';
               $newImageName = str_replace(' ', '_', $request['name'].time());
               $uploadedImageName = $this->imageService->uploadImageAdmin($logo,$imageUploadPath,$newImageName);
               $uploadedImagePathLogo = $imageUploadPath.'/'.$uploadedImageName;
               $logo =  $uploadedImagePathLogo;
               $listing->logo = $logo;
            }

            
            $listing->business_profile = $request['business_profile'];
            $listing->experience = $request['experience'];

            $state = null;
            if(!empty($request['state_id']) && isset($request['state_id'])){
                $state = json_encode($request['state_id']);
            }
            $country = null;
            if(!empty($request['country_id']) && isset($request['country_id'])){
                $country = json_encode($request['country_id']);
            }
            $listing->state_id = $state;
            $listing->country_id = $country;
            $listing->remark = $request['remark'];
            $type_distributorship=  $request['type_distributorship'] ;
            if(!empty($request['type_distributorship'])){
               $type_distributorship =  json_encode($request['type_distributorship']);
            }
            $listing->type_distributorship = $type_distributorship;
            $listing->product_keyword = $request['product_keyword'];
            $listing->investment_required = $request['investment_required'];
            $listing->investment_time = $request['investment_time'];
            $listing->investment_capacity = $request['investment_capacity'];
            $listing->slug = $this->makeslug($request['name']);

            $subCat = $request['scats'];
            if(!empty($request['scats'])){
                $subCat = json_encode($request['scats']);
            }
            $listing->sub_category_id = $subCat;
            $listing->category_id = $request['category_id'];
            $listing->save();

    }
    public function updateSalesAgent($request)
    {
      
        $listing = Sale::findOrFail($request['id']);
        $listing->name = $request['name'];
        $listing->mode = $request['mode'];
        $listing->agent_type = $request['agent_type'];
        $listing->annual_sale = $request['annual_sale'];
        $listing->dob = $request['dob'];
        $listing->experience = $request['experience'];
        $listing->education = $request['education'];
        $listing->pan = $request['pan'];
        $listing->gst = $request['gst'];
        if(isset($request['image']))
        {
        $logo = $request['image'];
        $imageUploadPath = 'assets/uploads/sales/logo';
        $newImageName = str_replace(' ', '_', $request['name'].time());
        $uploadedImageName = $this->imageService->uploadImageAdmin($logo,$imageUploadPath,$newImageName);
        $uploadedImagePathLogo = $imageUploadPath.'/'.$uploadedImageName;
        $listing->logo = $uploadedImagePathLogo;
        }
        $listing->user_id = auth()->user()->id;
        $subCat = $request['scats'];
        if(!empty($request['scats'])){
            $subCat = json_encode($request['scats']);
        }
        //$listing->category_id = $request['category_id'];
        $listing->sub_category_id = $subCat;
        $state = null;
        if(!empty($request['state_id']) && isset($request['state_id'])){
            $state = json_encode($request['state_id']);
        }
        $country = null;
        if(!empty($request['country_id']) && isset($request['country_id'])){
            $country = json_encode($request['country_id']);
        }
       
        $listing->state_id = $state;
        $listing->country_id = $country;
        $listing->business_profile = $request['business_profile'];
        $listing->product_detail = $request['product_detail'];
        $listing->target_customer = $request['target_customer'];
        $listing->expected_work = $request['expected_work'];
        $listing->cities_needed = $request['cities_needed'];
        $listing->remark = $request['remark'];
        $listing->status = 1;
        $listing->category_id = $request['category_id'];
        $listing->slug = $this->makeslug($request['name']);
        $listing->save();
          
    }
    public function updateFrenchise($request)
    {
     
        $listing = Franchise::findOrFail($request['id']);
        $listing->name = $request['name'];
        $listing->mode = $request['mode'];
        $listing->brand = $request['brand'];
        $listing->establishment = $request['establishment'];
        $listing->total_companies = $request['total_companies'];
        $listing->total_franchisee = $request['total_franchisee'];
        $listing->space = $request['space'];
        $listing->gst = $request['gst'];
        $listing->pan = $request['pan'];
        $listing->remark = $request['remark'];
        $listing->investment_capacity = $request['investment_capacity'];

        if(isset($request['logo']))
        {
        $logo = $request['logo'];
        $imageUploadPath = 'assets/uploads/franchise/logo';
        $newImageName = str_replace(' ', '_', $request['name'].time());
        $uploadedImageName = $this->imageService->uploadImageAdmin($logo,$imageUploadPath,$newImageName);
        $uploadedImagePathLogo = $imageUploadPath.'/'.$uploadedImageName;
        $listing->logo =$uploadedImagePathLogo;
        }
        $listing->user_id = auth()->user()->id;
        $listing->product_keywords = $request['product_keywords'];
        $listing->fr_partner = $request['fr_partner'];
        $listing->investment_amt = $request['investment_amt'];
        $listing->investment_unit = $request['investment_unit'];
        $listing->fee = $request['fee'];
        $listing->equip = $request['equip'];
        $listing->furn = $request['furn'];
        $listing->advert = $request['advert'];
        $listing->training_program = $request['training_program'];
        $listing->softsupport = $request['softsupport'];
        $listing->is_renew = $request['is_renew'];
        $listing->business_profile = $request['business_profile'];
        $listing->meta_title = $request['meta_title'];
        $listing->meta_desc = $request['meta_desc'];
        $listing->status = 1;
        $listing->industry_type  =$request['industry_type'];
        $listing->experience  =$request['experience'];
        $listing->investment_time  =$request['investment_time'];
        $listing->slug = $this->makeslug($request['name']);
        $state = null;
        if(!empty($request['state_id']) && isset($request['state_id'])){
            $state = json_encode($request['state_id']);
        }
        $country = null;
        if(!empty($request['country_id']) && isset($request['country_id'])){
            $country = json_encode($request['country_id']);
        }
        $listing->state_id = $state;
        $listing->country_id = $country;
        $subCat = $request['scats'];
        if(!empty($request['scats'])){
            $subCat = json_encode($request['scats']);
        }
        $listing->category_id = $request['category_id'];
        $listing->sub_category_id = $subCat;

        $listing->save();
        
        //  if(count($request['scats'])>0)
        //     {
        //         $cat = listing_cat::where('listing_id',$listing->id)->delete();
        //     }
        //     foreach($request['scats'] as $c) {
        //         $cat = new listing_cat;
        //         $cat->listing_id = $listing->id;
        //         $cat->category_id = $c;
        //         $cat->save();
        //     }
    }

    public function userListing($uid) {

        if(auth()->user()->intrested == 0){
            $data = Distributor::where('user_id',$uid)->orderBy('id','desc')->paginate(10);
        }
       else if(auth()->user()->intrested == 1){
            $data = Franchise::where('user_id',$uid)->orderBy('id','desc')->paginate(10);
        }
       else if(auth()->user()->intrested == 2){
                $data = Sale::where('user_id',$uid)->orderBy('id','desc')->paginate(10);
                
        }
        
      
        return $data;
    }

    public function gallery($type,$listing_id) {
        if($type == 0) {
            $data = Distributor::where('id',$listing_id)->first(['gallery','name']);
            return $data;
        }
        if($type == 1) {
            $data = Franchise::where('id',$listing_id)->first(['gallery','name']);
            return $data;
        }

        if($type == 2) {
            $data = Sale::where('id',$listing_id)->first(['gallery','name']);
            return $data;
        }
    }

    public function allListing($type) {
        if($type == 'distributor') {
            $data = Distributor::leftJoin('users as u','u.id','=','distributors.user_id')->select("distributors.*","u.phone")->where("distributors.is_featured",1)->orderBy('distributors.id', 'desc')->get();
        }
        if($type == 'franchise') {
            $data = Franchise::leftJoin('users as u','u.id','=','franchisees.user_id')->select("franchisees.*","u.phone")->where("franchisees.is_featured",1)->orderBy('franchisees.id', 'desc')->get();
        }
        if($type == 'sales') {
            $data = Sale::leftJoin('users as u','u.id','=','sales.user_id')->select("sales.*","u.phone")->where("sales.is_featured",1)->orderBy('sales.id', 'desc')->get();
            return $data;
        }
        return $data;
    }

    public function listingDetail($slug,$type) {
        if($type == 0) {
            $data = Distributor::leftJoin('users','users.id','=','distributors.user_id')->where('slug',$slug)->first(['distributors.*','users.name as contactname','users.phone','users.company_name','users.address','users.city','users.zipcode']);
        }
        if($type == 1) {
            $data = Franchise::leftJoin('users','users.id','=','franchisees.user_id')->where('slug',$slug)->first(['franchisees.*','users.name as contactname','users.phone','users.company_name','users.address','users.city','users.zipcode']);
        }

        if($type == 2) {
            $data = Sale::leftJoin('users','users.id','=','sales.user_id')->where('slug',$slug)->first(['sales.*','users.name as contactname','users.phone','users.company_name','users.address','users.city','users.zipcode']);
        }
        return $data;
    }

    public function getListingCats($listing_id, $type) {
        $cats = listing_cat::leftJoin('categories', 'categories.id', '=', 'listing_cat.category_id')->where('listing_id',$listing_id)->get(['categories.id','categories.name']);
        return $cats;
    }

    public function regions() {
        $regions = Region::where('status',1)->pluck('name')->all();
        return $regions;
    }

    public function getListingStates()
    {
       $states = State::leftjoin('regions as r','r.id','=','states.region_id')->leftjoin("countries as c",'c.id','=','states.country_id')->where('states.status',1)->orderBy('r.name')->get(['states.id','states.name as state','r.name as region','c.name as country']);
       return $states;
    }

    public function getListingCountries()
    {
        $countries = Country::where('status',1)->where("name","!=","Across India")->orderBy('name')->get(['id','name']);
        return $countries;
    }

    public function subCat($id) {
        return Category::where('parent_id',$id)->get(['id','name']);
    }

    public function blogDetail($slug) {
        $blogrand = AdminBlogModel::inRandomOrder()->orderBy('id', 'desc')->take(3)->get();
        $detail = AdminBlogModel::select('*')->where('blog_slug',$slug)->first();
        return ['blogrand' => $blogrand, 'detail' => $detail];
    }

    public function mediaList() {
        $photos = AdminMediaModel::select('media_name','media_path')->where('media_type','image')->orderBy('id', 'desc')->paginate(6, ['*'], 'mediaphotos');
        $videos = AdminMediaModel::select('media_name','media_thumb','media_path')->where('media_type','video')->orderBy('id', 'desc')->paginate(6, ['*'], 'mediavideos');
        $news = AdminMediaModel::select('media_name','media_path','media_news','media_meta_desc','media_slug')->where('media_type','news')->orderBy('id', 'desc')->paginate(6, ['*'], 'medianews');
        return ['photos' => $photos, 'videos' => $videos, 'news' => $news];
    }


    public function searchDetails($type,$id)
    {
        if($type == 0){
            $data = Distributor::findOrFail($id);
            $data->leftJoin('users as u','u.id','=','distributors.user_id')->select("distributors.*","u.phone");
             $result =  $data->first();
             return $result;
        }
       else if($type == 1){
            $data = Franchise::findOrFail($id);
            $data->leftJoin('users as u','u.id','=','franchisees.user_id')->select("franchisees.*","u.phone");
           $result =  $data->first();
             return $result;
        }
        
        else if($type == 2){
            $data = Sale::findOrFail($id);
            $data->leftJoin('users as u','u.id','=','sales.user_id')->select("sales.*","u.phone");
            $result =  $data->first();
             return $result;
        }
        
    }

    public function relatedCategory($category_id,$type,$list_id)
    {
        if($type == 0){
            $data = Distributor::where('distributors.category_id',$category_id)->where("distributors.id",'!=',$list_id);
            $data->leftJoin('users as u','u.id','=','distributors.user_id')->select("distributors.*","u.phone");
             $result =  $data->orderBy("distributors.id","desc")->take(4)->get();
             return $result;
        }
       else if($type == 1){
            $data = Franchise::where('franchisees.category_id',$category_id)->where("franchisees.id",'!=',$list_id);
            $data->leftJoin('users as u','u.id','=','franchisees.user_id')->select("franchisees.*","u.phone");
           $result =  $data->orderBy("franchisees.id","desc")->take(4)->get();
             return $result;
        }
        
        else if($type == 2){
            $data = Sale::where('sales.category_id',$category_id)->where("sales.id",'!=',$list_id);
            $data->leftJoin('users as u','u.id','=','sales.user_id')->select("sales.*","u.phone");
            $result =  $data->orderBy("sales.id","desc")->take(4)->get();
             return $result;
        }
        
    }
}
?>
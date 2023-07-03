<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use App\Models\State;
use App\Models\Country;
use App\Models\Category;
class Helper
{
    public static function location($column,$locationType)
    {
        $loc ="";$location ="";
        if(!empty($column) && $locationType == 'state')
        {
        $ids = array_map('intval', json_decode($column));       
        $location = State::whereIn("id",$ids)->pluck('name')->toArray();
       
        }
        else if(!empty($column) && $locationType == 'country')
        {
        $ids = array_map('intval', json_decode($column));
        $location = Country::whereIn("id",$ids)->pluck('name')->toArray();
       
        }

        if(!empty($location)){
         $loc = implode(",",$location);
        }
        return  $loc;
    }

    public static function getSubCat($ids){
        $sub_cat ="";
        if(!empty($ids))
        {
        $sub_cat_ids = array_map('intval', json_decode($ids));
        $result = Category::whereIn("id",$sub_cat_ids)->pluck('name')->toArray();
        
        if(!empty($result)){
            $sub_cat = implode(",",$result);
       
        }
        return  $sub_cat;
        }
    }

    public static function getCat($id){
        $result = Category::where("parent_id",$id)->pluck('name');
        return  $result;
    }
    public static function getCatName($id){
        $name = Category::where("id",$id)->pluck('name')->first(); 
        return  $name;
    }

   
}
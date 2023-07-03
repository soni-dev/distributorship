<?php

namespace App\Interfaces\Web;

Interface GeneralServiceInterface
{
    public function contactUs($request);

    public function saveList($request,$cats);

    public function saveImage($request);

    public function getListingCats($listing_id, $type);

    public function search($request,$type);

    public function blogList();

    public function blogRand();

    public function userListing($uid);

    public function gallery($type,$listing_id);

    public function allListing($type);

    public function listingDetail($slug,$type);

    public function subCat($id);

    public function blogDetail($slug);

    public function mediaList();
    public function regions();
    public function getListingStates();
    public function getListingCountries();
    public function updateDistributor($request);
    public function updateSalesAgent($request);
    public function updateFrenchise($request);
    public function catById($cat_ids);
    public function searchDetails($type,$id);
    public function relatedCategory($category_id,$type,$list_id);
}

?>
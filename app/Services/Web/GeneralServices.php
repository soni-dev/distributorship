<?php

namespace App\Services\Web;
use App\Interfaces\Web\GeneralInterface;
use App\Interfaces\Web\GeneralServiceInterface;


class GeneralServices implements GeneralServiceInterface
{
    private $GeneralInterface;

    public function __construct(GeneralInterface $GeneralInterface) 
    {
        $this->GeneralInterface = $GeneralInterface;
    }

    public function contactUs($request)
    {
        $this->GeneralInterface->contactUs($request);
    }

    public function saveList($request,$cats)
    {
        $this->GeneralInterface->saveList($request,$cats);
    }

    public function saveImage($request) {
        $this->GeneralInterface->saveImage($request);
    }

    public function getListingCats($listing_id, $type) {
        return $this->GeneralInterface->getListingCats($listing_id, $type);
    }

    public function search($request,$type)
    {
        return $this->GeneralInterface->search($request,$type);
    }

    public function blogList()
    {
        return $this->GeneralInterface->blogList();
    }

    public function blogRand()
    {
        return $this->GeneralInterface->blogRand();
    }

    public function userListing($uid) {
        return $this->GeneralInterface->userListing($uid);
    }

    public function gallery($type,$listing_id) {
        return $this->GeneralInterface->gallery($type,$listing_id);
    }

    public function allListing($type) {
        return $this->GeneralInterface->allListing($type);
    }

    public function listingDetail($slug,$type) {
        return $this->GeneralInterface->listingDetail($slug,$type);
    }

    public function subCat($id)
    {
        return $this->GeneralInterface->subCat($id);
    }

    public function blogDetail($slug)
    {
        return $this->GeneralInterface->blogDetail($slug);
    }

    public function mediaList()
    {
        return $this->GeneralInterface->mediaList();
    }
    
    public function regions()
    {
        return $this->GeneralInterface->regions();
    }

    public function getListingStates()
    {
        return $this->GeneralInterface->getListingStates();
    }
    public function getListingCountries()
    {
        return $this->GeneralInterface->getListingCountries();
    }

    public function updateDistributor($request)
    {
        return $this->GeneralInterface->updateDistributor($request);
    }
    public function updateSalesAgent($request)
    {
        return $this->GeneralInterface->updateSalesAgent($request);
    }
    public function updateFrenchise($request)
    {
        return $this->GeneralInterface->updateFrenchise($request);
    }

    public function catById($cat_ids)
    {
        return $this->GeneralInterface->catById($cat_ids);
    }

    public function searchDetails($type,$id)
    {
        return $this->GeneralInterface->searchDetails($type,$id);
    }
     
    public function relatedCategory($category_id,$type,$list_id)
    {
        return $this->GeneralInterface->relatedCategory($category_id,$type,$list_id);
    }
  

   
}
?>
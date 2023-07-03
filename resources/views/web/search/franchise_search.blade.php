@extends('layouts.weblayout')
@section('content')
<header class="bg-warning">
    <div class="container">
      <div class="row align-items-center mt-4">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h5 class="display- text-white mt-5 mb-2 mtitle">Search for Business Opportunities</h5>
          <p class="lead text-white-50"></p>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item profiletab col-lg-3 col-md-3 col-sm-3 col-12 active ">
              <a class="profiletab-link profiletab " id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" >
              Franchisees Search</a>
            </li>
          </ul>


          <div class="tab-content h-100 tab-brk" id="myTabContent">

            <!-- ***********Franchise Search*********** -->
            <div class="tab-pane fade show active profiletab pt-4 pb-4" id="profile" role="tabpanel" aria-labelledby="home-tab">
             
            @include('web.tabs.franchise_search_filter',['cats'=>$blogRand['cats']])
            </div>
            <!-- ***********End Distributors Search*********** -->

          </div>
        </div>
      </div>
    </div>
    
    
  </header>
<div class="container  sec-box">
    <div class="row">
        <div class="col-md-12">
          <p><strong>{{count($result)}} Results found for</strong><br/>Find below list of companies, who are looking for Franchisees</p>
        </div>
    @if(count($result) > 0)
        @foreach($result as $franchise)
        <div class="col-sm-6">
          @include('web.search.listing_fran',['logo'=>url($franchise->logo), 'name'=>$franchise->name, 'product_keywords'=>$franchise->product_keywords, 'investment_amt'=>$franchise->investment_amt, 'investment_unit'=>$franchise->investment_unit,'slugroot'=>'franchise', 'slug'=>strtolower($franchise->slug),'space'=>$franchise->space,'location'=>Helper::location($franchise->state_id,'state'),'location2'=>Helper::location($franchise->country_id,'country'),'id'=>$franchise->id,'mode'=>$franchise->mode,'type'=>1,'phone'=>$franchise->phone])
        </div>
        @endforeach
    @else
        <div class="col-sm-12"><h4>No Record Found ! </h4></div>
    @endif
    </div>    
</div>

    
@endsection
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
            <li class="nav-item hometab col-lg-3 col-md-3 col-sm-3 col-12 active ">
              <a class="hometab-link hometab " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" >
              Distributors Search</a>
            </li>
          </ul>


          <div class="tab-content h-100 tab-brk" id="myTabContent">

            <!-- ***********Distributors Search*********** -->
            <div class="tab-pane fade show active hometab pt-4 pb-4" id="home" role="tabpanel" aria-labelledby="home-tab">

            @include('web.tabs.db_search',['cats'=>$blogRand['cats']])
            </div>
            <!-- ***********End Distributors Search*********** -->

          </div>
        </div>
      </div>
    </div>
    
    
  </header>
<div class="container sec-box">
    <div class="row">
      <div class="col-md-12">
        <p><strong>{{count($result)}} Results found for</strong><br/>Find below list of companies, who are looking for distributor</p>
      </div>
    @if(count($result) > 0)
        @foreach($result as $distributor)
        <div class="col-sm-6">
          @include('web.search.listing_distributor',['logo'=>url($distributor->logo), 'name'=>$distributor->name, 'anualsale_start'=>$distributor->anualsale_start, 'anualsale_end'=>$distributor->anualsale_end, 'anualsale_unit'=>$distributor->anualsale_unit,'slugroot'=>'distributor', 'slug'=>strtolower($distributor->slug),'location'=>Helper::location($distributor->state_id,'state'),'location2'=>Helper::location($distributor->country_id,'country'),'products'=>$distributor->products,'space'=>$distributor->space,'id'=>$distributor->id,'mode'=>$distributor->mode,'type'=>0,'phone'=>$distributor->phone])
        </div>
        @endforeach
    @else
        <div class="col-sm-12"><h4>No Record Found ! </h4></div>
    @endif
    </div>    
</div>

    
@endsection
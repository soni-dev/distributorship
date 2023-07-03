@extends('layouts.weblayout')
@section('content')
<header class="bg-warning">
    <div class="container">
      <div class="row align-items-center mt-4">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h5 class="display- text-white mt-5 mb-2 mtitle">Search for Business Sales Agents</h5>
          <p class="lead text-white-50"></p>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item contacttab col-lg-3 col-md-3 col-sm-3 col-12 active ">
              <a class="contacttab-link contacttab " id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" >
              Sales Agents Search</a>
            </li>
          </ul>


          <div class="tab-content h-100 tab-brk" id="myTabContent">

            <!-- ***********Franchise Search*********** -->
            <div class="tab-pane fade show active contacttab pt-4 pb-4" id="contact" role="tabpanel" aria-labelledby="contact-tab">
             
            @include('web.tabs.salesagent_search_filter',['cats'=>$blogRand['cats']])
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
        @foreach($result as $sale)
        <div class="col-sm-6">
          @include('web.search.listing_sale',['logo'=>url($sale->logo), 'name'=>$sale->name, 'product_detail'=>$sale->product_detail, 'slugroot'=>'sales', 'slug'=>strtolower($sale->slug),'space'=>$sale->space,'location'=>Helper::location($sale->state_id,'state'),'location2'=>Helper::location($sale->country_id,'country'),'id'=>$sale->id,'mode'=>$sale->mode,'type'=>2,'phone'=>$sale->phone])
        </div>
        @endforeach
    @else
        <div class="col-sm-12"><h4>No Record Found ! </h4></div>
    @endif
    </div>    
</div>

    
@endsection
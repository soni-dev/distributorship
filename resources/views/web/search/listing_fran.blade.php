<style>
    .mylist{border: 1px solid #CCC; padding: 13px; text-align: center;}
</style>
<div class="mylist">
    <div class="row mx-auto">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12 mr-0 pr-0  mx-auto">
          <a href="{{route('fran.details',[$slug])}}"><h6 class="fscolor">{{$name}}</h6></a>
          
          
        </div>
      </div>
      <div class="row mx-auto">
        <div class="col-sm-4 col-md-4 col-lg-4 col-xs-4 mr-0 pr-0 mx-auto mt-2 ">
          <a href="{{route('fran.details',[$slug])}}">
            <img alt="" src="{{ $logo }}" class="border img-fluid img-responsive">
            
          </a>
        </div>
        <div class="col-sm-8 col-md-8 col-lg-8 col-xs-8 mt-3 mx-auto">
          <h6 class="mx-auto"><strong>Products for Distribution:</strong></h6>
                  <label>{{$product_keywords}}</label>
        </div>
      </div>
      <div class="row mx-auto mt-2 mb-">
        <div class="col-sm-12 col-md-12 col-lg-12  mr-0 pr-0  mx-auto">
          <h6><strong>Preferred Location:</strong></h6>
          <label class="mx-auto">
                    {{$location}}{{!empty($location2)?(!empty($location)?" , ":"").$location2:""}}</label>
        </div>
      </div>
      <div class="row mt-3 mx-auto border-bottom">
        <div class="col-sm-6 col-md-6 col-lg-6 col-xs-6 mx-auto  border-top border-right">
          
          <h6 class="mt-2 mx-auto "><strong>Investment Required:</strong></h6>
          <div class="mb-2 mx-auto ">{{$investment_amt}} {{$investment_unit}} </div>
          
        </div>
        <div class="col-sm-6 col-md-6 col-sm-6 col-xs-6 mx-auto border-top">
          <h6 class="mt-2 mx-auto"><strong>Space Required:</strong></h6>
          <div class="mb-2 mx-auto ">{{$space}}</div>
        </div>
      </div>
      
      
      <div class="row  mb-2 mx-auto">
        <div class="col-sm-8 col-md-8 col-lg-8 col-xs-8 mx-auto ">
          <h6 class="mt-2 ">
              <br><br>
          {{-- <img src="images/call.png" width="15" class="mx-auto" height="15">&nbsp; --}}
          <strong class="callcolor mx-auto">{{$phone}}</strong>
                </h6></div>
        <div class="col-sm-4 col-md-4 col-lg-4  mx-auto">
          <a roll="button" class="btn blue-btn mt-3" href="{{route('fran.details',[$slug])}}">
          View more</a>
          
        </div>
      </div>
</div>
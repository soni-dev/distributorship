@extends('layouts.weblayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <h4>Welcome Rajat Shah</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
        <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link" id="nav-home-tab" href="{{URL::to('dashboard')}}">Dashboard</a>
    <a class="nav-link " id="nav-home-tab" href="{{URL::to('add-listing')}}">Add Listing</a>
    <a class="nav-link " id="nav-home-tab" href="{{route('profile')}}">Profile </a>
    <a class="nav-link active" id="nav-contact-tab" href="{{route('inbox.inquiry')}}">Inbox</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent" style="border: 1px solid #CCC; background: #FFF; margin-top: -1px; padding: 17px;">
<p>Inbox</p>
<div class="row">
    @forelse($result as $r)
    @php $in = ($r->interested_in==0)?"Distributor":(($r->interested_in=="2")?"Sales Agent":"Franchise") @endphp
    <div class="col-sm-12 col-md-4">
       
        <div class="border p-3 text-justify bg-light">
            
            <div class="pdetail">
                
                <h5><strong>Brand: &nbsp;</strong>  {{$r->brand_name}}</h5>
                <p ><strong>Phone Number: &nbsp;</strong>  {{$r->mobile}}</p>
                <p ><strong>Email: &nbsp;</strong>  {{$r->email}}</p>
                <p ><strong>Interested In: &nbsp;</strong>  {{$in}}</p>
                <p ><strong>Message: &nbsp;</strong>  {{$r->message}}</p>
            </div>
        </div>
    </div>
   
    @empty
    <div class="col-md-12 col-sm-12 col-lg-12">
        <h3>No Records Found!!</h3>
    </div>
    @endforelse

</div>


</div>
        </div>
    </div>
</div>

    
@endsection
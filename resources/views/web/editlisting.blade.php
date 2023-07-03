@extends('layouts.weblayout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <h4>Welcome {{auth()->user()->name}}</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
        <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-link" id="nav-home-tab" href="{{URL::to('dashboard')}}">Dashboard</a>
    <a class="nav-link active" id="nav-home-tab" href="{{URL::to('add-listing')}}">Edit Listing</a>
    <a class="nav-link" id="nav-profile-tab" href="{{route('profile')}}">Profile</a>
    <a class="nav-link" id="nav-contact-tab" href="{{route('inbox.inquiry')}}">Inbox</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent" style="border: 1px solid #CCC; background: #FFF; margin-top: -1px; padding: 17px;">
    @php $interested = (auth()->user()->intrested == 1)?'Franchise':((auth()->user()->intrested == 2)?'Sales Agent':'Distributor'); @endphp 
 
<p>Edit {{$interested}}</p>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if(auth()->user()->intrested == 1)
  @include('web.edit.franchise')
@elseif(auth()->user()->intrested == 2)
  @include('web.edit.salesagent')
@else
  @include('web.edit.distributor')
@endif

</div>
        </div>
    </div>
</div>

    
@endsection
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
    <a class="nav-link active" id="nav-home-tab" href="{{URL::to('dashboard')}}">Dashboard</a>
    <a class="nav-link" id="nav-home-tab" href="{{URL::to('add-listing')}}">Add Listing</a>
    <a class="nav-link" id="nav-profile-tab" href="{{route('profile')}}">Profile</a>
    <a class="nav-link" id="nav-contact-tab" href="{{route('inbox.inquiry')}}">Inbox</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent" style="border: 1px solid #CCC; background: #FFF; margin-top: -1px; padding: 17px;">
  <h5 class="mb-3">Gallery for Post - {{ $mygals->name }}</h5>
  <div>
  <form action="{{ url('web/addgallery') }}" method="post" class="p-3" enctype="multipart/form-data" style="border: 1px solid  #e4d3d3de;">
    @csrf
    <input type="hidden" name="listing_id" value="{{ $id }}">
    {{-- <input type="file" name="logo" class="form-control"> 
     --}}

    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">Upload</span>
      </div>
      <div class="custom-file">
        <input type="file"  name="logo" class="custom-file-input" id="inputGroupFile01">
        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
      </div>
    </div>
    <input type="submit" name="upload" value="Upload" class="btn btn-primary" />
  </form>
  </div>
  <div class="container">
    <div class="row mt-5" style="border: 1px solid  #e4d3d3de;">  
      <div class="col-md-12">
        <h1 class="text-center p-2">Gallery Images</h1>
      </div>
    @if(count($gals) > 0)
  
    @php $interest = (auth()->user()->intrested == 1)?'franchise':((auth()->user()->intrested == 2)?'sale':'distributors'); @endphp 
 
    @foreach($gals as $key=> $gal)
    <div class="col-sm-3 mb-3" id="{{$key}}">
      <img class="img-thumbnail" src="{{ url('public/assets/uploads/')}}/{{$interest}}/gallary/{{$gal}}" />

      <span class="remove-image" href="javascript:void(0)" onclick="deleteImg('{{auth()->user()->intrested}}','{{$gal}}','{{ route('img.delete') }}',{{$id}},{{$key}})" style="display: inline;">×</span>
      <span class="text-danger {{$key}}" ></span>
    </div>
    @endforeach
    @endif
    </div>
  </div>
</div>
        </div>
    </div>
</div>

    
@endsection
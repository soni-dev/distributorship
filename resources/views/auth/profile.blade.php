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
    <a class="nav-link active" id="nav-home-tab" href="{{route('profile')}}">Profile </a>
    <a class="nav-link" id="nav-contact-tab" href="{{route('inbox.inquiry')}}">Inbox</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent" style="border: 1px solid #CCC; background: #FFF; margin-top: -1px; padding: 17px;">
{{-- <p>Profile</p> --}}
@if ($message = Session::get('success'))
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@elseif($message = Session::get('fail'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="container" style="margin-top:90px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profile') }}</div>

                <div class="card-body">
                  

<form method="POST" action="{{ route('update.profile') }}">
    @csrf
<input type="hidden" name="id" value="{{$data->id}}"/>
    <div class="row mb-3">
        <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

        <div class="col-md-6">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $data->name }}" required autocomplete="name" autofocus>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

        <div class="col-md-6">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $data->email }}" required autocomplete="email">

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="company_name" class="col-md-4 col-form-label text-md-end">{{ __('Company Name') }}</label>

        <div class="col-md-6">
            <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{$data->company_name}}" >

            @error('company_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="address" class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

        <div class="col-md-6">
            <input id="address" type="text" class="form-control  @error('address') is-invalid @enderror" name="address"  autocomplete="Address" value="{{$data->address}}">
            @error('address')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>

    <div class="row mb-3">
        <label for="city" class="col-md-4 col-form-label text-md-end">{{ __('city') }}</label>

        <div class="col-md-6">
            <input id="city" type="text" class="form-control  @error('city') is-invalid @enderror" name="city"  autocomplete="City" value="{{$data->city}}">
            @error('city')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="zipcode" class="col-md-4 col-form-label text-md-end">{{ __('zipcode') }}</label>

        <div class="col-md-6">
            <input id="zipcode" type="text" class="form-control  @error('zipcode') is-invalid @enderror" name="zipcode"  autocomplete="Zipcode" value="{{$data->zipcode}}">
            @error('zipcode')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="intrested" class="col-md-4 col-form-label text-md-end">{{ __('Interested In') }}</label>

        <div class="col-md-6">
            <input type="radio" name="intrested" value="0" {{($data->intrested==0)?'checked':''}}> Distributorship &nbsp;&nbsp;<input type="radio"  name="intrested" value="1"  {{($data->intrested==1)?'checked':''}}> Frebchise &nbsp;&nbsp;<input type="radio" name="intrested" value="2"  {{($data->intrested==2)?'checked':''}}> Sales Agent 
        </div>
        @error('intrested')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    </div>

    <div class="row mb-3">
        <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone Number') }}</label>

        <div class="col-md-6">
            <input id="phone" type="text" class="form-control  @error('phone') is-invalid @enderror" name="phone" value=" {{$data->phone}}"  >  
            @error('phone')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        </div>
    </div>

    <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                {{ __('Update') }}
            </button>
        </div>
    </div>
</form>
                 {{-- <table class="table table-striped table-bordered">
                    <tr>
                        <th>User Name</th>
                        <td>{{$data->name}}</td>
                        <th>Email</th>
                        <td>{{$data->email}}</td>
                       
                    </tr>
                    <tr>
                        <th>Phone</th>
                        <td>{{$data->phone}}</td>
                        <th>Interested In</th>                        
                        <td>{{ $type}}</td>
                    </tr>
                 </table> --}}
                </div>
            </div>
        </div>
    </div>
</div>

</div>
        </div>
    </div>
</div>

    
@endsection
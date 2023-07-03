@extends('layouts.weblayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h4>Welcome {{ auth()->user()->name }}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <a class="nav-link active" id="nav-home-tab" href="{{ URL::to('dashboard') }}">Dashboard</a>
                        <a class="nav-link" id="nav-home-tab" href="{{ URL::to('add-listing') }}">Add Listing</a>
                        <a class="nav-link" id="nav-profile-tab" href="{{route('profile')}}">Profile</a>
                        <a class="nav-link" id="nav-contact-tab" href="{{route('inbox.inquiry')}}">Inbox</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent"
                    style="border: 1px solid #CCC; background: #FFF; margin-top: -1px; padding: 17px;">
                    @php $interested = (auth()->user()->intrested == 1)?'french.edit':((auth()->user()->intrested == 2)?'sales.edit':'dist.edit'); @endphp
                    <h5>You are interested in <span
                            style="background: #102e4c;color: #FFF;padding: 6px;border-radius: 11px;">
                            @if (auth()->user()->intrested == 1)
                                Frenchise
                            @elseif(auth()->user()->intrested == 2)
                                Sales Agent
                            @else
                                Distributors
                            @endif
                        </span></h5>
                    @if ($listing)
                        @foreach ($listing as $list)
                            <div class="card">
                                <div class="row">
                                    <div class="col-sm-3"><img src="{{ $list->logo }}" style="width:150px;"></div>
                                    <div class="col-sm-6 mt-3"><strong>{{ $list->name }}</strong>
                                        @if (auth()->user()->intrested == 1)
                                            <br>Brand: {{ $list->brand }}
                                        @elseif(auth()->user()->intrested == 2)
                                        @else
                                            <br>{{ $list->anualsale_start }} - {{ $list->anualsale_end }}
                                            {{ $list->anualsale_unit }} <br>Brand: {{ $list->brand }}
                                        @endif
                                    </div>
                                    <div class="col-sm-3 mt-3"><a class="btn btn-sm btn-danger"
                                            href="{{ url('/dash/gallery/') }}/{{ $list->id }}">Gallery</a> <a
                                            class="btn btn-sm btn-danger" href="#" data-target="#modal-quickview"
                                            onclick="viewDist('{{ $list->id }}','{{ auth()->user()->intrested }}','{{ route('view') }}')"
                                            data-toggle="modal">View</a> <a class="btn btn-sm btn-danger"
                                            href="{{ route($interested, $list->id) }}">Edit</a></div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                    <br/>

                    {{ $listing->links() }}
                   
                </div>
            </div>
        </div>
    </div>

    @include('web.view.dist_modal')
@endsection

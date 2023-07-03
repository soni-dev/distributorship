@extends('layouts.weblayout')
@section('content')
    <!-- **********search-form*********** -->
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
                            <a class="profiletab-link profiletab " id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                aria-controls="profile">
                                {{ $list_type }}s Search</a>
                        </li>

                    </ul>


                    <div class="tab-content h-100 tab-brk" id="myTabContent">

                        <!-- ***********Distributors Search*********** -->
                        <div class="tab-pane fade show active profiletab pt-4 pb-4" id="profile" role="tabpanel"
                            aria-labelledby="profile-tab">

                            @if ($list_type == 'Distributor')
                                @include('web.tabs.db_search', ['cats' => $blogRand['cats']])
                            @elseif($list_type == 'Franchise')
                                @include('web.tabs.franchise_search_filter', ['cats' => $blogRand['cats']])
                            @else
                                @include('web.tabs.salesagent_search_filter', [
                                    'cats' => $blogRand['cats'],
                                ])
                            @endif
                            <!-- ***********End Distributors Search*********** -->




                        </div>
                    </div>
                </div>
            </div>


    </header>
    <div class="container sec-box">
        <div class="row">
            <div class="container mb-1">
                <div class="row">
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
                </div>
            </div>
            <div class="container mb-1">
                <div class="row">
                    <div class="col-md-3 col-lg-2 col-sm-2  border-right-0 ">
                        <img src="{{ url($listing->logo) }}" class="img-thumbnail">
                    </div>
                    <div class="col-md-6 col-sm-6 col-12   border-right-0">
                        <h5 class="mt-4 text-uppercase fscolor">
                            {{ $listing->name }}</h5>
                        <!--<h6>Sri Mahalaxmi Industries, Post Office Road, Hethur, Sakleshpur</h6>-->
                    </div>
                    <div class="col-md-4 col-sm-4 col-12"></div>
                </div>
                <hr>
                <!-- Company Details -->

                <div class="row py-2 px-2"></div>
                <div class="row">
                    <div class="col-md-12 rounded-0 bg-light py-4 px-3">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="border bscolor bg-white rounded-0 form-control h-75 py-2 px-2 "><span
                                        class="fscolor">Mode:</span><br>
                                    <h6>
                                        @if ($listing->mode == 'appoint')
                                            Appoint for {{ $list_type }}
                                        @else
                                            Become {{ $list_type }}
                                        @endif
                                    </h6>
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label class="border  bg-white rounded-0 form-control h-75 py-2 px-2 bscolor"><span
                                        class="fscolor">GST Number:</span> <br>
                                    <h6>{{ $listing->gst }}</h6>
                                    <!-- // multibyte strings
                          $result = mb_substr($myStr, 0, 5); -->
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label class="border bscolor bg-white rounded-0 form-control h-75 py-2 px-2"><span
                                        class="fscolor">PAN Number:</span> <br>
                                    <h6>{{ $listing->pan }}</h6>
                                </label>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-4">
                                <label class="border bscolor bg-white rounded-0 form-control h-75 py-2 px-2"><span
                                        class="fscolor">Brand:</span> <br>
                                    <h6>{{ $listing->brand }}</h6>
                                </label>

                            </div>
                            <div class="col-md-4">
                                <label class="border bscolor bg-white rounded-0 form-control h-75 py-2 px-2"><span
                                        class="fscolor">Space Required:</span> <br>
                                    <h6>{{ $listing->space }}</h6>
                                </label>
                            </div>
                            <div class="col-md-4">
                                <label class="border bscolor bg-white rounded-0 form-control h-75 py-2 px-2"><span
                                        class="fscolor">Investment:</span><br>
                                    <h6>{{ $listing->investment_amt }} {{ $listing->investment_unit }}</h6>
                                </label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <label class="border bscolor bg-white rounded-0 form-control h-75 py-2 px-2"><span
                                        class="fscolor">Established:</span> <br>
                                    <h6>{{ $listing->establishment }}</h6>
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12  ">

            <div class="row">
                <button type="button" class="btn  btn-outline-secondary  mb-2">
                    <strong>Share</strong></button> &nbsp;&nbsp;&nbsp;&nbsp;
                <button type="button" class="btn  btn-outline-success mb-2">
                    <strong>{{$listing->phone}}</strong></button> &nbsp;&nbsp;&nbsp;&nbsp;
                <a roll="button" class="btn btn-warning btn-outline-dark mb-2 " data-toggle="modal" data-target="#myModal"
                    href="">Send Inquiry</a>
      
            </div>
        </div>
    </div>

    <div class="container mb-1 sec-box">
        <div class="row h-100">
            <div class="col-sm-12 ">
                <section
                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border border-top-0  border-bottom-0 border-width:medium;">
                    <div class="row">
                        <div class="col-sm-12 bg-light border-top">
                            <h5 class="mt-2"><strong>Photo Gallary</strong></h5>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border-top border-bottom">
                            <div class="row">
                                @if (count($gals) > 0)
                                    @foreach ($gals as $gal)
                                        <div class="col-sm-3">
                                            <img class="img-thumbnail"
                                                src="{{ url('public/assets/uploads/distributors/gallary/') }}/{{ $gal }}" />
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


    <div class="container mb-1 sec-box">
        <div class="row h-100">
            <div class="col-lg-9 col-md-12 col-12 ">
                <section
                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border border-top-0  border-bottom-0 border-width:medium;">

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-light border-top">
                            <h5 class="mt-2"><strong>Business Details</strong></h5>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border-top border-bottom">
                            <label class="mt-2">{{ $listing->about }}</label>
                        </div>
                    </div>
                </section>
                <br>
                <section
                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border border-top-0  border-bottom-0 border-width:medium;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border-top bg-light">
                            <h5 class="mt-2"><strong>Industry Category</strong></h5>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border-top border-bottom">
                            <label class="mt-2">{{ $listCat }}</label>
                        </div>

                    </div>
                </section>
                <br>
                <section
                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border border-top-0  border-bottom-0 border-width:medium;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border-top bg-light">
                            <h5 class="mt-2"><strong>Investment Details</strong></h5>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 border-top">
                            <label class="mt-2">Space Required</label>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-6 col-6 border-top border-left">
                            <label class="mt-2">{{ $listing->space }}</label>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6  border-top border-bottom ">
                            <label class="mt-3">Investment Required</label>
                        </div>

                        <div class="col-lg-8 col-md-6 col-sm-6 col-6  border-top border-left border-bottom">
                            <label class="mt-2">{{ $listing->investment_amt }} {{ $listing->investment_unit }}</label>
                        </div>
                    </div>
                </section>
                <br>
                <section
                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border border-top-0  border-bottom-0 border-width:medium;">


                    <div class="row border-top">

                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 border-right">
                            <strong><label class="mt-2">Franchise Partners</label></strong>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                            <label class="mt-2"></label>

                        </div>
                    </div>
                    <div class="row  border-top ">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 border-right">
                            <strong><label class="mt-2">Franchise Fee</label></strong>

                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                            <label class="mt-2">{{ $listing->fee == 1 ? 'yes' : 'No' }}</label>
                        </div>
                    </div>
                    <div class="row  border-top">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 border-right">
                            <strong><label class="mt-2">Equipments</label></strong>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                            <label class="mt-2">{{ $listing->equip == 1 ? 'yes' : 'No' }}</label>
                        </div>
                    </div>
                    <div class="row border-top">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 border-right">
                            <strong><label class="mt-2">Furniture and Fixtures</label></strong>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                            <label class="mt-2">{{ $listing->furn == 1 ? 'yes' : 'No' }}</label>
                        </div>
                    </div>
                    <div class="row border-top border-bottom ">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-6 border-right">
                            <strong><label class="mt-2">Advertising / Marketing</label></strong>
                        </div>
                        <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                            <label class="mt-2">
                                {{ $listing->advert == 1 ? 'yes' : 'No' }}</label>
                        </div>
                    </div>

                    <!-- </div> -->
                </section>
                <br>
                <section
                class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border border-top-0  border-bottom-0 border-width:medium;">


                <div class="row border-top">

                    <div class="col-lg-8 col-md-6 col-sm-6 col-6 border-right">
                        <strong><label class="mt-2">Training Program available for the franchisee
                            </label></strong>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                        <label class="mt-2"> {{ $listing->training_program == 1 ? 'yes' : 'No' }}</label>

                    </div>
                </div>
                <div class="row  border-top  ">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-6 border-right">
                        <strong><label class="mt-2">Software/Hardware Support included in the Franchise
                                Fees</label></strong>

                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6">
                        <label class="mt-2"> {{ $listing->softsupport == 1 ? 'yes' : 'No' }}</label>
                    </div>
                </div>
                <div class="row  border-top border-bottom">
                    <div class="col-lg-8 col-md-6 col-sm-6 col-6 border-right">
                        <strong><label class="mt-2">Is the Franchise Renewable
                            </label></strong>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 ">
                        <label class="mt-2"> {{ $listing->is_renew == 1 ? 'yes' : 'No' }}</label>
                    </div>
                </div>



                <!-- </div> -->
            </section>
            <br >
                <section
                    class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border border-top-0  border-bottom-0 border-width:medium;">
                    @php $state = Helper::location($listing->state_id, 'state');
                    $country = Helper::location($listing->country_id, 'country'); @endphp
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border-top bg-light">
                            <h5 class="mt-2"><strong>Preferred Location</strong></h5>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                            <strong><label class="mt-2 p-3">
                                    {{ !empty($state) ? 'Across India' : '' }}
                                </label></strong>
                            <label class="mt-2 p-3">
                                {{ !empty($state) ? $state : '' }}
                            </label><br />
                            <strong><label class="mt-2 p-3">
                                    {{ !empty($country) ? 'World Wide' : '' }}
                                </label></strong>
                            <label class="mt-2 p-3">
                                {{ !empty($country) ? $country : '' }}
                            </label>
                        </div>
                    </div>
  
            </section>
            <br>
          
            <section
                class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border border-top-0  border-bottom-0 border-width:medium;">
                <div class="row mt-1">

                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 border-top bg-light ">
                        <h5 class="mt-2"><strong>Contact Details</strong></h5>
                    </div>
                </div>
                <div class="row border-top">

                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 border-right">
                        <strong><label class="mt-2">Name</label></strong>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                        <label class="mt-2">{{ $listing->contactname }}</label>

                    </div>
                </div>
                <div class="row  border-top ">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 border-right">
                        <strong><label class="mt-2">Company Name</label></strong>

                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                        <label class="mt-2">{{ $listing->company_name }}</label>
                    </div>
                </div>
                <div class="row  border-top">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 border-right">
                        <strong><label class="mt-2">Address</label></strong>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                        <label class="mt-2">{{ $listing->address }}</label>
                    </div>
                </div>
                <div class="row border-top">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 border-right">
                        <strong><label class="mt-2">City</label></strong>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                        <label class="mt-2">{{ $listing->city }}</label>
                    </div>
                </div>
                <div class="row border-top">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 border-right">
                        <strong><label class="mt-2">Zip Code</label></strong>

                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                        <label class="mt-2">{{ $listing->zipcode }}</label>
                    </div>
                </div>
                <div class="row border-top border-bottom ">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-6 border-right">
                        <strong><label class="mt-2">Mobile</label></strong>
                    </div>
                    <div class="col-lg-8 col-md-6 col-sm-6 col-6">
                        <label class="mt-2">
                            {{ $listing->phone }}</label>
                    </div>
                </div>

                <!-- </div> -->
            </section>
        </div>
        <!-- right vertical add image  -->
        {{-- <div class="col-lg-3 col-md-3">
            <div class="col-lg-12 col-md-12 h-50 ">
                <img src="{{ url('assets/uploads/ads/right-ad-img1.jpg') }}"
                    class="img-fluid img-thumbnail ad-right-banner1 w-100 h-100  py-1 px-1" alt="">
            </div>
            <div class="col-lg-12 col-md-12 h-50">
                <img src="{{ url('assets/uploads/ads/right-ad-img1.jpg') }}"
                    class="img-fluid img-thumbnail  ad-right-banner2 w-100 py-1 px-1" alt="">
            </div>
        </div> --}}
        <!-- right vertical add image  -->
    </div>
    </div>
    <!-- **********search-end-form*********** -->

    <!-- Advertisement banner -->
    {{-- <div class="container">
        <div class="row">
            <div class="col-12 col-lg-12 col-md-12 mt-5 ">
                <img src="{{ url('assets/uploads/ads/banner_ad.jpg') }}" class="img-fluid" alt="">
            </div>
        </div>
    </div> --}}
    <section class="mt-5 sec-box">
        <div class="container">
            <section class="mt-1 mb-3">

                <h5 class="sec_headline">Related Categories</h5>
                <div class="row">
                    @forelse($relatedCats as $l)
                        <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                            <div class="border h-100 p-3 text-center">
                                <div class="img-holder">
                                    <img src="{{ url($l->logo) }}">
                                </div>
                                <div class="pdetail">
                                    <h5><a href="{{ url('franchise') }}/{{ $l->slug }}"
                                            class="text-primary">{{ $l->name }}</a></h5>
                                    <p>Investment required</p>
                                    <p>{{$l->investment_amt}} {{$l->investment_unit}}</p>   
                                    <p>Space required</p>
                                    <p>{{$l->space}} Sq. Ft. </p>        
                                    <p class="text-success">{{ $l->phone }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </section>
        </div>
    </section>

    @include('web.search-details.modal-form')
@endsection

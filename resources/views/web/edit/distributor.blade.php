<form id="distributor" action="{{ route('update.dist') }}" method="post" enctype="multipart/form-data" name="distributor">
    @csrf
    <input type="hidden" name="listing_type" value="distributor">
    <input type="hidden" name="id" value="{{$dist->id}}">
    <div class="form-row mb-3">
        <div class="form-check form-check-inline appoint1">
            <input class="form-check-input" type="radio" name="mode" id="appoint" value="appoint"
                {{ $dist->mode == 'appoint' ? 'checked' : '' }}>
            <label class="form-check-label" for="inlineRadio1">I want to appoint distributor</label>
        </div>
        <div class="form-check form-check-inline become1">
            <input class="form-check-input" type="radio" name="mode" id="become" value="become"
                {{ $dist->mode == 'become' ? 'checked' : '' }}>
            <label class="form-check-label" for="inlineRadio2">I want to become distributor</label>
        </div>
    </div>
    <h4>Basic Distributor Detail</h4>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputEmail4">Title<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Title"
                value="{{ $dist->name }}">
            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
        </div>
    </div>


    <div class="form-row "  >
        <div class="form-group col-md-6 appoint" style="{{ $dist->mode == 'appoint' ? 'display:block' : 'display:none' }}">
            <label for="inputEmail4">Brand Name</label>
            <input type="text" class="form-control" id="name" name="brand" placeholder="Brand Name"
                value="{{ $dist->brand }}">
            <span id="name-error" class="error text-danger" for="input-brand">{{ $errors->first('brand') }}</span>
        </div>
        <div class="form-group col-md-6 appoint" style="{{ $dist->mode == 'appoint' ? 'display:block' : 'display:none' }}">
            <label for="inputPassword4">Establishment Year</label>
            <input type="text" class="form-control" name="establishment" id="establishment"
                placeholder="Establishment Year" value="{{ $dist->establishment }}">
            <span id="establishment-error" class="error text-danger"
                for="input-establishment">{{ $errors->first('establishment') }}</span>
        </div>
    </div>


    <div class="form-row appoint" >
        <div class="form-group col-md-6" style="{{ $dist->mode == 'appoint' ? 'display:block' : 'display:none' }}">
            <label for="inputEmail4">Company Anual Sale<span class="text-danger">*</span></label>
            <div class="row">
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="anualsale_start" name="anualsale_start"
                        placeholder="From" value="{{ $dist->anualsale_start }}">
                    <span id="anualsale_start-error" class="error text-danger"
                        for="input-anualsale_start">{{ $errors->first('anualsale_start') }}</span>
                </div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="anualsale_end" name="anualsale_end" placeholder="To"
                        value="{{ $dist->anualsale_end }}">
                    <span id="anualsale_end-error" class="error text-danger"
                        for="input-anualsale_end">{{ $errors->first('anualsale_end') }}</span>
                </div>
                <div class="col-sm-4">
                    <select class="form-control" id="anualsale_unit" name="anualsale_unit">
                        <option value="Lacs" {{ $dist->anualsale_unit == 'Lacs' ? 'selected' : '' }}>Lacs</option>
                        <option value="Cr" {{ $dist->anualsale_unit == 'Cr' ? 'selected' : '' }}>Cr</option>
                    </select>
                </div>
            </div>
        </div>

        <div class="form-group col-md-6 appoint" >
            <div class="form-row">
                <div class="form-group col-md-6" style="{{ $dist->mode == 'appoint' ? 'display:block' : 'display:none' }}">
                    <label for="inputPassword4">Total No. of distributors</label>
                    <input type="text" class="form-control" name="total_distributors" id="total_distributors"
                        placeholder="Total No. of distributors" value="{{ $dist->total_distributors }}">
                    <span id="total_distributors-error" class="error text-danger"
                        for="input-total_distributors">{{ $errors->first('total_distributors') }}</span>
                </div>
                <div class="form-group col-md-6" style="{{ $dist->mode == 'appoint' ? 'display:block' : 'display:none' }}">
                    <label for="inputPassword4">Space (Sq.Ft.)</label>
                    <input type="text" class="form-control" name="space" id="space"
                        placeholder="Space (Sq.Ft.)" value="{{ $dist->space }}">
                    <span id="space-error" class="error text-danger"
                        for="input-space">{{ $errors->first('space') }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="form-row ">
        <div class="form-group col-md-6 become"  style="{{ $dist->mode == 'become' ? 'display:block' : 'display:none' }}">
            <label for="inputEmail4">PAN Number (10 Digits) </label>
            <input type="text" class="form-control" id="pan" name="pan"
                placeholder="PAN Number (10 Digits)" value="{{$dist->pan}}">
            <span id="pan-error" class="error text-danger" for="input-pan">{{ $errors->first('pan') }}</span>
        </div>
        <div class="form-row mb-3 mx-2  become "  style="{{ $dist->mode == 'become' ? 'display:block' : 'display:none' }}">
            <label for="inputPassword4">GST Available</label>
            <br>
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="radio" name="gst_available" id="yes" value="yes"
                    {{ !empty($dist->gst) ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineRadio1">Yes</label>
            </div>
            <div class="form-check form-check-inline ">
                <input class="form-check-input" type="radio" name="gst_available" id="no" value="no"
                    {{ empty($dist->gst) ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineRadio2">No</label>
            </div>
        </div>
        <div class="become"  style="{{ $dist->mode == 'become' ? 'display:block' : 'display:none' }}">
            <div class="form-group col-md-12 gst"
                style="  {{ !empty($dist->gst) ? 'display:block' : 'display:none' }}">
                <label for="inputPassword4">GST Number (15 Digits)</label>
                <input type="text" class="form-control" name="gst" id="gst" placeholder="GST Number"
                    value="{{ $dist->gst }}">
                <span id="gst-error" class="error text-danger" for="input-gst">{{ $errors->first('gst') }}</span>
            </div>
        </div>
    </div>
    <div class="form-row ">
        <div class="form-group col-md-6 become" style=" {{ $dist->mode == 'become' ? 'display:block' : 'display:none' }}">
            <label for="inputEmail4">Experience</label>
            <input type="text" class="form-control" name="experience" id="experience"
                placeholder="experience Number" value="{{ $dist->experience }}">
            <span id="experience-error" class="error text-danger"
                for="input-experience">{{ $errors->first('experience') }}</span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Category<span class="text-danger">*</span></label>
            <div style="height:200px; overflow-y:scroll;">
                <select class="form-control" name="category_id" onclick="opensubcat( '{{ URL::to('web/subcats') }}' )" id="category_id">
                    <option >Select Category</option>
                    @if ($blogRand)
                    @foreach ($blogRand['cats'] as $key=>$c)
                    <option  value="{{$c->id}}" {{($c->id==$dist->category_id)?"selected":""}}>{{ $c->name }}</option>
                  
                  @endforeach
                  @endif
                </select>


            </div>
        </div>

        <div class="form-group col-md-6" id="subcatview">
            <label for="inputEmail4">Sub Category</label>
            <ul style="list-style:none; margin:0; padding:0;">
                @foreach ($catById as $sc)
                    <li><input type="checkbox" value="{{ $sc->id }}" name="scats[]" {{ in_array($sc->id,$scats??[] )? 'checked' : '' }}> {{ $sc->name }}</li>
                @endforeach
            </ul>
            <span id="scats-error" class="error text-danger"
            for="input-scats">{{ $errors->first('scats') }}</span>
        </div>
    </div>

    <div class="form-row appoint" style="{{ $dist->mode == 'appoint' ? 'display:block' : 'display:none' }}">
        <div class="form-group col-md-12">
            <label for="inputEmail4">Investment Required</label>
            <input type="text" class="form-control" id="investment_required" name="investment_required"
                value="{{ $dist->investment_required }}" placeholder="Investment Required">
            <span id="investment_required-error" class="error text-danger"
                for="input-investment_required">{{ $errors->first('investment_required') }}</span>
        </div>
    </div>
    <!-- product key and business description -->


    <div class="form-row">
        <div class="form-group col-md-6 become"  style="{{ $dist->mode == 'become' ? 'display:block' : 'display:none' }}">
            <label for="inputEmail4">Investment Capacity </label>
            <input type="text" class="form-control" id="investment_capacity" name="investment_capacity"
                value="{{ $dist->investment_capacity }}" placeholder="Investment Capacity">
            <span id="investment_capacity-error" class="error text-danger"
                for="input-investment_capacity">{{ $errors->first('investment_capacity') }}</span>
        </div>
        <div class="form-group col-md-6 become" style="{{ $dist->mode == 'become' ? 'display:block' : 'display:none' }}">
            <label for="inputEmail4">How Soon Would You Like To Invest? <span class="text-danger">*</span></label>
            <select class="form-control" name="investment_time">
                <option value="">Select how soon invest</option>
                <option value="1 month" {{ $dist->investment_time == '1 month' ? 'selected' : '' }}>1 Month</option>
                <option value="2 month" {{ $dist->investment_time == '2 month' ? 'selected' : '' }}>2 Month</option>
            </select>
            <span id="investment_time-error" class="error text-danger"
                for="input-investment_time">{{ $errors->first('investment_time') }}</span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Product keyword <span class="text-danger">*</span></label>
            <textarea class="form-control" id="product_keyword" name="product_keyword" placeholder="Product keyword">{{ $dist->product_keyword }}</textarea>
            <span id="product_keyword-error" class="error text-danger"
                for="input-product_keyword">{{ $errors->first('product_keyword') }}</span>
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">Describe your business profile <span class="text-danger">*</span></label>
            <textarea class="form-control" id="business_profile" name="business_profile"
                placeholder="Business profile description">{{ $dist->business_profile }}</textarea>
            <span id="business_profile-error" class="error text-danger"
                for="input-business_profile">{{ $errors->first('business_profile') }}</span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Meta Title</label>
            <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Meta Title"
                value="{{ $dist->meta_title }}">
            <span id="meta_title-error" class="error text-danger"
                for="input-meta_title">{{ $errors->first('meta_title') }}</span>
        </div>

        <div class="form-group col-md-6">
            <label for="inputEmail4">Meta Description</label>
            <input type="text" class="form-control" id="meta_desc" name="meta_desc"
                placeholder="Meta Description" value="{{ $dist->meta_desc }}">
            <span id="meta_desc-error" class="error text-danger"
                for="input-meta_desc">{{ $errors->first('meta_desc') }}</span>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputEmail4">Type Of Distributorship you are considering?</label>
            <br>
            @php    $distArray = json_decode($dist->type_distributorship); @endphp
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Country Wise"
                    name="type_distributorship[]" {{ in_array('Country Wise',$distArray??[] )? 'checked' : '' }}>
                <label class="form-check-label" for="inlineCheckbox1">Country Wise</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="Region Wise"
                    name="type_distributorship[]" {{ in_array('Region Wise',$distArray??[] ) ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineCheckbox1">Region Wise</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="State Wise"
                    name="type_distributorship[]" {{ in_array('State Wise',$distArray??[] ) ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineCheckbox2">State Wise</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" value="City Wise "
                    name="type_distributorship[]" {{ in_array( 'City Wise ',$distArray??[] ) ? 'checked' : '' }}>
                <label class="form-check-label" for="inlineCheckbox3">City Wise </label>
            </div>

            <div class="form-group col-md-12">
                <br>
                <label for="inputEmail4">Location Details <span class="text-danger">*</span></label>
                <div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="form-check form-check-inline"><input type="checkbox" class="form-check-input"
                                    value="Across India" name="">
                                <label class="form-check-label" for="inlineCheckbox3"><b>Across India</b></label><br>
                            </div>
                            @forelse ($getListingStates as $location)
                                @php $check = in_array( $location->region,$regions) ;@endphp
                                @if ($check)
                                    <br> <b>{{ $location->region }}</b><br>
                                @endif
                                @php
                                    $key = array_search($location->region, $regions);
                                    unset($regions[$key]);
                                    $stateArray = json_decode($dist->state_id);
                                @endphp
                                <div class="form-check form-check-inline"><input type="checkbox"
                                        class="form-check-input" value="{{ $location->id }}" name="state_id[]"
                                        {{ in_array($location->id, $stateArray ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label"
                                        for="inlineCheckbox3">{{ $location->state }}</label>
                                </div>

                            @empty
                            @endforelse
                            <p></p>
                            <div class="form-check form-check-inline"><input type="checkbox" class="form-check-input"
                                    value="World Wide" name="">
                                <label class="form-check-label" for="inlineCheckbox3"><b>World Wide</b></label>
                            </div>
                            <p></p>
                            @php $countryArray= json_decode($dist->country_id);@endphp
                            @forelse($countries as $c)
                                <div class="form-check form-check-inline"><input type="checkbox"
                                        class="form-check-input" value="{{ $c->id }}" name="country_id[]"
                                        {{ in_array($c->id, $countryArray ?? []) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="inlineCheckbox3">{{ $c->name }}</label>
                                </div>

                            @empty
                            @endforelse

                        </div>
                    </div>

                </div>
                <span id="state_id-error" class="error text-danger"
                for="input-state_id">{{ $errors->first('state_id') }}</span>
            </div>

        </div>
        <div class="form-group col-md-12">
            <label>Image<span class="text-danger">*</span></label>
            <input type="file" name="logo" id="logo" 
                onchange="document.getElementById('imgholder').src = window.URL.createObjectURL(this.files[0])">
            <div  style="width:100%; height:200px;">
                <center><img id="imgholder" width="200" src="{{ url($dist->logo) }}" class="img-fluid img-responsive" /></center>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputEmail4">Remark<span class="text-danger">*</span></label>
            <textarea class="form-control" id="remark" name="remark" placeholder="Remark">{{ $dist->remark }}</textarea>
            <span id="remark-error" class="error text-danger"
                for="input-remark">{{ $errors->first('remark') }}</span>
        </div>
        <button type="submit" class="btn btn-primary" name="distributor">Update</button>
    </div>

</form>

<form action="{{ url('web/listsubmit') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="listing_type" value="franchise">
    <div class="form-row mb-3">
        <div class="form-check form-check-inline appoint1">
            <input class="form-check-input" type="radio" name="mode" id="mode1" value="appoint" checked>
            <label class="form-check-label" for="inlineRadio1">I want to appoint franchisee</label>
        </div>
        <div class="form-check form-check-inline become1">
            <input class="form-check-input" type="radio" name="mode" id="mode2" value="become">
            <label class="form-check-label" for="inlineRadio2">I want to become franchisee</label>
        </div>
    </div>
    <h4>Basic Franchisee Detail</h4>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Title<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Title">
            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
        </div>
        <div class="form-group col-md-6 become">
            <label for="inputEmail4">Industry Type<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="industry_type" name="industry_type"
                placeholder="Industry Type">
            <span id="industry_type-error" class="error text-danger"
                for="input-industry_type">{{ $errors->first('industry_type') }}</span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6 become">
            <label for="inputEmail4">Investment Capacity </label>
            <select class="form-control" name="investment_capacity">
                <option value="">Select Investment Capacity</option>
                <option value="1 CR">1 CR</option>
                <option value="2 CR">2 CR</option>
            </select>
            <span id="investment_capacity-error" class="error text-danger"
                for="input-investment_capacity">{{ $errors->first('investment_capacity') }}</span>
        </div>

        <div class="form-group col-md-6 become">
            <label for="inputEmail4">How Soon Would You Like To Invest? <span class="text-danger">*</span></label>
            <select class="form-control" name="investment_time">
                <option value="">Select how soon invest</option>
                <option value="1 month">1 Month</option>
                <option value="2 month">2 Month</option>
            </select>
            <span id="investment_time-error" class="error text-danger"
                for="input-investment_time">{{ $errors->first('investment_time') }}</span>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6 become">
            <label for="inputEmail4">PAN Number (10 Digits)</label>
            <input type="text" class="form-control" id="pan" name="pan" placeholder="PAN Number">
        </div>
        <div class="form-group col-md-6 become" >
            <label for="inputEmail4">Experience</label>
            <input type="text" class="form-control" id="experience" name="experience" placeholder="Experience " value="">
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6 become">
            <label for="inputEmail4">GST Available</label>
            <div class="form-control">
                <input type="radio" name="gst_available" value="yes">Yes
                <input type="radio" name="gst_available" value="no" checked>No
            </div>
        </div>
        <div class="form-group col-md-6 become" >
            <label for="inputPassword4" class="gst" style="display:none">GST Number (15 Digits)</label>
            <input type="text" class="form-control gst" style="display:none" name="gst" id="gst" placeholder="GST Number" checked>
        </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6 appoint">
            <label for="inputEmail4">Brand Name<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="brand" placeholder="Brand Name">
        </div>
        <div class="form-group col-md-6 appoint">
            <label for="inputPassword4">Business Start Year</label>
            <input type="text" class="form-control" name="establishment" id="establishment"
                placeholder="Establishment Year">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 appoint">
            <label for="inputPassword4">Total no. of companies</label>
            <input type="text" class="form-control" name="total_companies" id="total_companies"
                placeholder="total companies">
        </div>
        <div class="form-group col-md-6 appoint">
            <label for="inputPassword4">Total no. of franchisee</label>
            <input type="text" class="form-control" name="total_franchisee" id="total_franchisee"
                placeholder="total franchisee">
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 appoint">
            <label for="inputPassword4">Space (sq ft)</label>
            <input type="text" class="form-control" name="space" id="space" placeholder="Space">
        </div>
        <div class="form-group col-md-6 appoint">
            <label for="inputPassword4">Product Keywords<span class="text-danger">*</span></label>
            <input type="text" class="form-control" name="product_keywords" id="product_keywords"
                placeholder="product keywords">
                <span id="product_keywords-error" class="error text-danger"
                for="input-product_keywords">{{ $errors->first('product_keywords') }}</span>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6 appoint">
            <label for="inputPassword4" style="width:100%;">Looking for Franchisee Partner</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="fr_partner" id="fr_partner1"
                    value="singleunit" checked>
                <label class="form-check-label" for="inlineRadio1">Single unit franchisee</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="fr_partner" id="fr_partner2"
                    value="masterunit">
                <label class="form-check-label" for="inlineRadio2">Master unit franchisee</label>
            </div>
            <p>
            <div class="form-check form-check-inline">
                <input type="text" class="form-control" name="investment_amt" id="investment_amt"
                    placeholder="investment amount">
            </div>
            <div class="form-check form-check-inline">
                <select class="form-control" name="investment_unit" id="investment_unit">
                    <option value="INR">INR</option>
                    <option value="USD">USD</option>
                </select>
            </div>
            </p>
        </div>
        <div class="form-group col-md-6 appoint">
            <label for="inputPassword4">Franchise Fee: </label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="fee" id="fee1" value="1"
                    checked>
                <label class="form-check-label" for="inlineRadio1">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="fee" id="fee2" value="0">
                <label class="form-check-label" for="inlineRadio2">No</label>
            </div>
            <br>
            <label for="inputPassword4">Equipments: </label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="equip" id="equip1" value="1"
                    checked>
                <label class="form-check-label" for="inlineRadio1">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="equip" id="equip2" value="0">
                <label class="form-check-label" for="inlineRadio2">No</label>
            </div>
            <br>
            <label for="inputPassword4">Furniture & Fixtures: </label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="furn" id="furn1" value="1"
                    checked>
                <label class="form-check-label" for="inlineRadio1">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="furn" id="furn2" value="0">
                <label class="form-check-label" for="inlineRadio2">No</label>
            </div>
            <br>
            <label for="inputPassword4">Advertising / Marketing: </label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="advert" id="advert1" value="1"
                    checked>
                <label class="form-check-label" for="inlineRadio1">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="advert" id="advert2" value="0">
                <label class="form-check-label" for="inlineRadio2">No</label>
            </div>
        </div>
    </div>

    <hr>

    <div class="form-row">
        <div class="form-group col-md-6 appoint">
            <label for="inputPassword4" style="width:100%;">Training program available for the franchise: </label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="training_program" id="training_program1"
                    value="1" checked>
                <label class="form-check-label" for="inlineRadio1">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="training_program" id="training_program2"
                    value="0">
                <label class="form-check-label" for="inlineRadio2">No</label>
            </div>
        </div>
        <div class="form-group col-md-6 appoint">
            <label for="inputPassword4" style="width:100%;">Software/Hardware support included in franchise fee
            </label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="softsupport" id="softsupport1" value="1"
                    checked>
                <label class="form-check-label" for="inlineRadio1">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="softsupport" id="softsupport2" value="0">
                <label class="form-check-label" for="inlineRadio2">No</label>
            </div>
        </div>
    </div>

    <hr>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Category<span class="text-danger">*</span></label>
            <div style="height:200px; overflow-y:scroll;">
                <select class="form-control" name="category_id" onclick="opensubcat( '{{ URL::to('web/subcats') }}' )" id="category_id">
                    <option >Select Category</option>
                    @if ($blogRand)
                    @foreach ($blogRand['cats'] as $key=>$c)
                    <option  value="{{$c->id}}" {{($key==0)?"selected":""}}>{{ $c->name }}</option>
                  
                  @endforeach
                  @endif
                </select>

            </div>
        </div>

        <div class="form-group col-md-6" id="subcatview">
            <label for="inputEmail4">Sub Category</label>
           
            <ul style="list-style:none; margin:0; padding:0;">
                @foreach ($blogRand['firstsubcat'] as $sc)
                    <li><input type="checkbox" value="{{ $sc->id }}" name="scats[]"> {{ $sc->name }}</li>
                @endforeach
            </ul>
            <span id="scats-error" class="error text-danger"
            for="input-scats">{{ $errors->first('scats') }}</span>
        </div>
    </div>

    <hr>
    <div class="form-row">
        <div class="form-group col-md-12 appoint">
            <label for="inputEmail4">Is the franchise renewable: &nbsp;&nbsp;&nbsp;</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="is_renew" id="is_renew1" value="1"
                    checked>
                <label class="form-check-label" for="inlineRadio1">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="is_renew" id="is_renew2" value="0">
                <label class="form-check-label" for="inlineRadio2">No</label>
            </div>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputEmail4">Business Profile<span class="text-danger">*</span></label>
            <textarea name="business_profile" class="form-control"></textarea>
            <span id="business_profile-error" class="error text-danger"
            for="input-business_profile">{{ $errors->first('business_profile') }}</span>
        </div>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Meta Title</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                        placeholder="Meta Title">
                    <span id="meta_title-error" class="error text-danger"
                        for="input-meta_title">{{ $errors->first('meta_title') }}</span>
                </div>
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Meta Description</label>
                    <input type="text" class="form-control" id="meta_desc" name="meta_desc"
                        placeholder="Meta Description">
                    <span id="meta_desc-error" class="error text-danger"
                        for="input-meta_desc">{{ $errors->first('meta_desc') }}</span>
                </div>
            </div>
        </div>

        <div class="form-group col-md-6">
            <label>Image<span class="text-danger">*</span></label>
            <input type="file" name="logo">
           
            <div id="imgholder" style="width:100%; height:200px; background:#CCC;"></div>
            <span id="logo-error" class="error text-danger"
            for="input-logo">{{ $errors->first('logo') }}</span>
        </div>
    </div>
    <div class="form-row">
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
                        @endphp
                        <div class="form-check form-check-inline"><input type="checkbox"
                                class="form-check-input" value="{{ $location->id }}" name="state_id[]">
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
                    @forelse($countries as $c)
                        <div class="form-check form-check-inline"><input type="checkbox"
                                class="form-check-input" value="{{ $c->id }}" name="country_id[]">
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
        <div class="form-group col-md-12">
            <label for="inputEmail4">Remark<span class="text-danger">*</span></label>
            <textarea class="form-control" id="remark" name="remark" placeholder="Remark"
                style="width:100%; height:200px;"></textarea>
            <span id="remark-error" class="error text-danger"
                for="input-remark">{{ $errors->first('remark') }}</span>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
</form>

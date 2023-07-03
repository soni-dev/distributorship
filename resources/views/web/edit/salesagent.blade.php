<form id="sales" name="sales" action="{{ route('update.sale') }}" method="post" enctype="multipart/form-data">
    @csrf
   
    <input type="hidden" name="listing_type" value="sales">
    <input type="hidden" name="id" value="{{$sale->id}}">
    <div class="form-row mb-3">
      <div class="form-check form-check-inline appoint1">
      <input class="form-check-input" type="radio" name="mode" id="appoint1" value="appoint" {{ $sale->mode == 'appoint' ? 'checked' : '' }}>
      <label class="form-check-label" for="inlineRadio1">I want to appoint sales agent</label>
      </div>
      <div class="form-check form-check-inline become1">
      <input class="form-check-input" type="radio" name="mode" id="become1" value="become" {{ $sale->mode == 'become' ? 'checked' : '' }}>
      <label class="form-check-label" for="inlineRadio2">I want to become sales agent</label>
      </div>
    </div>
    <h4>Basic Sales Agent Detail</h4>
    <div class="form-row">
          <div class="form-group col-md-12">
              <label for="inputEmail4">Title<span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Title"
                  value="{{  $sale->name  }}">
              <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
          </div>
      </div>
    <div class="form-row">
      <div class="form-group col-md-6 become"  style="{{ $sale->mode == 'become' ? 'display:block' : 'display:none' }}">
        <label for="inputEmail4">Type<span class="text-danger">*</span></label>
        <select class="form-control" id="agent_type" name="agent_type">
          <option value="">Select agent type</option>
          <option value="1" {{ $sale->agent_type == '1' ? 'selected' : '' }}>General</option>
      </select>
      <span id="agent_type-error" class="error text-danger" for="input-agent_type">{{ $errors->first('agent_type') }}</span>
      </div>
      <div class="form-group col-md-6 become"  style="{{ $sale->mode == 'become' ? 'display:block' : 'display:none' }}">
        <label for="inputPassword4">Annual Sale</label>
        <input type="text" class="form-control" name="annual_sale" id="annual_sale" placeholder="annual sale"  value="{{  $sale->annual_sale  }}">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6 become"  style="{{ $sale->mode == 'become' ? 'display:block' : 'display:none' }}">
        <label for="inputEmail4">Date of Birth</label>
        <input type="date" class="form-control" id="dob" name="dob" value="{{  $sale->dob  }}">
      </div>
      <div class="form-group col-md-6 become"  style="{{ $sale->mode == 'become' ? 'display:block' : 'display:none' }}">
        <label for="inputPassword4">Experience<span class="text-danger">*</span></label>
        <input type="number" class="form-control" name="experience" id="experience" placeholder="experience" value="{{  $sale->experience  }}">
        <span id="experience-error" class="error text-danger" for="input-experience">{{ $errors->first('experience') }}</span>
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6 become"  style="{{ $sale->mode == 'become' ? 'display:block' : 'display:none' }}">
        <label for="inputEmail4">Education<span class="text-danger">*</span></label>
        <select class="form-control" id="education" name="education">
          <option value="">Select education</option>
          <option value="1" {{ $sale->education == '1' ? 'selected' : '' }}>B.Com</option>
        </select>
        <span id="education-error" class="error text-danger" for="input-education">{{ $errors->first('education') }}</span>
      </div>
      <div class="form-group col-md-6 become"  style="{{ $sale->mode == 'become' ? 'display:block' : 'display:none' }}">
        <label for="inputEmail4">PAN Number (10 Digits)</label>
        <input type="text" class="form-control" id="pan" name="pan" placeholder="PAN Number" value="{{  $sale->pan  }}">
      </div>
    </div>
  
    <div class="form-row">
      <div class="form-group col-md-6 become"  style="{{ $sale->mode == 'become' ? 'display:block' : 'display:none' }}">
        <label for="inputEmail4">GST Available</label>
        <div class="form-control">
        <input type="radio" name="gst_available" value="yes"  {{ !empty($sale->gst) ? 'checked' : '' }}>Yes
         <input type="radio" name="gst_available" value="no"  {{ empty($sale->gst) ? 'checked' : '' }}>No 
        </div>
      </div>
      <div class="form-group col-md-6 become" style="{{ $sale->mode == 'become' ? 'display:block' : 'display:none' }}">
        <label for="inputPassword4" class="gst" style="{{( !empty($sale->gst))?'display:block'
          :'display:none'}}">GST Number (15 Digits)</label>
        <input type="text" class="form-control gst"   style="{{( !empty($sale->gst))?'display:block'
        :'display:none'}}" name="gst" id="gst" placeholder="GST Number"  value="{{ $sale->gst }}">
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
                  <option  value="{{$c->id}}" {{($c->id==$sale->category_id)?"selected":""}}>{{ $c->name }}</option>
                
                @endforeach
                @endif
              </select>
  
              </div>
          </div>
  
          <div class="form-group col-md-6" id="subcatview">
              <label for="inputEmail4">Sub Category</label>
              <ul style="list-style:none; margin:0; padding:0;">
                  @foreach ($catById as $sc)
                      <li><input type="checkbox" value="{{ $sc->id }}" name="scats[]"  {{ in_array($sc->id,$scats??[] )? 'checked' : '' }}> {{ $sc->name }}</li>
                  @endforeach
              </ul>
  
          </div>
      </div>
  
    <div class="form-row">
     
      <div class="form-group col-md-12">
        <label>Image<span class="text-danger">*</span></label>
        <input type="file" name="image"  onchange="document.getElementById('imgholder').src = window.URL.createObjectURL(this.files[0])">
        <div  style="width:100%; height:200px;">
          @php $logo = !empty($sale->logo)?url($sale->logo):''; @endphp
          <center><img id="imgholder" width="200" src="{{ $logo }}" class="img-fluid img-responsive" /></center>
      </div>
      <span id="image-error" class="error text-danger"
      for="input-image">{{ $errors->first('image') }}</span>
      </div>
    </div>
  
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Please decribe your business profile<span class="text-danger">*</span></label>
        <textarea name="business_profile" id="business_profile" class="form-control">{{ $sale->business_profile }}</textarea>
        <span id="business_profile-error" class="error text-danger"
        for="input-business_profile">{{ $errors->first('business_profile') }}</span>
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail4">Product Detail<span class="text-danger">*</span></label>
        <textarea name="product_detail" id="product_detail" class="form-control">{{ $sale->business_profile }}</textarea>
        <span id="business_profile-error" class="error text-danger"
        for="input-business_profile">{{ $errors->first('business_profile') }}</span>
      </div>
    </div>
  
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Target Customer<span class="text-danger">*</span></label>
        <textarea name="target_customer" id="target_customer" class="form-control">{{ $sale->target_customer }}</textarea>
        <span id="target_customer-error" class="error text-danger"
        for="input-target_customer">{{ $errors->first('target_customer') }}</span>
      </div>
      <div class="form-group col-md-6">
        <label for="inputEmail4">Expected Work<span class="text-danger">*</span></label>
        <textarea name="expected_work" id="expected_work" class="form-control">{{ $sale->expected_work }}</textarea>
        <span id="expected_work-error" class="error text-danger"
        for="input-expected_work">{{ $errors->first('expected_work') }}</span>
      </div>
    </div>
    <div class="form-row">
          <div class="form-group col-md-12">
              <label for="inputEmail4">Cities Needed<span class="text-danger">*</span></label>
              <textarea class="form-control" id="cities_needed" name="cities_needed" placeholder="Cities">{{ $sale->cities_needed }}</textarea>
              <span id="cities_needed-error" class="error text-danger"
                  for="input-cities_needed">{{ $errors->first('cities_needed') }}</span>
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
                              $stateArray = json_decode($sale->state_id);
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
                      @php $countryArray= json_decode($sale->country_id);@endphp
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
    <div class="form-group col-md-12">
              <label for="inputEmail4">Remark<span class="text-danger">*</span></label>
              <textarea class="form-control" id="remark" name="remark" placeholder="Remark">{{ $sale->remark }}</textarea>
              <span id="remark-error" class="error text-danger"
                  for="input-remark">{{ $errors->first('remark') }}</span>
          </div>
    <button type="submit" class="btn btn-primary" name="sales">Update</button>
  </form>
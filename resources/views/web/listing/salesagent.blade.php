<form id="sales" name="sales" action="{{ url('web/listsubmit') }}" method="post" enctype="multipart/form-data">
  @csrf
  <input type="hidden" name="listing_type" value="sales">
  <div class="form-row mb-3">
    <div class="form-check form-check-inline appoint1">
    <input class="form-check-input" type="radio" name="mode" id="appoint1" value="appoint" checked>
    <label class="form-check-label" for="inlineRadio1">I want to appoint sales agent</label>
    </div>
    <div class="form-check form-check-inline become1">
    <input class="form-check-input" type="radio" name="mode" id="become1" value="become">
    <label class="form-check-label" for="inlineRadio2">I want to become sales agent</label>
    </div>
  </div>
  <h4>Basic Sales Agent Detail</h4>
  <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputEmail4">Title<span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Title"
                value="{{ old('name') }}">
            <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
        </div>
    </div>
  <div class="form-row">
    <div class="form-group col-md-6 become">
      <label for="inputEmail4">Type<span class="text-danger">*</span></label>
      <select class="form-control" id="agent_type" name="agent_type">
        <option value="">Select agent type</option>
        <option value="1">General</option>
    </select>
    </div>
    <div class="form-group col-md-6 become">
      <label for="inputPassword4">Annual Sale</label>
      <input type="text" class="form-control" name="annual_sale" id="annual_sale" placeholder="annual sale">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6 become">
      <label for="inputEmail4">Date of Birth</label>
      <input type="date" class="form-control" id="dob" name="dob">
    </div>
    <div class="form-group col-md-6 become">
      <label for="inputPassword4">Experience<span class="text-danger">*</span></label>
      <input type="number" class="form-control" name="experience" id="experience" placeholder="experience">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6 become">
      <label for="inputEmail4">Education<span class="text-danger">*</span></label>
      <select class="form-control" id="education" name="education">
        <option value="">Select education</option>
        <option value="1">B.Com</option>
      </select>
    </div>
    <div class="form-group col-md-6 become">
      <label for="inputEmail4">PAN Number (10 Digits)</label>
      <input type="text" class="form-control" id="pan" name="pan" placeholder="PAN Number">
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
      <input type="text" class="form-control gst"   style="display:none" name="gst" id="gst" placeholder="GST Number" checked>
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

        </div>
    </div>

  <div class="form-row">
   
    <div class="form-group col-md-12">
      <label>Image<span class="text-danger">*</span></label>
      <input type="file" name="image">
      <div id="imgholder" style="width:100%; height:200px; background:#CCC;"></div>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Please decribe your business profile<span class="text-danger">*</span></label>
      <textarea name="business_profile" id="business_profile" class="form-control"></textarea>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Product Detail<span class="text-danger">*</span></label>
      <textarea name="product_detail" id="product_detail" class="form-control"></textarea>
    </div>
  </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Target Customer<span class="text-danger">*</span></label>
      <textarea name="target_customer" id="target_customer" class="form-control"></textarea>
    </div>
    <div class="form-group col-md-6">
      <label for="inputEmail4">Expected Work<span class="text-danger">*</span></label>
      <textarea name="expected_work" id="expected_work" class="form-control"></textarea>
    </div>
  </div>
  <div class="form-row">
        <div class="form-group col-md-12">
            <label for="inputEmail4">Cities Needed<span class="text-danger">*</span></label>
            <textarea class="form-control" id="cities_needed" name="cities_needed" placeholder="Cities"></textarea>
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
      </div>
      
    </div>
  <div class="form-group col-md-12">
            <label for="inputEmail4">Remark<span class="text-danger">*</span></label>
            <textarea class="form-control" id="remark" name="remark" placeholder="Remark"></textarea>
            <span id="remark-error" class="error text-danger"
                for="input-remark">{{ $errors->first('remark') }}</span>
        </div>
  <button type="submit" class="btn btn-primary" name="sales">Save</button>
</form>
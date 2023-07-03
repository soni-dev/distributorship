<div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title text-primary ">{{$listing->name}}
                </h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form name="myfrom" action="{{route('send.inquiry')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>

                        <input type="hidden" name="brand_name" value="{{$listing->brand}}">
                        
                        <input type="hidden" name="register_user_id" value="{{$listing->user_id}}">

                        <input type="hidden" name="appoint_distributors_id" value="{{$listing->id}}">
                        <input type="text" name="name" class="form-control" placeholder="Name" required="">
                    </div>
                    <div class="form-group">
                        <label for="contact">Mobile Number:</label>
                        <input type="text" pattern="[789][0-9]{9}" name="mobile" class="form-control"
                            placeholder="Contact No." required="">
                    </div>

                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                            class="form-control" placeholder="Email" id="email" required="">
                    </div>


                    <div class="form-group">
                        <label class="form-check-label">I am Intersted In</label>
                        <select name="interested_in" class="form-control">
                            <option value="" disabled="" selected="" hidden="">---Select ----</option>

                            <option value="0">Distributor</option>
                            <option value="1">Franchisee</option>
                            <option value="2">Sales Agent</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-check-label">Message</label>
                        <textarea name="message" class="form-control" cols="100" rows="2"></textarea>
                    </div>
                    <button type="submit" name="send_submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>

@php $interest = (auth()->user()->intrested == 1)?'Franchise':((auth()->user()->intrested == 2)?'Sales Agent':'Distributors'); @endphp 
 <!-- The Modal -->

 <div class="modal " id="modal-quickview">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">View  {{$interest}} </h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <div id="spinner">
          <div class="d-flex justify-content-center" >
            <div class="spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>   
          </div>

          <table class="table table-bordered" id="data" style="display:none">              
          </table>
        </div>
        
      
        
      </div>
    </div>
  </div>
{{-- <!-- The Modal -->
<div class="modal " id="modal-quickview">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
    
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      
      <!-- Modal body -->
      <div class="modal-body" id="data">
        
       </div>
      
      <!-- Modal footer -->
    <!--   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> -->
      
    </div>
  </div>
</div> --}}

 <div class="modal fade" id="modal-quickview">
   
        <div class="modal-dialog  modal-dialog-centered modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">View  {{$interest}} </h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
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

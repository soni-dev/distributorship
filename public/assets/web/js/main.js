function opensubcat(url) {
  $('#subcatview input:checkbox').removeAttr('checked');
  var id = $('#category_id').find(":selected").val();
  $.ajax({
    url: url+'/'+id, // this is the object instantiated in wp_localize_script function
    type: 'GET',
    dataType: 'json',
    success: function( data ){
      str = '';
      $.each(data, function(index, item) {
        str += '<li><input type="checkbox" name="scats[]" value="'+item.id+'"> '+item.name+'</li>'; 
      });
      $('#subcatview ul').html(str);
    }
  });
}

//appoint
$(document).ready(function(){

  $(".appoint1").click(function(){
    $(".appoint").toggle();
    $(".become").toggle();
  });
  $(".become1").click(function(){
    $(".become").toggle();
    $(".appoint").toggle();
  });

  $("input[name='gst_available']").click(function(){
    var gstVal = $("input[name='gst_available']:checked").val();
    if(gstVal=="yes"){
      $(".gst").show();
    }
    else{
      $(".gst").hide();
    }
});


    $(function(){
        $('#modal-quickview').on('click','a',function(ev){
            alert("view");
        })
    })


});

//dynamic view data
function viewDist(id,type,url) {  
  $('#spinner').show();
  $('#data').hide();
  $.ajaxSetup({
    headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
 });
  $.ajax({
    url: url, // this is the object instantiated in wp_localize_script function
    type: 'POST',
    data:{id:id,type:type},
     dataType: 'json',
    success: function( data ){
      var html = $('#data');
      html.html('');
      console.log(data);
      
      $.each(data, function(index, item) {
        var india = "";
        if(data.location.length != 0){
          india ="<br><b>Across India</b><br> "+data.location;
        }

        var world = "";
        if(data.location2.length != 0){
          world ="<br><b>World Wide</b> <br>"+data.location2;
        }

        var meta_title = (item.meta_title != null)?item.meta_title:" - ";
        var meta_desc = (item.meta_desc != null)?item.meta_desc:" - ";
        var type_distributorship = (data.type_distributorship != null)?data.type_distributorship:" - ";

        if(item.mode == 'appoint' && type == 0)
        {
          var brand = (item.brand != null)?item.brand:" - ";        
          var establishment = (item.establishment != null)?item.establishment:" - ";
          var total_distributors = (item.total_distributors != null)?item.total_distributors:" - ";
          var space = (item.space != null)?item.space:" - ";
          var investment_required = (item.investment_required != null)?item.investment_required:" - ";
        
          $('#spinner').hide();
          $('#data').show();
          
        html.append(
          '<tr><th>Logo</th><td><img src="'+item.logo+'" class="img-responsive img-thumbnail" width="200"/></td>'+
          '<th>Mode</th><td>'+item.mode+'</td></tr>'+
          '<tr><th>Brand</th><td>'+brand+'</td>'+  
          '<th>Title</th><td>'+item.name+'</td></tr>'+
          '<tr><th>Establishment Year</th><td>'+establishment+'</td>'+
          '<th>Company Anual Sale*</th><td>'+item.anualsale_start+'-'+item.anualsale_end+' '+item.anualsale_unit
          +'</td></tr>'+
          '<tr><th>Total No. of distributors</th><td>'+total_distributors+'</td>'+
          '<th>Space (Sq.Ft.)</th><td>'+space+'</td></tr>'+
          '<tr><th>Sub Category</th><td>'+data.sub_cat+'</td>'+
          '<th>Investment Required</th><td>'+investment_required+'</td></tr>'+
          '<tr><th>Product keyword </th><td>'+item.product_keyword+'</td>'+
          '<th>Business profile *</th><td>'+item.business_profile+'</td></tr>'+
          '<tr><th>Meta Title</th><td>'+meta_title+'</td>'+
          '<th>Meta Description</th><td>'+meta_desc+'</td></tr>'+
          '<tr><th>Type Of Distributorship you are considering?</th><td>'+type_distributorship+'</td>'+
          '<th>Location Details</th><td>'+india+world+'</td></tr>'+
         
          '<tr><th>Remark</th><td colspan="3">'+item.remark+'</td></tr>'

          
          );
        }

       else if(item.mode == 'become' && type == 0)
        {

          var gst = (item.gst != null)?item.gst:" - ";
          var pan = (item.pan != null)?item.pan:" - "; 
          var investment_time = (item.investment_time != null)?item.investment_time:" - "; 
          var experience = (item.experience != null)?item.experience:" - "; 
          var investment_capacity = (item.investment_capacity != null)?item.investment_capacity:" - "; 

          $('#spinner').hide();
          $('#data').show();
  
        html.append(
          '<tr><th>Logo</th><td><img src="'+item.logo+'" class="img-responsive img-thumbnail" width="200"/></td>'+
          '<th>Mode</th><td>'+item.mode+'</td></tr>'+
          '<th>Title</th><td>'+item.name+'</td>'+  
          '<th>PAN Number</th><td colspan="2">'+pan
          +'</td></tr>'+
          '<tr><th>GST Number</th><td>'+gst+'</td>'+
          '<th>Experience</th><td>'+experience+'</td></tr>'+
          '<tr><th>Sub Category</th><td>'+data.sub_cat+'</td>'+
          '<th>Investment Capacity</th><td>'+investment_capacity+'</td></tr>'+
          '<tr><th>How Soon Would You Like To Invest? </th><td>'+investment_time+'</td>'+
          '<th>Product keyword </th><td>'+item.product_keyword+'</td></tr>'+
          '<tr><th>Business profile *</th><td>'+item.business_profile+'</td>'+
          '<th>Meta Title</th><td>'+meta_title+'</td></tr>'+
          '<tr><th>Meta Description</th><td>'+meta_desc+'</td>'+
          '<th>Type Of Distributorship you are considering?</th><td>'+type_distributorship+'</td></tr>'+
          '<tr><th>Location Details</th><td>'+india+world+'</td>'+
          '<th>Remark</th><td>'+item.remark+'</td></tr>'

          
          );
        }

        //franchise

        else if(item.mode == 'become' && type == 1)
        {

          var gst = (item.gst != null)?item.gst:" - ";
          var pan = (item.pan != null)?item.pan:" - "; 
          var experience = (item.experience != null)?item.experience:" - "; 
          var investment_capacity = (item.investment_capacity != null)?item.investment_capacity:" - "; 
          var industry_type  = (item.industry_type != null)?item.industry_type:" - "; 
          var investment_time = (item.investment_time != null)?item.investment_time:" - "; 
          $('#spinner').hide();
          $('#data').show();
  
        html.append(
          '<tr><th>Logo</th><td><img src="'+item.logo+'" class="img-responsive img-thumbnail" width="200"/></td>'+
          '<th>Mode</th><td>'+item.mode+'</td></tr>'+
          '<tr><th>Title</th><td>'+item.name+'</td>'+  
          '<th>Industry Type</th><td>'+industry_type+'</td></tr>'+  
          '<tr><th>PAN Number</th><td >'+pan
          +'</td>'+
          '<th>GST Number</th><td>'+gst+'</td></tr>'+
          '<tr><th>Experience</th><td>'+experience+'</td>'+
          '<th>Sub Category</th><td>'+data.sub_cat+'</td></tr>'+
          '<tr><th>Investment Capacity</th><td>'+investment_capacity+'</td>'+
          '<th>How Soon Would You Like To Invest? </th><td>'+investment_time+'</td></tr>'+
          '<tr><th>Business profile *</th><td>'+item.business_profile+'</td>'+
          '<th>Meta Title</th><td>'+meta_title+'</td></tr>'+
          '<tr><th>Meta Description</th><td>'+meta_desc+'</td>'+
          '<th>Location Details</th><td>'+india+world+'</td></tr>'+
          '<tr><th>Remark</th><td colspan="3">'+item.remark+'</td></tr>'
          
          );
        }

        else if(item.mode == 'appoint' && type == 1)
        {
          var brand = (item.brand != null)?item.brand:" - ";  
          var training_program = (item.training_program != null)?'Yes':" No ";  
          var fee = (item.fee != null)?'Yes':" No ";  
          var equip = (item.equip != null)?'Yes':" No ";  
          var furn = (item.furn != null)?'Yes':" No ";  
          var advert = (item.advert != null)?'Yes':" No ";  
          var investment_amt = (item.investment_amt != null)?item.investment_amt:" - ";  
          var investment_unit = (item.investment_unit != null)?item.investment_unit:" - ";  
          var fr_partner = (item.fr_partner != null)?item.fr_partner:" - ";  
          var softsupport = (item.softsupport != null)?'Yes':" No ";  
          var is_renew = (item.is_renew != null)?'Yes':" No ";  
          
          
          var total_franchisee = (item.total_franchisee != null)?item.total_franchisee:" - ";        
          var total_companies = (item.total_companies != null)?item.total_companies:" - ";        
          var establishment = (item.establishment != null)?item.establishment:" - ";
          var total_distributors = (item.total_distributors != null)?item.total_distributors:" - ";
          var space = (item.space != null)?item.space:" - ";
          var investment_required = (item.investment_required != null)?item.investment_required:" - ";
        
          $('#spinner').hide();
          $('#data').show();
          
        html.append(
          '<tr><th>Logo</th><td><img src="'+item.logo+'" class="img-responsive img-thumbnail" width="200"/></td>'+
          '<th>Mode</th><td>'+item.mode+'</td></tr>'+
          '<tr><th>Brand</th><td>'+brand+'</td>'+  
          '<th>Title</th><td>'+item.name+'</td></tr>'+
          '<tr><th>Establishment Year</th><td>'+establishment+'</td>'+
          '<th>Total no. of companies</th><td>'+total_companies
          +'</td></tr>'+
          '<tr><th>Total no. of franchisee</th><td>'+total_franchisee+'</td>'+
          '<th>Space (Sq.Ft.)</th><td>'+space+'</td></tr>'+
          '<tr><th>Sub Category</th><td>'+data.sub_cat+'</td>'+
          '<th>Looking for Franchisee Partner</th><td>'+fr_partner+'</td></tr>'+
          '<tr><th>Product keyword </th><td>'+item.product_keywords+'</td>'+
          '<th>Business profile *</th><td>'+item.business_profile+'</td></tr>'+
          '<tr><th>Meta Title</th><td>'+meta_title+'</td>'+
          '<th>Meta Description</th><td>'+meta_desc+'</td></tr>'+
          '<tr><th>Investment Amount</th><td>'+investment_amt+' '+investment_unit+'</td>'+
          '<th>Location Details</th><td>'+india+world+'</td></tr>'+
          '<tr><th>Franchise Fee</th><td>'+fee+'</td>'+
          '<th>Equipments</th><td>'+equip+'</td></tr>'+
          '<tr><th>Furniture & Fixtures</th><td>'+furn+'</td>'+
          '<th>Advertising / Marketing</th><td>'+advert+'</td></tr>'+
          '<tr><th>Training program available for the franchise</th><td>'+training_program+'</td>'+
         
          '<th>Software/Hardware support included in franchise fee</th><td>'+softsupport+'</td></tr>'+
          '<tr><th>Is the franchise renewable:</th><td>'+is_renew+'</td>'+
          '<th>Remark</th><td>'+item.remark+'</td></tr>' 
          
          
          );
        }
             //sales agent 
        else if(item.mode == 'become' && type == 2)
        {

          var gst = (item.gst != null)?item.gst:" - ";
          var pan = (item.pan != null)?item.pan:" - "; 
          var annual_sale = (item.annual_sale != null)?item.annual_sale:" - "; 
          var dob = (item.dob != null)?item.dob:" - "; 
          
          var experience = (item.experience != null)?item.experience:" - "; 
          var education = (item.education != null)?item.education:" - "; 
          var target_customer = (item.target_customer != null)?item.target_customer:" - ";        
          var expected_work = (item.expected_work != null)?item.expected_work:" - ";        
          var cities_needed = (item.cities_needed != null)?item.cities_needed:" - ";
          $('#spinner').hide();
          $('#data').show();
  
        html.append(
          '<tr><th>Logo</th><td><img src="'+item.logo+'" class="img-responsive img-thumbnail" width="200"/></td>'+
          '<th>Mode</th><td>'+item.mode+'</td></tr>'+
          '<tr><th>Title</th><td>'+item.name+'</td>'+  
          '<th>Agent Type</th><td>'+item.agent_type+'</td></tr>'+  
          '<tr><th>Annual Sale</th><td >'+annual_sale
          +'</td>'+
          '<th>Date of Birth</th><td>'+dob+'</td></tr>'+
          '<tr><th>Experience</th><td>'+experience+'</td>'+
          '<th>Education</th><td>'+education+'</td></tr>'+
          '<tr><th>PAN Number</th><td>'+pan+'</td>'+
          '<th>GST Number</th><td>'+gst+'</td></tr>'+
          '<tr><th>Sub Category</th><td>'+data.sub_cat+'</td>'+
          '<th>Business profile *</th><td>'+item.business_profile+'</td></tr>'+
          '<tr><th>Product Detail</th><td>'+item.product_detail+'</td>'+
          '<th>Target Customer</th><td>'+target_customer+'</td></tr>'+
          '<tr><th>Expected Work</th><td>'+expected_work+'</td>'+
          '<th>Cities Needed</th><td>'+cities_needed+'</td></tr>'+
          '<tr><th>Location Details</th><td>'+india+world+'</td>'+
          '<th>Remark</th><td >'+item.remark+'</td></tr>'
          
          );
        }

        else if(item.mode == 'appoint' && type == 2)
        {      
          
          var target_customer = (item.target_customer != null)?item.target_customer:" - ";        
          var expected_work = (item.expected_work != null)?item.expected_work:" - ";        
          var cities_needed = (item.cities_needed != null)?item.cities_needed:" - ";
          $('#spinner').hide();
          $('#data').show();
          
        html.append(
          '<tr><th>Logo</th><td><img src="'+item.logo+'" class="img-responsive img-thumbnail" width="200"/></td>'+
          '<th>Mode</th><td>'+item.mode+'</td></tr>'+
          '<tr><th>Title</th><td>'+item.name+'</td>'+  
          '<th>Cities Needed</th><td>'+cities_needed+'</td></tr>'+  
          '<tr><th>Sub Category</th><td>'+data.sub_cat+'</td>'+
          '<th>Target Customer</th><td>'+target_customer+'</td></tr>'+
          '<tr><th>Product Detail </th><td>'+item.product_detail+'</td>'+
          '<th>Business profile *</th><td>'+item.business_profile+'</td></tr>'+
          '<tr><th>Meta Title</th><td>'+meta_title+'</td>'+
          '<th>Meta Description</th><td>'+meta_desc+'</td></tr>'+
          '<tr><th>Expected Work</th><td>'+expected_work+'</td>'+
          '<th>Location Details</th><td>'+india+world+'</td></tr>'+
          '<th>Remark</th><td>'+item.remark+'</td></tr>' 
          
          
          );
        }

      });
     
     
     // html.append(htmlData); 
    },
    error: function (msg) {
      console.log(msg);
      var errors = msg.responseJSON;
      console.log(errors);
   }
  });
}

function deleteImg(type,img,url,id,imgKey){ 
  $.ajaxSetup({
    headers: {
       'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
 });
  $.ajax({
    url: url, // this is the object instantiated in wp_localize_script function
    type: 'POST',
    data:{id:id,type:type,img:img},
     dataType: 'json',
    success: function( data ){    
      if(data.msg=='success'){
        $('#'+imgKey).remove(); 
       // alert("sucess");
      }
      console.log(data);
    },
    error: function (msg) {
      console.log(msg);
      var errors = msg.responseJSON;
      $('.'+imgKey).text('Error Occur!!'); 
      console.log(errors);
   }
    });
}





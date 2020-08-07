$(document).ready(function() {
	$("#filterlist .custom-control-input").change(function() {
  	var category = $(this).parent().attr('id');
  	var brandids = [];
		var typeids = [];
		var compatibilityids = [];
  	 		
  		//console.log(category);		 	
      $('.checkbox-choices input[type="checkbox"]:checked').each(function() {                
        var name = $(this).attr('name');
          if(name.indexOf("brand") != -1) {
          	var id= name.substr(name.indexOf("_") + 1);
          	brandids.push(id);

          }
          if(name.indexOf("type") != -1) {
          	var id= name.substr(name.indexOf("_") + 1);
          	typeids.push(id);
          }
          if(name.indexOf("compatibility") != -1) {
          	var id= name.substr(name.indexOf("_") + 1);
          	compatibilityids.push(id);
          }
        
      });	
    
    	if($(this). prop("checked") == false) {
    		var name = $(this).attr('name');
    		if(name.indexOf("brand") != -1) {
    	 		console.log(brandids);  
        	var remove_id= name.substr(name.indexOf("_") + 1);
        	var brandids = $(brandids).not([remove_id]).get(); 
      	}
      	if(name.indexOf("type") != -1) {
    	 		console.log(typeids);  
        	var remove_id= name.substr(name.indexOf("_") + 1);
        	var typeids = $(typeids).not([remove_id]).get(); 
      	}
      	if(name.indexOf("compatibility") != -1) {
    	 		console.log(compatibilityids);  
        	var remove_id= name.substr(name.indexOf("_") + 1);
        	var compatibilityids = $(compatibilityids).not([remove_id]).get(); 
      	}
      }
      
       //var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      //console.log(favourite)	;
		 /*alert("brand ids are" + brandids.join(", ") 
		 	+ "brand ids are" + typeids.join(", ") +"comp ids are" + compatibilityids.join(", ") );*/
	  	$.ajax({
	  		type:"post",
      	url:"/products/"+ category +"/filterproductlist",   
      	  headers: {
        		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    			},   	
      	data:{brandids:brandids,typeids:typeids,compatibilityids:compatibilityids},
      	success:function(result) {
       		$('#filterlist .productlist').html(result);
      	}
   		})
	  
	});
  $("#tech_spec").hide();
  $("#tech").click(function(){
         $("#tech_spec").toggle();
    });
  $("#phy_spec").hide();
  $("#phy").click(function(){
         $("#phy_spec").toggle();
    });
  $("#warranty_detail").hide();
  $("#warranty").click(function(){
         $("#warranty_detail").toggle();
    });
  $("#compatibility").hide();
  $("#comp").click(function(){
         $("#compatibility").toggle();
    });
  $("#addtocart #addcart").click(function(){
      var count = $("#no_of_quantity").val();
      var name = $("#addtocart").children('#product_name').text();
      var product_id = $("#product_id_no").val();
      var category = $("#category").val();
       $.ajax({
      url:"/addtocart",
      headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
      type:"POST",
      data:{count:count,name:name,product_id:product_id,category:category},
       dataType: 'JSON',
      success:function(results) {
        $('#cart_count').text(results.count);
       $('#message').html(results.message);
      }
   })
  });
  $("#shoppingcart .deletefromcart").click(function(){
    var thisObj = $(this);
    var product_id = $(this).parent().attr('id');/*
   alert(product_id);*/
    $.ajax({
      url:"/deletefromcart",
       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
      type:"POST",
      data:{product_id:product_id},
      dataType: 'JSON',
      success:function(results) {
        $('#cart_count').text(results.count);
        var product_id = thisObj.parent().attr('id');        
        console.log('#product_'+product_id);
        $('#product_'+product_id).remove();
        $('#checkoutlist').html(results.output);
      }
   })
  });
   $('#shoppingcart #no_of_quantity').change(function() {
    var quantity = $(this).val();
    var product_id = $(this).parent().attr('id');
    alert("product quantity updated");
    $.ajax({
      url:"/updatecartquantity",
       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
      type:"POST",
      data:{quantity:quantity},
      dataType: 'JSON',
      success:function(results) {
        
      }
   })

  });
});
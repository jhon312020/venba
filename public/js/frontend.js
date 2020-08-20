function renewToken() {
    var csrfUrl = '/refresh_csrf';

    $.get(csrfUrl, function (data) {
        $('meta[name="csrf-token"]').attr('content', data);
    });
    return;
 }
$(document).ready(function() {
	$("#filterlist .custom-control-input").change(function() {
  	var category = $(this).parent().attr('id');
    var subcatids = [];
  	var brandids = [];
		var typeids = [];
		var compatibilityids = [];
    var colorids = [];
  	 		
  		//console.log(category);		 	
      $('.checkbox-choices input[type="checkbox"]:checked').each(function() {                
        var name = $(this).attr('name');
        if(name.indexOf("subcat") != -1) {
            var id= name.substr(name.indexOf("_") + 1);
            subcatids.push(id);

          }
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
          if(name.indexOf("color") != -1) {
            var id= name.substr(name.indexOf("_") + 1);
            colorids.push(id);
          }
        
      });	
    
    	if($(this). prop("checked") == false) {
    		var name = $(this).attr('name');
        if(name.indexOf("subcat") != -1) {
          console.log(subcatids);  
          var remove_id= name.substr(name.indexOf("_") + 1);
          var subcatids = $(subcatids).not([remove_id]).get(); 
        }
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
        if(name.indexOf("color") != -1) {
          console.log(colorids);  
          var remove_id= name.substr(name.indexOf("_") + 1);
          var colorids = $(colorids).not([remove_id]).get(); 
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
      	data:{subcatids:subcatids,brandids:brandids,typeids:typeids,compatibilityids:compatibilityids,colorids:colorids},
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
  $("#addtocart .addcart").click(function(){
      var count = 1;
      var name = $('#product_name').text();
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
       //$('#message').html(results.message);
       $('.addcart').remove();
       $('.cartmsg').html(results.message);
      }
   })
  });
  $("#shoppingcart .deletefromcart").click(function(){/*
    renewToken();*/
    var thisObj = $(this);
    var product_id = $(this).parent().attr('id');
    /*var token = $('#token').val();    
    var token = $('meta[name="csrf-token"]').attr('content')/*
    alert(product_id);
    */
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
        $('#producttotal').text(results.producttotal);
        $('#igst').text(results.igst);
        $('#sgst').text(results.sgst);
        $('#transit').text(results.transit);
        $('#total').text(results.total);
      }
   })
  });
   $('#shoppingcart .updatecount').click(function() {    
    var incordec = $(this).attr('id');
    /*alert(incordec);*/
    if(incordec == -1){
     var quantity = parseInt($(this).next().text());
     var updatecount = quantity - 1; 
     $(this).next().text(updatecount);
    } else {
      var quantity = parseInt($(this).prev().text());
      var updatecount = quantity + 1;
      $(this).prev().text(updatecount);
    }       
    var product_id = $(this).parent().attr('id');
    quantity = updatecount;
    /*alert("product quantity updated");*/
   $.ajax({
      url:"/updatecartquantity",
       headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
      type:"POST",
      data:{quantity:quantity,product_id:product_id},
      dataType: 'JSON',
      success:function(results) {
        $('#checkoutlist').html(results.output);
        $('#producttotal').text(results.producttotal);
        $('#igst').text(results.igst);
        $('#sgst').text(results.sgst);
        $('#transit').text(results.transit);
        $('#total').text(results.total);
      }
   })

  });
});
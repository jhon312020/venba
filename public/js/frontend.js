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
        console.log(brandids);
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
      	data:{brandids:brandids, typeids:typeids,compatibilityids:compatibilityids},
      	success:function(result) {
       		$('#filterlist .productlist').html(result);
      	}
   		})
	  
	});
});
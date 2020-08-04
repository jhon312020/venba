$(document).ready(function() {
	$("#filterlist .custom-control-input").change(function() {
  	if(this.checked) {
  		var category = $(this).parent().attr('id');
  		console.log(category);
		 	var brandids = [];
		 	var typeids = [];
		 	var compatibilityids = [];
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
	  }
	});
});
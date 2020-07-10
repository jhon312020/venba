$(document).ready(function(){
	
  $('#conceptEditForm').on('submit',function(e){ 
    //var url = "{{URL('editconcept/'.$item->id)}}";
    id = $("#id").val();
    name = $("#editconcept").val();
    url = $('#conceptEditForm').attr('action');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:url,
    type:"POST",
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
    data:{id:id,name:name, _token:_token,},
    success:function(result)
    {
     $("#success").html(result);
    }
    });
  	e.preventDefault();
  });
  $('#conceptAddForm').on('submit',function(e){ 
  	
    //var url = "{{URL('editconcept/'.$item->id)}}";
    var form_data = $(this);
    //id = $("#id").val();
    name = $("#addconcept").val();
    var _token = $('input[name="_token"]').val();
    //var route = $('#conceptadform').data('route');
    $.ajax({
    url:"./conceptadded/store",
    type:"POST",
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
    data:{name:name, _token:_token,},
    success:function(result)
    {
    	console.log(result);
     $("#success").html(result);
    }
    });
  	e.preventDefault();
  });
});

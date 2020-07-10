$(document).ready(function(){
	
  $('#categoryAddForm').on('submit',function(e){ 
    //var url = "{{URL('editconcept/'.$item->id)}}";    
    id = $("#catid").val();
    name = $("#addcategory").val();
    url = $('#categoryAddForm').attr('action');
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
  $('#categoryEditForm').on('submit',function(e){ 
    //var url = "{{URL('editconcept/'.$item->id)}}";
    id = $("#id").val();
    name = $("#editcategory").val();
    cat_id = $("#cat_id").val();
    url = $('#categoryEditForm').attr('action');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:url,
    type:"POST",
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
    data:{id:id,name:name,cat_id:cat_id, _token:_token,},
    success:function(result)
    {
     $("#success").html(result);
    }
    });
    e.preventDefault();
  });
});
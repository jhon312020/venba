$(document).ready(function(){   
 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"./addproduct/fetch",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#subcatid').html(result);
    }

   })
  }
 });
 $('#productAddForm').on('submit',function(e){ 
    //var url = "{{URL('editconcept/'.$item->id)}}";    
   /* name = $("#name").val();
    materialno = $("#materialno").val();
    conceptid = $("#conceptid").val();
    categoryid = $("#categoryid").val();
    subcatid = $("#subcatid").val();
    compatability = $("#compatability").val();
    power = $("#power").val();
    physicalspec = $("#physicalspec").val();
    lightcolor = $("#lightcolor").val();
    intro = $("#intro").val();
    accessories = $("#accessories").val();
    warranty = $("#warranty").val();
    tech = $("#tech").val();
    addfea = $("#addfea").val();
    wirecon = $("input[name='wired']:checked"). val();
    image = $("#exampleInputFile").val();*/
    //form_data = $("#productAddForm").serialize();

    url = $('#productAddForm').attr('action');
    var _token = $('input[name="_token"]').val();
    $.ajax({
    url:url,
    type:"POST",
    headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
    data:/*{name:name,materialno:materialno,conceptid:conceptid,categoryid:categoryid,subcatid:subcatid,compatability:compatability,power:power,physicalspec:physicalspec,lightcolor:lightcolor,intro:intro,accessories:accessories,warranty:warranty,tech:tech,addfea:addfea,wirecon:wirecon,image:image, _token:_token,},*/new FormData(this),
    dataType:'JSON',
    contentType: false,
    cache: false,
    processData: false,
    success:function(result)
    {
     $("#success").html(result.message);
    }
    });
    e.preventDefault();
  });
 });
function addDeleteForms() {
  $('[data-method]').append(function () {
    if (!$(this).find('form').length > 0) {
      return "\n<form action='" + $(this).attr('href') + "' method='POST' name='delete_item' style='display:none'>\n" +
          "<input type='hidden' name='_method' value='" + $(this).attr('data-method') + "'>\n" +
          "<input type='hidden' name='_token' value='" + $('meta[name="csrf-token"]').attr('content') + "'>\n" +
          '</form>\n';
    } else { return '' }
  })
    .attr('href', '#')
    .attr('style', 'cursor:pointer;')
    .attr('onclick', '$(this).find("form").submit();');
}
$(document).ready(function() {
  /**
     * Add the data-method="delete" forms to all delete links
     */
    addDeleteForms();

    /**
     * Disable all submit buttons once clicked
     */
    $('form').submit(function () {
        $(this).find('input[type="submit"]').attr('disabled', true);
        $(this).find('button[type="submit"]').attr('disabled', true);
        return true;
    });

    /**
     * Generic confirm form delete using Sweet Alert
     */
    $('body').on('submit', 'form[name=delete_item]', function (e) {
        e.preventDefault();

        const form = this;
        const link = $('a[data-method="delete"]');
        const cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : 'Cancel';
        const confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : 'Yes, delete';
        const title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : 'Are you sure you want to delete this item?';

        Swal.fire({
            title: title,
            showCancelButton: true,
            confirmButtonText: confirm,
            cancelButtonText: cancel,
            icon: 'warning'
        }).then((result) => {
            result.value && form.submit();
        });
    }).on('click', 'a[name=confirm_item]', function (e) {
        /**
         * Generic 'are you sure' confirm box
         */
        e.preventDefault();

        const link = $(this);
        const title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : 'Are you sure you want to do this?';
        const cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : 'Cancel';
        const confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : 'Continue';

        Swal.fire({
            title: title,
            showCancelButton: true,
            confirmButtonText: confirm,
            cancelButtonText: cancel,
            icon: 'info'
        }).then((result) => {
            result.value && window.location.assign(link.attr('href'));
        });
    });

  $('[data-toggle="tooltip"]').tooltip();
  // To auto close alert after 2 seconds
  $(".alert-success").delay(1000).slideUp(200, function() {
    $(this).alert('close');
  });
  //for add product
  $('.dynamic').change(function(){

  if($(this).val() != '')
  {
   //var select = $(this).attr("id");
   var value = $(this).val();
   console.log("hi");
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"./add/fetch",
    type:"POST",
    data:{value:value,dependent:dependent, _token:_token},
    success:function(result)
    {
     $('#sub_cat_id').html(result);
    }

   })
  }
 }); 
  //for edit product
 $('.dynamicedit').change(function(){

  if($(this).val() != '')
  {
   //var select = $(this).attr("id");
   var value = $(this).val();
   console.log("hi");
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"./edit/fetch",
    type:"POST",
    data:{value:value,dependent:dependent, _token:_token},
    success:function(result)
    {
     $('#sub_cat_id').html(result);
    }

   })
  }
 });  
  /**
     * Add dynamic fields for additional product properties.
     */
  var x = 0; //Initial field counter
  var list_maxField = 100; //Input fields increment limitation
  $('.list_add_button').click(function() {
    console.log("hi");
    //Check maximum number of input fields
    if(x < list_maxField){ 
      x++; //Increment field counter
      var list_fieldHTML = '<div class="row"><div class="col-xs-4 col-sm-4 col-md-4"><div class="form-group"><input name="dynamicfield['+x+'][label]" type="text" placeholder="Type Label" class="form-control"/></div></div><div class="col-xs-7 col-sm-7 col-md-7"><div class="form-group"><input name="dynamicfield['+x+'][value]" type="text" placeholder="Type Value" class="form-control"/></div></div><div class="col-xs-1 col-sm-7 col-md-1"><a href="javascript:void(0);" class="list_remove_button btn btn-danger">-</a></div></div>'; //New input field html 
      $('.list_wrapper').append(list_fieldHTML);
       //Add field html

    }
  });
    
  //Once remove button is clicked
  $('.list_wrapper').on('click', '.list_remove_button', function() {
    $(this).closest('div.row').remove(); //Remove field html
    x--; //Decrement field counter
  });
  //toggle between additional properties fields
  $('.list_wrapper').hide();
  $('.dynamicdisplay').click(function(){
    $(this).find("i").toggleClass('fa-arrow-up fa-arrow-down');
   $('.list_wrapper').toggle(); 
  })
  /**
     * Add dynamic fields for product images.
     */
    $('.clone').hide();
    $('.addnewfield').click(function(){
      var html =$(".clone").html();
      $(".increment").after(html);
    });  
    $("body").on("click", ".removefield", function(){
      $(this).parents(".input-group").remove();
    });  
  $(".datatable").DataTable();
});


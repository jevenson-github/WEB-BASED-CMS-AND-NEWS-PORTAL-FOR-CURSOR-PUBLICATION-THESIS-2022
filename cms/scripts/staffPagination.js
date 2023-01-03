//const autoRefresh = setInterval(load_data, 500);

load_data();

    function load_data(page)  
    {  
         $.ajax({  
              url:"staffPagination.php",  
              method:"POST",  
              data:{page:page},  
              success:function(data){  
                   $('#pagination_data').html(data);  
              }  
         })  
    }  

    $(document).on('click', '.pagination_link', function(){  
         var page = $(this).attr("id");  
         load_data(page);  
    });  

    $('#viewStaff').on('click', function () {
     $('#modal_viewStaff').modal('show');
   });

    
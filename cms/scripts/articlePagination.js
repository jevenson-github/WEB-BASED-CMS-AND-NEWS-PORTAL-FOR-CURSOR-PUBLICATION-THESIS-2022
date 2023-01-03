/*load_data();

    function load_data(page)  
    {  
         $.ajax({  
              url:"articlePagination.php",  
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
*/
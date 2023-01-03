// fetch table per role 
$(document).ready(function () {
    // load data
    fill_datatable();
      
    function fill_datatable(filter_category = "", search_category = "") {
      var dataTable = $("#mytable").DataTable({
        processing: true,
        serverSide: true,
        bLengthChange: false,
        paging: true,
        searching: false,
        bInfo : false, // hide number of entries or result
        ajax: {
          url: "videoProcess.php",
          type: "POST",
          data: {
            operation: "fetchContentTable2"
          },
        },
  
        columnDefs: [
          {
            targets: "_all",
            orderable: false,
          },
        ],
        order: false,
        lengthMenu: [10, 25],
      });
    }
  
  
    // category search filtration 
    // $("#category").change(function () {
    //   var category = $("#category").val();
    //   // alert(category)   ;
    //   if (category != "") {
    //     $("#mytable").DataTable().destroy();
    //     fill_datatable(category,"");
    //   } else if (category == null) {
    //     $("#mytable").DataTable().destroy();
    //     fill_datatable();
    //   }
    // });
  
    // // search bar filtration 
    // $("#searchvalue").keyup(function () {
    //   var searchvalue = $("#searchvalue").val();
    //   // alert(category)   ;
    //   if (searchvalue != "") {
    //     $("#mytable").DataTable().destroy();
    //     fill_datatable("",searchvalue);
    //   } else if (searchvalue == "") {
    //     $("#mytable").DataTable().destroy();
    //     fill_datatable();
    //   }
    // }); 
  
  

  

});
$("#btn_addVideos").click(function (e) { 
    var formVideos = new FormData(); 

    if($('#videoTitle').val() =="" ||$('#videoUrl').val() =="" ){
        Swal.fire({
            // position:'top-end',
            icon: 'warning',
            text:'Both fields are required', //message 
            showConfirmButton: false,
            timer: 3000,
          })  
    } else {
         
  

    formVideos.append('addVideo',true);
    formVideos.append('videoTitle', $('#videoTitle').val()); 
    formVideos.append('videoUrl', $('#videoUrl').val()); 

    $.ajax({
        url:"videoProcess.php",
        method:"POST",
        data:formVideos,
        contentType:false,
        cache:false,
        processData:false,
        success:function(data)
        {  
            //alert(data); 
            // $('#image').val('');
            // load_images();
            Swal.fire({
                // position: 'top-end',
                icon: 'success',
                text: 'Video Added', //message
                showConfirmButton: false,
                timer: 3000,
                position:'top-end', 
              }).then( function () { 
                 window.location.href = '../videos/addVideo.php'; 
               }); 

         
            
        }
    });
    
}

});


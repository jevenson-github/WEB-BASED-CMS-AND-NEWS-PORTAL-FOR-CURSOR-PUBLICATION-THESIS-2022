
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
          url: "imageProcess.php",
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


// Add album 
function addAlbum(){

    // var filedata = document.getElementsByName("file");
    // var len = filedata.files.length; 
    var addAlbum  = new FormData();
   
    addAlbum.append('insertButton', true); 
    addAlbum.append('title',$('#title').val());
    var files = $('#image')[0].files;

    for (var i = 0; i < files.length; i++) {
        addAlbum.append("image[]",files[i]);
    }  
    
    $.ajax({
        url:"imageProcess.php",
        method:"POST",
        data: addAlbum,
        contentType:false,
        processData:false,
        success:function(data)
        {  
            
            Swal.fire({
                // position: 'top-end',
                icon: 'success',
                text: data, //message
                showConfirmButton: false,
                timer: 2000,
                position:'top-end', 
              }).then( function () { 
                window.location.href = '../gallery/index.php'; 
           }); 
            // $('#image').val('');
            // load_images();
        }
    });


}

// add image on specific album 
function addImage(){ 

    var form_update = new FormData();  
   
    var  files =  $('#image_add')[0].files ;
    if(files.length <= 0){
        alert('Please select an Image');
    }else { 
       


        form_update.append('current_album',$('#current_album').val());
        form_update.append('image_add', document.getElementById('image_add').files[0] );
        form_update.append('insert_current_album',true);

        $.ajax({ 
            url:"imageProcess.php",
            method:"POST",
            data: form_update,
            contentType:false,
            cache:false,
            processData:false,
            success:function(data)
            {  
             
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    text: "Gallery Uploaded Success", //message
                    showConfirmButton: false,
                    timer: 2000,
                  }).then( function () { 
                     // get the current url to redirect 
                     var current_url = window.location.href ; 
                     window.location.href = current_url; 
               }); 
                // $('#image').val('');
                // load_images();
            }
        });
    }
    


    
}

// Delete specific image 
function deleteId(id){


    var deleteImage = new FormData();
    deleteImage.append('deleteImageButton',true);
    deleteImage.append('imageID',id);
    $.ajax({
            url:"imageProcess.php",
            method:"POST",
            data: deleteImage,
            contentType:false,
            processData:false,
            success:function(data)
            {  
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    text: data, //message
                    showConfirmButton: false,
                    timer: 2000,
                  }).then( function () { 
                    // get the current url to redirect 
                    var current_url = window.location.href ; 
                    window.location.href = current_url; 
               }); 
            } 
    });

}
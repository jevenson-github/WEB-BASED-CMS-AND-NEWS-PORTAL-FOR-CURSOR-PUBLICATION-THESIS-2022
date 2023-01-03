
// load notification 
function load_unseen_notification(view ='') { 

  $.ajax({
    url:"contentNotification.php",
    method:"POST",
    data:{view:view},
    dataType:"json",
    success:function(data)
    { 
       // viewing data  
    $('.bodyMessage').html(data.notification);

     // for count 
     if(data.unseen_notification > 0)
     {
     $('.count').html(data.unseen_notification);
     }

    }
  });
 } 

 load_unseen_notification();



// notification bell 
 $("#notif_bell").click(function (e) { 
  //e.preventDefault();

  $('.count').html('0');
  load_unseen_notification('yes');


  $("#exampleModalScrollable").removeClass('hidden');
  
});

$("#exampleModalScrollable").click(function (e) { 

  $("#exampleModalScrollable").addClass('hidden');
  
}); 

// refresh notification every 5 miliseconds 
setInterval(function(){ 
  load_unseen_notification();
},500);


// fetch table per role 
$(document).ready(function () {
  // load data
  fill_datatable();
    
  function fill_datatable(filter_category = "", search_category = "" , status_category = "") {
    var dataTable = $("#mytable").DataTable({
      processing: true,
      serverSide: true,
      bLengthChange: false,
      paging: true,
      searching: false,
      bInfo : false, // hide number of entries or result
      ajax: {
        url: "contentProcess.php",
        type: "POST",
        data: {
          operation: "fetchContentTable",
          filter_category: filter_category,
          search_category: search_category,
          status_category : status_category
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
  $("#category").change(function () {
    var category = $("#category").val();
    // alert(category)   ;
    if (category != "") {
      $("#mytable").DataTable().destroy();
      fill_datatable(category, "","");
    } else if (category == null) {
      $("#mytable").DataTable().destroy();
      fill_datatable();
    }
  });

  // search bar filtration 
  $("#searchvalue").keyup(function () {
    var searchvalue = $("#searchvalue").val();
    // alert(category)   ;
    if (searchvalue != "") {
      $("#mytable").DataTable().destroy();
      fill_datatable("", searchvalue,"");
    } else if (searchvalue == "") {
      $("#mytable").DataTable().destroy();
      fill_datatable();
    }
  }); 

  // filter per status
  $('.selectedLi').change(function() {
    var statusValue  = this.value;
    
      if (statusValue != "") {
        $("#mytable").DataTable().destroy();
        fill_datatable("","",statusValue);
      } else if (searchvalue == "") {
        $("#mytable").DataTable().destroy();
        fill_datatable();
      }
  });

});

// adding content modal | hiding and showing 
$("#btn_content_addContent").click(function (e) { 

  $("#page-contents_addContent").removeClass("hidden");
  $("#page-contents_dashboard").addClass("hidden");
});

// WYSIWYG EDITOR //
tinymce.init({
  selector: "article",
  inline: true,
  plugins: ["quickbars", "link"],
  quickbars_selection_toolbar:
    "bold italic link | h2 h3 blockquote removeformat",
  quickbars_insert_toolbar: false,
  menubar: false,
  toolbar: false,
});

// image preview 
var preview = function (event) {
  var reader = new FileReader();
  reader.onload = function () {
    var output = document.getElementById("imagePreview");
    output.src = reader.result;
    $("#imagePreview").removeClass("hidden");
    $("#wysiwyg_leadVisual").addClass("hidden");
    $("#ekek").addClass("hidden");
  };
  reader.readAsDataURL(event.target.files[0]);
};

// to change image again 
function changeAgain(){

  $("#imagePreview").addClass("hidden");
  $("#wysiwyg_leadVisual").addClass("hidden");
  $("#ekek").removeClass("hidden");
}


//image preview on edit 
var previewEdit = function (event) {
  var reader = new FileReader();
  reader.onload = function () {
    var output = document.getElementById("imagePreviewEdit");
    $("#ekekEdit").addClass("hidden");
    $("#imagePreviewEdit").removeClass("hidden");

    output.src = reader.result;   
  };
  reader.readAsDataURL(event.target.files[0]);
};

// //image preview on edit 
function editImage(){ 

  $("#imagePreviewEdit").addClass("hidden");
  $("#imagePreviewEdit").removeAttr("src");
  $("#ekekEdit").removeClass("hidden");
  $("#wysiwyg_leadVisualEdit").removeClass("hidden");

}


// time preview 
window.setInterval(function () {
  $('#wysiwyg_timestamp').html(moment().format('[Published ] MMMM DD y [ at ] HH:mm A'))
}, 1000);


// ADD ARTICLE //
var slug, section, title, content, leadText, author;
author = $("#wysiwyg_author").text();

$("#addContent_section").change(function (e) {
  
  section = $("#addContent_section").find(":selected").val();
  $("#wysiwyg_section").text(section);

  if (section == "Announcement") {
    $("#wysiwyg_author").text("CURSOR Publication")
  }

  else {
    $("#wysiwyg_author").text(author)
  }

});


$("#wysiwyg_title").keyup(function (e) {
  var getString = $(this).text();
  var trimString = $.trim(getString);
  var slug = trimString.replace(/[^\w ]+/g, "").replace(/ +/g, "-");
  var slug = slug.toLowerCase();

  $("#addContent_slug").text(slug);
});


// ADDING CONTENT 
$("#btn_addContent_submitContent").click(function (e) {
  

  if($('#wysiwyg_title').text().trim().length == 0){
    Swal.fire({
      // position:'top-end',
      icon: 'warning',
      text:'Title Required', //message 
      showConfirmButton: false,
      timer: 3000,
      position:'top-end', 
    })  

  }else if($("#wysiwyg_leadVisual").val() == ""){
    Swal.fire({
      // position:'top-end',
      icon: 'warning',
      text:'Please select an image to display with dimension of 800x400 pixels', //message 
      showConfirmButton: false,
      timer: 3000,
      position:'top-end', 
    })  
    
  }
  else if($('#wysiwyg_content').html() == "" || $('#wysiwyg_leadText').html() == ""){
    Swal.fire({
      // position:'top-end',
      icon: 'warning',
      text:'Contents Required ', //message 
      showConfirmButton: false,
      timer: 3000,
      position:'top-end', 
    })  
       
  }
  else if($("#addContent_section").val() == 0){
    Swal.fire({
      // position:'top-end',
      icon: 'warning',
      text:'Please select content section.', //message 
      showConfirmButton: false,
      timer: 3000,
      position:'top-end', 
    })  
    
  }
  

else {

  //operation = "addContent";
  section = $("#wysiwyg_section").text();
  title = $("#wysiwyg_title").text();
  slug = $("#addContent_slug").text();
  author = $("#wysiwyg_author").text();
  leadVisual = $("#wysiwyg_leadVisual").prop("files")[0];
  leadText = $("#wysiwyg_leadText").html();
  content = $("#wysiwyg_content").html();
  
  var contents = new FormData();

  contents.append("addContent", true);
  contents.append("section", section);

  if (section != "Announcement") {
    contents.append("title", title);
  }
  else {
    contents.append("title", "Announcement");
  }

  contents.append("title", title);
  contents.append("slug", slug);
  contents.append("author", author);
  contents.append("leadVisual", leadVisual);
  contents.append("leadText", leadText);
  contents.append("content", content);

    $.ajax({
      url: "contentFunction.php",
      type: "POST",
      data: contents,
      processData: false, // important
      contentType: false, // important
      success: function (data) {
        //console.log(data); 

        Swal.fire({
          // position:'top-end',
          icon: 'success',
          text:data, //message
          showConfirmButton: false,
          timer: 3000,
          position:'top-end', 
        }).then( function () { 
          window.location.href = '../contents/index.php'; 
            
    }); 
        
      },
    }); 
}

});

// SAVING DRAFT 
$("#btn_addContent_draftContent").click(function (e) { 

  if($('#wysiwyg_title').text().trim().length == 0){
    Swal.fire({
      // position:'top-end',
      icon: 'warning',
      text:'Title Required', //message 
      showConfirmButton: false,
      timer: 3000,
      position:'top-end', 
    })  

  }else if($("#wysiwyg_leadVisual").val() == ""){
    Swal.fire({
      // position:'top-end',
      icon: 'warning',
      text:'Please select an image to display with dimension of 800x400 pixels', //message 
      showConfirmButton: false,
      timer: 3000,
      position:'top-end', 
    })  
    
  }
  else if($('#wysiwyg_content').html() == "" || $('#wysiwyg_leadText').html() == ""){
    Swal.fire({
      // position:'top-end',
      icon: 'warning',
      text:'Contents Required ', //message 
      showConfirmButton: false,
      timer: 3000,
      position:'top-end', 
    })  
       
  }
  else if($("#addContent_section").val() == 0){
    Swal.fire({
      // position:'top-end',
      icon: 'warning',
      text:'Please select content section.', //message 
      showConfirmButton: false,
      timer: 3000,
      position:'top-end', 
    })  
    
  }
  

else {

  section = $("#wysiwyg_section").text();
  title = $("#wysiwyg_title").text();
  slug = $("#addContent_slug").text();
  author = $("#wysiwyg_author").text();
  leadVisual = $("#wysiwyg_leadVisual").prop("files")[0];
  leadText = $("#wysiwyg_leadText").html();
  content = $("#wysiwyg_content").html();

  var contents_Draft = new FormData();

  contents_Draft.append("draftContent", true);
  contents_Draft.append("section", section);

  if (section != "Announcement") {
    contents_Draft.append("title", title);
  }
  else {
    contents_Draft.append("title", "Announcement");
  }

  contents_Draft.append("title", title);
  contents_Draft.append("slug", slug);
  contents_Draft.append("author", author);
  contents_Draft.append("leadVisual", leadVisual);
  contents_Draft.append("leadText", leadText);
  contents_Draft.append("content", content);

  $.ajax({
    url: "contentFunction.php",
    type: "POST",
    data: contents_Draft,
    processData: false, // important
    contentType: false, // important
    success: function (data) {
     // console.log(data); 
      
      Swal.fire({
        // position:'top-end',
        icon: 'success',
        text:data, //message
        showConfirmButton: false,
        timer: 3000,
        position:'top-end', 
      }).then( function () { 
        window.location.href = '../contents/index.php'; 
          
   }); 


    },
  });
}
});

// saving changes to draft content 
$('#btn_savedraftContent').click(function (e) { 

  var content_saveChanges = new FormData();

  content_saveChanges.append('saveChanges', true); 
  content_saveChanges.append('slugID',$('#btn_updateContent').val());
  content_saveChanges.append('visual',$("#wysiwyg_leadVisualEdit").prop("files")[0]);
  content_saveChanges.append('leadText',$('#wysiwyg_leadTextEdit').html() ); 
  content_saveChanges.append('content',$('#wysiwyg_contentEdit').html() ); 
  content_saveChanges.append('contentStage', $('#contentStage').val());  


    $.ajax({
      url: "contentFunction.php",
      type: "POST",
      data: content_saveChanges,
      processData: false, // important
      contentType: false, // important
      success: function (data) {
      //console.log(data);
        
      Swal.fire({
        // position:'top-end',
        icon: 'success',
        text:data, //message
        showConfirmButton: false,
        timer: 3000,
        position:'top-end', 
      }).then( function () { 
        window.location.href = '../contents/index.php'; 
          
   }); 
        
      },
    });
});
// APPROVAL OF ARTICLES 
$("#btn_updateContent").click(function (e) { 
   var content_Update = new FormData();
   

   if( ($("#currentRole").val() == 'Editor-in-Chief' || $("#currentRole").val() == 'Associate Editor') && $('#contentStage').val() == 'Upon Approval') {
    
    content_Update.append('updateContent', true); 
    content_Update.append('slugID',$('#btn_updateContent').val()); 
    content_Update.append('contentStage', $('#contentStage').val()); 
    // content author
    content_Update.append('articleAuthor',$('#articleAuthor').val());
   }
   
   else if (($("#currentRole").val() == 'Editor-in-Chief' || $("#currentRole").val() == 'Associate Editor') && $('#contentStage').val() == 'Published'){
      
      content_Update.append('updateContent', true); 
      content_Update.append('slugID',$('#btn_updateContent').val());
      content_Update.append('visual',$("#wysiwyg_leadVisualEdit").prop("files")[0]);
      content_Update.append('leadText',$('#wysiwyg_leadTextEdit').html() ); 
      content_Update.append('content',$('#wysiwyg_contentEdit').html() ); 
      content_Update.append('contentStage', $('#contentStage').val()); 

       // content author
      content_Update.append('articleAuthor',$('#articleAuthor').val());
   }

   else if(($("#currentRole").val() == 'Literary Editor' || $("#currentRole").val() == 'News and Current Affairs Editor' || 
            $("#currentRole").val() == 'Feature Editor') && ($('#contentStage').val() == 'Under Review' )){
              
    content_Update.append('updateContent', true); 
    content_Update.append('slugID',$('#btn_updateContent').val()); 
    content_Update.append('contentStage', $('#contentStage').val());       
    // content author
    content_Update.append('articleAuthor',$('#articleAuthor').val());
   } 

  else if(($("#currentRole").val() == 'Literary Editor' || $("#currentRole").val() == 'News and Current Affairs Editor' || 
          $("#currentRole").val() == 'Feature Editor') && ($('#contentStage').val() == 'Upon Approval' )){


            content_Update.append('updateContent', true); 
            content_Update.append('slugID',$('#btn_updateContent').val());
            content_Update.append('visual',$("#wysiwyg_leadVisualEdit").prop("files")[0]);
            content_Update.append('leadText',$('#wysiwyg_leadTextEdit').html() ); 
            content_Update.append('content',$('#wysiwyg_contentEdit').html() ); 
            content_Update.append('contentStage', $('#contentStage').val()); 
             // content author
            content_Update.append('articleAuthor',$('#articleAuthor').val());

  }  
   else{
       
    // draft buttons will appear here .  
      if($('#contentStage').val() == 'Under Review'){ 
        $stage = $('#contentStage').val() ; 
      }else if($('#contentStage').val() == 'Draft'){
        
        $stage = $('#contentStage').val() ; 
      }
    content_Update.append('updateContent', true); 
    content_Update.append('slugID',$('#btn_updateContent').val());
    content_Update.append('visual',$("#wysiwyg_leadVisualEdit").prop("files")[0]);
    content_Update.append('leadText',$('#wysiwyg_leadTextEdit').html() ); 
    content_Update.append('content',$('#wysiwyg_contentEdit').html() ); 
    content_Update.append('contentStage', $('#contentStage').val()); 
     // content author
     content_Update.append('articleAuthor',$('#articleAuthor').val());
   }
   
   $.ajax({
    url: "contentFunction.php",
    type: "POST",
    data: content_Update,
    processData: false, // important
    contentType: false, // important
    success: function (data) {
    //console.log(data);

        Swal.fire({
          // position:'top-end',
          icon: 'success',
          text:data, //message
          showConfirmButton: false,
          timer: 3000,
          position:'top-end', 
        }).then( function () { 
          window.location.href = '../contents/index.php'; 
            
    }); 
      
    },
  });

});

// ARCHIVE ARTICLES 
$(document).ready(function(){
$("#btn_archiveContent").click(function () { 
  
  var content_Archive = new FormData();

  content_Archive.append('archiveContent',true);
  content_Archive.append('slugID',$("#btn_archiveContent").val())


 Swal.fire({
        width:450,
		  	title: 'ARCHIVE THIS ARTICLE?',
		  	text: "This article will label as archived.",
		  	icon: 'warning',
        position: 'top-end', //position 
        // showCloseButton: true,
		  	confirmButtonColor: '#e67300',
		  	cancelButtonColor: '#b3b3b3',
		  	confirmButtonText: 'Confirm Delete',
        showCancelButton: true,
        focusConfirm: false,
		}).then((result) => {
		  	if (result.value){
          $.ajax({
            url: "contentFunction.php",
            type: "POST",
            data: content_Archive,
            processData: false, // important
            contentType: false, // important
          }).done(function(response){
            Swal.fire({
              // position: 'top-end',
              icon: 'success',
              text: response, //message
              showConfirmButton: false,
              timer: 3000,
              position:'top-end', 
              
            }).then( function () { 
             // window.location.href = '../articles/index.php'; 
         }); 
					
			    })
			    .fail(function(){
			      Swal.fire({
              // position: 'top-end',
              icon: 'info',
              text: 'Oops an error occur.', //message
              showConfirmButton: false,
              timer: 3000,
              position:'top-end', 
            }).then( function ()  {
             // window.location.href = '../articles/index.php'; 
         }); 
            
			    });
		  	}
 
		})
  
	});
})




// load comment every 1 seconds 
// $(document).ready(function(){
//   setInterval(function(){
//         $("#commentSection").load(window.location.href + " #commentSection" );
//   }, 1000);
//   });




function loadComment(){ 
  // load comment section 
  $("#commentSection").load(location.href + " #commentSection>*",""); 
  
  // load comment count 
  $("#commentCount").load(location.href + " #commentCount>*",""); 
}


// UPLOAD COMMENT 
$('#uploadComment').click(function (e) { 
 
  var comment_form = new FormData();


  if($('#commentArea').text() ==''){
    Swal.fire({
      position:'top-end',
      icon: 'warning',
      text:'Please provide a message.', //message
      showConfirmButton: false,
      timer: 3000,
    })
  }else {

    comment_form.append('commentButton', true);
    comment_form.append('slugID',$('#uploadComment').val()); 
    comment_form.append('message',$('#commentArea').text());
    comment_form.append('section',$('#addContent_section').val()); 
    comment_form.append('authorUsername',$('#articleAuthor').val());  


  $.ajax({
    url: "contentFunction.php",
    type: "POST",
    data:comment_form,
    processData: false, // important
    contentType: false, // important
    success: function (data) {
      //console.log(data); 

      Swal.fire({
        // position:'top-end',
        icon: 'success',
        text:data, //message
        showConfirmButton: false,
        timer: 3000,
        position:'top-end', 
      }).then( function () { 
        //reload the location
        //location.reload(); 
        loadComment();
          
   }); 
      
    },
  });

}
});  


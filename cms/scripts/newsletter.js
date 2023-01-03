
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
          url: "newsletterProcess.php",
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


$('#upload_pdfFile').on('submit', function(event){
  event.preventDefault();
  
      $.ajax({
          url:"newsletterProcess.php",
          method:"POST",
          data: new FormData(this),
          contentType:false,
          cache:false,
          processData:false,
          success:function(data)
          {  
              //alert(data); 
              // $('#image').val('');
              // load_images();
              Swal.fire({
                  icon: 'success',
                  text: data, //message
                  showConfirmButton: false,
                  timer: 3000,
                  position:'top-end', 
                }).then( function () { 
                      window.location.href = '../newsletter/index.php'; 
                 }); 

           
              
          }
      });

});

// $(document).ready(function () {
//   // HEB TABLE //
//   function activitiesTable() {
//     $.ajax({
//       url: "newsletterProcess.php",
//       method: "POST",
//       data: {
//         operation: "fetchNewsletterTable",
//       },
//       success: function (data) {
//         $("#table_newsletter").html("");
//         activitiesData = JSON.parse(data);

//         $(activitiesData).each(function (index, value) {
//           date = moment(value[0]).format("MMMM DD, yyyy");
//           time = moment(value[0]).format("hh:mm a");
          
//           var col_timestamp =
//             `
//             <td class="px-6 py-4 w-max whitespace-nowrap">
//                 <div class="flex items-center text-sm font-medium text-gray-900">` +
//             date +
//             `</div>
//                 <div class="text-sm text-gray-500">` +
//             time +
//             `</div>
//             </td>
//         `;

//         var col_title =
//             `
//         <td class="px-6 py-4 w-max whitespace-nowrap">
//               <div class="flex items-center text-sm font-medium text-gray-900">
//               ` +
//             value[5] +
//             `
//               </div>
//           </td>
//         `;

//           var col_staff =
//             `
//         <td class="px-6 py-4 w-max whitespace-nowrap">
//           <div class="flex items-center">
//             <div class="flex-shrink-0 w-10 h-10">
//               <img loading="lazy" class="w-10 h-10 rounded-full" src="./../../resources/uploads/editorial-board/` +
//             value[4] +
//             `" alt="">
//             </div>
//             <div class="ml-4">
//               <div class="text-sm font-medium text-gray-900">` +
//             value[2] +
//             `  </div>
//                 <div class="text-sm text-gray-500">` +
//             value[3] +
//             `</div>
//               </div>
//             </div>
//           </td>
//         `;

//           var col_btn =
//             `
//     <td class="px-6 py-4 text-sm font-medium text-right whitespace-normal" value="` +
//             value[1] +
//             `" aria-hidden="true">
//       <button id="btn_viewArticle">
//         <svg width="12" height="12" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
//             <path d="M13.6357 9.89746L13.627 1.07324C13.627 0.458008 13.2227 0.0361328 12.5898 0.0361328H3.75684C3.15918 0.0361328 2.74609 0.484375 2.74609 1.01172C2.74609 1.53027 3.19434 1.96094 3.73047 1.96094H6.88574L10.6123 1.83789L9.0127 3.24414L0.671875 11.5938C0.469727 11.8047 0.355469 12.0508 0.355469 12.2969C0.355469 12.8154 0.830078 13.3076 1.36621 13.3076C1.6123 13.3076 1.8584 13.2021 2.06934 13L10.4189 4.65039L11.8428 3.05078L11.6934 6.61914V9.92383C11.6934 10.4688 12.124 10.9258 12.6602 10.9258C13.1875 10.9258 13.6357 10.4775 13.6357 9.89746Z" fill="#1C1C1E" />
//         </svg>
//       </button>            
//     </td>
//     `;

//           $("#table_newsletter").append(
//             "<tr>" +
//               col_timestamp +
//               col_title +
//               col_staff +
//               col_btn +
//               "</tr>"
//           );
//         });
//       },
//     });
//   }

//   activitiesTable();
// });

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
        url: "activitiesProcess.php",
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

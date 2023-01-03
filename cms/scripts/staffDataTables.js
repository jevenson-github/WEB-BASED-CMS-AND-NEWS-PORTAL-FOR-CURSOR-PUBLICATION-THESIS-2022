$(document).ready(function () {
  // VARIABLES FOR DATA FILTER //
  var heb_keyword, heb_query, seh_keyword, seh_query, ms_keyword, ms_query;
  var acadYear = $("#select_academicYear").find(":selected").val();

  // FILTER BY ACADEMIC YEAR //
  $("#select_academicYear").on("change", function () {
    acadYear = this.value;
    concatHEB();
    concatSEH();
    concatMS();
  });

  // INITIALIZE DATATABLE FOR HIGHER EDITORIAL BOARD //
    var table_HEB = $("#table_HEB").DataTable({
    fnCreatedRow: function (nRow, aData, iDataIndex) {
      $(nRow).attr("id", aData[0]);
    },

    serverSide: "true",
    processing: "true",
    paging: "true",
    pageLength: 5,
    order: [],
    ajax: {
      url: "staffProcess.php",
      type: "POST",
      data: {
        operation: "fetchHEBtable",
        acadYear: acadYear,
      },
    },
    initComplete: function (settings, json) {
      $("#table_HEB_paginate").appendTo("#bar_heb"); //jQuery for moving elements around
    },
    oLanguage: {
      oPaginate: {
        sNext: "ᐳ",
        sPrevious: "ᐸ ",
      },
    },
    aoColumnDefs: [
      {
        bSortable: false,
        aTargets: [5],
      },
    ],
    // false sort per column
    columnDefs: [
      {
        targets: "_all",
        orderable: false,
      },
    ],

    lengthMenu: [10],
  });

  // FILTER BY KEYWORD FOR HIGHER EDITORIAL BOARD //
  $("#input_searchHEB").on("keyup", function () {
    heb_keyword = this.value;
    concatHEB();
  });

  // CONCATENATE RESULTS OR HIGHER EDITORIAL BOARD //
  function concatHEB() {
    if (acadYear == null) {
      $("#select_academicYear").find(":selected").val();
    }
    if (heb_keyword == null) {
      heb_keyword = " ";
    }

    heb_query = heb_keyword;
    table_HEB.search(heb_query).draw();
  }

  // INITIALIZE DATATABLE FOR SECTION EDITORS AND HEADS //
  var table_SEH = $("#table_SEH").DataTable({
    paging: true,
    pageLength: 5,
    initComplete: function (settings, json) {
      $("#table_SEH_paginate").appendTo("#bar_seh"); //jQuery for moving elements around
    },
    oLanguage: {
      oPaginate: {
        sNext: "ᐳ",
        sPrevious: "ᐸ ",
      },
    },
  });

  // FILTER BY KEYWORD FOR SECTION EDITORS AND HEADS //
  $("#input_searchSEH").on("keyup", function () {
    seh_keyword = this.value;
    concatSEH();
  });

  // CONCATENATE RESULTS FOR SECTION EDITORS AND HEADS //
  function concatSEH() {
    if (acadYear == null) {
      $("#select_academicYear").find(":selected").val();
    }
    if (seh_keyword == null) {
      seh_keyword = " ";
    }

    seh_query = seh_keyword;
    table_SEH.search(seh_query).draw();
  }

  // INITIALIZE DATATABLE FOR MEMBERS AND STAFFS //
  var table_MS = $("#table_MS").DataTable({
    paging: true,
    pageLength: 5,
    initComplete: function (settings, json) {
      $("#table_MS_paginate").appendTo("#bar_ms"); //jQuery for moving elements around
    },
    oLanguage: {
      oPaginate: {
        sNext: "ᐳ",
        sPrevious: "ᐸ ",
      },
    },
  });

  // FILTER BY KEYWORD FOR MEMBERS AND STAFFS //
  $("#input_searchMS").on("keyup", function () {
    ms_keyword = this.value;
    concatMS();
  });

  // CONCATENATE RESULTS FOR MEMBERS AND STAFFS //
  function concatMS() {
    if (acadYear == null) {
      $("#select_academicYear").find(":selected").val();
    }
    if (ms_keyword == null) {
      ms_keyword = " ";
    }

    ms_query = ms_keyword;
    table_MS.search(ms_query).draw();
  }

  concatHEB();
  concatSEH();
  concatMS();
});

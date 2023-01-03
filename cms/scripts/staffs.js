$(document).ready(function () {
  var acadYear = $("#select_academicYear").val();
  var HEBkeyword = "";
  var SEHkeyword = "";
  var MSkeyword = "";

  $("#select_academicYear").change(function (e) {
    acadYear = $("#select_academicYear").val();
    fetchHEBTable();
    fetchSEHTable();
    fetchMSTable();
  });

  $("#input_searchHEB").keyup(function (e) {
    HEBkeyword = $("#input_searchHEB").val();
    fetchHEBTable();
  });

  $("#input_searchSEH").keyup(function (e) {
    SEHkeyword = $("#input_searchSEH").val();
    fetchSEHTable();
  });

  $("#input_searchMS").keyup(function (e) {
    MSkeyword = $("#input_searchMS").val();
    fetchMSTable();
  });

  var HEBpageNum = 1;

  // HEB TABLE //
  function fetchHEBTable(currentPage) {
    $.ajax({
      url: "staffProcess.php",
      method: "POST",
      data: {
        operation: "fetchHEBTable",
        acadYear: acadYear,
        HEBkeyword: HEBkeyword,
        HEBpageNum: HEBpageNum,
      },
      success: function (data) {
        $("#table_HEB").html("");
        $("#HEB_pagination").html("");
        hebData = JSON.parse(data);

        $(hebData.Entries).each(function (index, value) {
          var col_staff =
            `
        <td class="px-6 py-4 w-max whitespace-nowrap">
          <div class="flex items-center">
            <div class="flex-shrink-0 w-10 h-10">
              <img loading="lazy" class="w-10 h-10 rounded-full" src="./../../resources/uploads/editorial-board/` +
            value[0] +
            `" alt="">
            </div>
            <div class="ml-4">
              <div class="text-sm font-medium text-gray-900">` +
            value[1] +
            `  </div>
                <div class="text-sm text-gray-500">@` +
            value[2] +
            `</div>
              </div>
            </div>
          </td>
        `;

          var col_position =
            `
          <td class="px-6 py-4 w-max whitespace-nowrap">
              <div class="flex items-center text-sm font-medium text-gray-900">
              ` +
            value[3] +
            `
              </div>
          </td>
        `;

          var col_status;

          switch (value[4]) {
            case "Active":
              col_status = `
              <td class="px-6 py-4 w-max whitespace-nowrap">
                <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-green-900 bg-green-100">
                  Active
                </div>
              </td>
              `;
              break;

            case "Inactive":
              col_status = `
            <td class="px-6 py-4 w-max whitespace-nowrap">
              <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-red-900 bg-red-100">
                Inactive
              </div>
            </td>
              `;
              break;

            case "Pending":
              col_status = `
            <td class="px-6 py-4 w-max whitespace-nowrap">
              <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-yellow-900 bg-yellow-100">
                Pending
              </div>
            </td>
              `;
              break;
          }

          var col_acadYear =
            `
          <td class="px-6 py-4 w-max whitespace-nowrap hidden">
              <div class="flex items-center text-sm font-medium text-gray-900">
              ` +
            value[5] +
            `
              </div>
          </td>
        `;

          var col_btn =
            `
        <td class="px-6 py-4 text-sm font-medium text-right whitespace-normal" value="` +
            value[6] +
            `" aria-hidden="true">
          <button id="btn_viewArticle">
            <svg width="12" height="12" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.6357 9.89746L13.627 1.07324C13.627 0.458008 13.2227 0.0361328 12.5898 0.0361328H3.75684C3.15918 0.0361328 2.74609 0.484375 2.74609 1.01172C2.74609 1.53027 3.19434 1.96094 3.73047 1.96094H6.88574L10.6123 1.83789L9.0127 3.24414L0.671875 11.5938C0.469727 11.8047 0.355469 12.0508 0.355469 12.2969C0.355469 12.8154 0.830078 13.3076 1.36621 13.3076C1.6123 13.3076 1.8584 13.2021 2.06934 13L10.4189 4.65039L11.8428 3.05078L11.6934 6.61914V9.92383C11.6934 10.4688 12.124 10.9258 12.6602 10.9258C13.1875 10.9258 13.6357 10.4775 13.6357 9.89746Z" fill="#1C1C1E" />
            </svg>
          </button>            
        </td>
        `;

          $("#table_HEB").append(
            "<tr>" +
              col_staff +
              col_position +
              col_status +
              col_acadYear +
              col_btn +
              "</tr>"
          );
        });

        $("#HEB_pagination").append(`
          
          <button id="HEB_paginationPrevious" class="relative inline-flex items-center rounded-l-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-600 focus:z-10 focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500 peer-checked:z-50 peer-checked:border-amber-600 peer-checked:bg-amber-100 peer-checked:text-amber-600">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
            <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
          </svg>
        </button>
        `);

        $(JSON.parse(hebData.Pagination)).each(function (index, value) {
          var page = "";
          if (value == HEBpageNum)
            page =
              `
          <button class="HEBpage relative -ml-px inline-flex items-center border px-4 py-2 text-sm font-medium hover:bg-gray-50 hover:text-gray-600 border-amber-600 bg-amber-100 text-amber-600">` +
              value +
              `</label>
          `;
          else
            page =
              `
          <button class="HEBpage relative -ml-px inline-flex items-center border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-600 peer-checked:border-amber-600 peer-checked:bg-amber-100 peer-checked:text-amber-600">` +
              value +
              `</label>
          `;

          var next = `
          <button id="HEB_paginationNext" class="relative -ml-px inline-flex items-center rounded-r-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-600 focus:z-10 focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500 peer-checked:z-50 peer-checked:border-amber-600 peer-checked:bg-amber-100 peer-checked:text-amber-600">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
            <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
          </svg>
        </button>
          `;

          $("#HEB_pagination").append(page);
        });

        $("#HEB_pagination").append(`
          
          <button id="HEB_paginationNext" class="relative -ml-px inline-flex items-center rounded-r-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 hover:text-gray-600 focus:z-10 focus:border-amber-500 focus:outline-none focus:ring-1 focus:ring-amber-500 peer-checked:z-50 peer-checked:border-amber-600 peer-checked:bg-amber-100 peer-checked:text-amber-600">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="h-5 w-5">
          <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
        </svg>
      </button>
        `);
      },
    });
  }

  $("body").on("click", ".HEBpage", (e) => {
    HEBpageNum = $(e.currentTarget).html();
    fetchHEBTable(HEBpageNum);
  });

  $("body").on("click", "#HEB_paginationPrevious", (e) => {
    if (HEBpageNum > 1) HEBpageNum--;
    fetchHEBTable(HEBpageNum);
  });

  $("body").on("click", "#HEB_paginationNext", (e) => {
    var maximumPage = 0;
    $(".HEBpage").each((i, v) => {
      if (parseInt($(v).html()) > maximumPage)
        maximumPage = parseInt($(v).html());
    });
    console.log(maximumPage);
    if (HEBpageNum == maximumPage) return null;
    HEBpageNum++;
    fetchHEBTable(HEBpageNum);
  });

  fetchHEBTable(HEBpageNum);

  // SEH TABLE //
  function fetchSEHTable() {
    $.ajax({
      url: "staffProcess.php",
      method: "POST",
      data: {
        operation: "fetchSEHTable",
        acadYear: acadYear,
        SEHkeyword: SEHkeyword,
      },
      success: function (data) {
        hebData = JSON.parse(data);

        $(hebData).each(function (index, value) {
          var col_staff =
            `
          <td class="px-6 py-4 w-max whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex-shrink-0 w-10 h-10">
                <img loading="lazy" class="w-10 h-10 rounded-full" src="./../../resources/uploads/editorial-board/` +
            value[0] +
            `" alt="">
              </div>
              <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">` +
            value[1] +
            `  </div>
                  <div class="text-sm text-gray-500">@` +
            value[2] +
            `</div>
                </div>
              </div>
            </td>
          `;

          var col_position =
            `
            <td class="px-6 py-4 w-max whitespace-nowrap">
                <div class="flex items-center text-sm font-medium text-gray-900">
                ` +
            value[3] +
            `
                </div>
            </td>
          `;

          var col_status;

          switch (value[4]) {
            case "Active":
              col_status = `
                <td class="px-6 py-4 w-max whitespace-nowrap">
                  <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-green-900 bg-green-100">
                    Active
                  </div>
                </td>
                `;
              break;

            case "Inactive":
              col_status = `
              <td class="px-6 py-4 w-max whitespace-nowrap">
                <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-red-900 bg-red-100">
                  Inactive
                </div>
              </td>
                `;
              break;

            case "Pending":
              col_status = `
              <td class="px-6 py-4 w-max whitespace-nowrap">
                <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-yellow-900 bg-yellow-100">
                  Pending
                </div>
              </td>
                `;
              break;
          }

          var col_acadYear =
            `
            <td class="px-6 py-4 w-max whitespace-nowrap hidden">
                <div class="flex items-center text-sm font-medium text-gray-900">
                ` +
            value[5] +
            `
                </div>
            </td>
          `;

          var col_btn =
            `
          <td class="px-6 py-4 text-sm font-medium text-right whitespace-normal" value="` +
            value[6] +
            `" aria-hidden="true">
            <button id="btn_viewArticle">
              <svg width="12" height="12" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.6357 9.89746L13.627 1.07324C13.627 0.458008 13.2227 0.0361328 12.5898 0.0361328H3.75684C3.15918 0.0361328 2.74609 0.484375 2.74609 1.01172C2.74609 1.53027 3.19434 1.96094 3.73047 1.96094H6.88574L10.6123 1.83789L9.0127 3.24414L0.671875 11.5938C0.469727 11.8047 0.355469 12.0508 0.355469 12.2969C0.355469 12.8154 0.830078 13.3076 1.36621 13.3076C1.6123 13.3076 1.8584 13.2021 2.06934 13L10.4189 4.65039L11.8428 3.05078L11.6934 6.61914V9.92383C11.6934 10.4688 12.124 10.9258 12.6602 10.9258C13.1875 10.9258 13.6357 10.4775 13.6357 9.89746Z" fill="#1C1C1E" />
              </svg>
            </button>            
          </td>
          `;

          $("#table_SEH").append(
            "<tr>" +
              col_staff +
              col_position +
              col_status +
              col_acadYear +
              col_btn +
              "</tr>"
          );
        });
      },
    });
  }

  fetchSEHTable();

  // MS TABLE //
  function fetchMSTable() {
    $.ajax({
      url: "staffProcess.php",
      method: "POST",
      data: {
        operation: "fetchMSTable",
        acadYear: acadYear,
        MSkeyword: MSkeyword,
      },
      success: function (data) {
        hebData = JSON.parse(data);

        $(hebData).each(function (index, value) {
          var col_staff =
            `
          <td class="px-6 py-4 w-max whitespace-nowrap">
            <div class="flex items-center">
              <div class="flex-shrink-0 w-10 h-10">
                <img loading="lazy" class="w-10 h-10 rounded-full" src="./../../resources/uploads/editorial-board/` +
            value[0] +
            `" alt="">
              </div>
              <div class="ml-4">
                <div class="text-sm font-medium text-gray-900">` +
            value[1] +
            `  </div>
                  <div class="text-sm text-gray-500">@` +
            value[2] +
            `</div>
                </div>
              </div>
            </td>
          `;

          var col_position =
            `
            <td class="px-6 py-4 w-max whitespace-nowrap">
                <div class="flex items-center text-sm font-medium text-gray-900">
                ` +
            value[3] +
            `
                </div>
            </td>
          `;

          var col_status;

          switch (value[4]) {
            case "Active":
              col_status = `
                <td class="px-6 py-4 w-max whitespace-nowrap">
                  <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-green-900 bg-green-100">
                    Active
                  </div>
                </td>
                `;
              break;

            case "Inactive":
              col_status = `
              <td class="px-6 py-4 w-max whitespace-nowrap">
                <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-red-900 bg-red-100">
                  Inactive
                </div>
              </td>
                `;
              break;

            case "Pending":
              col_status = `
              <td class="px-6 py-4 w-max whitespace-nowrap">
                <div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium text-yellow-900 bg-yellow-100">
                  Pending
                </div>
              </td>
                `;
              break;
          }

          var col_acadYear =
            `
            <td class="px-6 py-4 w-max whitespace-nowrap hidden">
                <div class="flex items-center text-sm font-medium text-gray-900">
                ` +
            value[5] +
            `
                </div>
            </td>
          `;

          var col_btn =
            `
          <td class="px-6 py-4 text-sm font-medium text-right whitespace-normal" value="` +
            value[6] +
            `" aria-hidden="true">
            <button id="btn_viewArticle">
              <svg width="12" height="12" viewBox="0 0 14 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.6357 9.89746L13.627 1.07324C13.627 0.458008 13.2227 0.0361328 12.5898 0.0361328H3.75684C3.15918 0.0361328 2.74609 0.484375 2.74609 1.01172C2.74609 1.53027 3.19434 1.96094 3.73047 1.96094H6.88574L10.6123 1.83789L9.0127 3.24414L0.671875 11.5938C0.469727 11.8047 0.355469 12.0508 0.355469 12.2969C0.355469 12.8154 0.830078 13.3076 1.36621 13.3076C1.6123 13.3076 1.8584 13.2021 2.06934 13L10.4189 4.65039L11.8428 3.05078L11.6934 6.61914V9.92383C11.6934 10.4688 12.124 10.9258 12.6602 10.9258C13.1875 10.9258 13.6357 10.4775 13.6357 9.89746Z" fill="#1C1C1E" />
              </svg>
            </button>            
          </td>
          `;

          $("#table_MS").append(
            "<tr>" +
              col_staff +
              col_position +
              col_status +
              col_acadYear +
              col_btn +
              "</tr>"
          );
        });
      },
    });
  }

  fetchMSTable();
});

// ADD STAFF //

var addStaff_fName,
  addStaff_mName,
  addStaff_lName,
  addStaff_email,
  addStaff_role,
  addStaff_position,
  addStaff_generatedPassword;

$("#btn_staffs_invitePerson").on("click", function () {
  $("#modal_staffs_invitePerson").removeClass("hidden");
});

$("input[name=addStaff_role]").on("change", function () {
  addStaff_role = $("input[name=addStaff_role]:checked").val();
  switch (addStaff_role) {
    case "Higher Editorial Board":
      $("#addStaff_selectPositionHEB").removeClass("hidden");
      $("#addStaff_selectPositionSEH").addClass("hidden");
      $("#addStaff_selectPositionMS").addClass("hidden");
      break;
    case "Section Editors and Heads":
      $("#addStaff_selectPositionHEB").addClass("hidden");
      $("#addStaff_selectPositionSEH").removeClass("hidden");
      $("#addStaff_selectPositionMS").addClass("hidden");
      break;
    case "Members and Staff":
      $("#addStaff_selectPositionHEB").addClass("hidden");
      $("#addStaff_selectPositionSEH").addClass("hidden");
      $("#addStaff_selectPositionMS").removeClass("hidden");
      break;
  }
});

$("#btn_addStaff_invite").on("click", function () {
  addStaff_fName = $("#addStaff_fName").val();
  addStaff_mName = $("#addStaff_mName").val();
  addStaff_lName = $("#addStaff_lName").val();
  addStaff_email = $("#addStaff_email").val();
  addStaff_positionHEB = $("#addStaff_positionHEB").find(":selected").val();
  addStaff_positionSEH = $("#addStaff_positionSEH").find(":selected").val();
  addStaff_positionMS = $("#addStaff_positionMS").find(":selected").val();

  if (
    addStaff_fName == "" ||
    addStaff_lName == "" ||
    addStaff_email == "" ||
    addStaff_role == "" ||
    (addStaff_positionHEB == "Select a position for Higher Editorial Board" &&
      addStaff_positionSEH ==
        "Select a position for Section Editors and Heads" &&
      addStaff_positionMS == "Select a position for Members and Staff")
  ) {
    if (addStaff_fName == "" || addStaff_lName == "") {
      $("#helper_addStaff_name").removeClass("text-gray-500");
      $("#helper_addStaff_name").addClass("text-red-500");
      if (addStaff_fName == "") {
        $("#helper_addStaff_name").text("The first name must be filled in. ");
      } else if (addStaff_lName == "") {
        $("#helper_addStaff_name").text("The last name must be filled in. ");
      } else {
        $("#helper_addStaff_name").text(
          "The first and last names must be filled in. "
        );
      }
    }
    if (
      addStaff_email == "" ||
      /@bulsu\.edu\.ph$/.test($.trim(addStaff_email)) == false
    ) {
      $("#helper_addStaff_email").removeClass("text-gray-500");
      $("#helper_addStaff_email").addClass("text-red-500");
      if (addStaff_email == "") {
        $("#helper_addStaff_email").text("Email must be filled in. ");
      } else if (/@bulsu\.edu\.ph$/.test($.trim(addStaff_email)) == false) {
        $("#helper_addStaff_email").removeClass("text-gray-500");
        $("#helper_addStaff_email").addClass("text-red-500");
        $("#helper_addStaff_email").text(
          "Your email domain is not provided by your institution. "
        );
      }
    }
    if (addStaff_role == null) {
      $("#helper_addStaff_role").removeClass("text-gray-500");
      $("#helper_addStaff_role").addClass("text-red-500");
      $("#helper_addStaff_role").text("User role must be selected. ");
    }
    if (
      addStaff_positionHEB == "Select a position for Higher Editorial Board" &&
      addStaff_positionSEH ==
        "Select a position for Section Editors and Heads" &&
      addStaff_positionMS == "Select a position for Members and Staff"
    ) {
      $("#helper_addStaff_positionHEB").removeClass("text-gray-500");
      $("#helper_addStaff_positionHEB").addClass("text-red-500");
      $("#helper_addStaff_positionHEB").text(
        "User position must be selected. "
      );
      $("#helper_addStaff_positionSEH").removeClass("text-gray-500");
      $("#helper_addStaff_positionSEH").addClass("text-red-500");
      $("#helper_addStaff_positionSEH").text(
        "User position must be selected. "
      );
      $("#helper_addStaff_positionMS").removeClass("text-gray-500");
      $("#helper_addStaff_positionMS").addClass("text-red-500");
      $("#helper_addStaff_positionMS").text("User position must be selected. ");
    }
  } 
  else 
  {
    if (addStaff_role == "Higher Editorial Board") {
      addStaff_position = addStaff_positionHEB;
    } else if (addStaff_role == "Section Editors and Heads") {
      addStaff_position = addStaff_positionSEH;
    } else if (addStaff_role == "Members and Staff") {
      addStaff_position = addStaff_positionMS;
    }

    generatePassword();

    $.ajax({
      type: "POST",
      url: "staffProcess.php",
      data: {
        operation: "addStaff",
        fName: addStaff_fName,
        lName: addStaff_lName,
        email: addStaff_email,
        password: addStaff_generatedPassword,
        role: addStaff_role,
        position: addStaff_position,
      },
    });

    

  }
});

$("#btn_addStaff_cancel").on("click", function () {
  $("#modal_staffs_invitePerson").toggleClass("hidden");
});

$("#addStaff_fName").focus(function () {
  $("#helper_addStaff_name").removeClass("text-red-500");
  $("#helper_addStaff_name").addClass("text-gray-500");
  $("#helper_addStaff_name").text("First and last names are required.");
});

$("#addStaff_lName").focus(function () {
  $("#helper_addStaff_name").removeClass("text-red-500");
  $("#helper_addStaff_name").addClass("text-gray-500");
  $("#helper_addStaff_name").text("First and last names are required.");
});

$("#addStaff_email").focus(function () {
  $("#helper_addStaff_email").removeClass("text-red-500");
  $("#helper_addStaff_email").addClass("text-gray-500");
  $("#helper_addStaff_email").text(
    "An institutional email address is required."
  );
});

$("#addStaff_role").focus(function () {
  $("#helper_addStaff_role").removeClass("text-red-500");
  $("#helper_addStaff_role").addClass("text-gray-500");
  $("#helper_addStaff_role").text("Required");
  $("#helper_addStaff_positionHEB").removeClass("text-red-500");
  $("#helper_addStaff_positionHEB").addClass("text-gray-500");
  $("#helper_addStaff_positionHEB").text("Required");
  $("#helper_addStaff_positionSEH").removeClass("text-red-500");
  $("#helper_addStaff_positionSEH").addClass("text-gray-500");
  $("#helper_addStaff_positionSEH").text("Required");
  $("#helper_addStaff_positionMS").removeClass("text-red-500");
  $("#helper_addStaff_positionMS").addClass("text-gray-500");
  $("#helper_addStaff_positionMS").text("Required");
});

$("#addStaff_positionHEB").focus(function () {
  $("#helper_addStaff_positionHEB").removeClass("text-red-500");
  $("#helper_addStaff_positionHEB").addClass("text-gray-500");
  $("#helper_addStaff_positionHEB").text("Required");
});

$("#addStaff_positionSEH").focus(function () {
  $("#helper_addStaff_positionSEH").removeClass("text-red-500");
  $("#helper_addStaff_positionSEH").addClass("text-gray-500");
  $("#helper_addStaff_positionSEH").text("Required");
});

$("#addStaff_positionMS").focus(function () {
  $("#helper_addStaff_positionMS").removeClass("text-red-500");
  $("#helper_addStaff_positionMS").addClass("text-gray-500");
  $("#helper_addStaff_positionMS").text("Required");
});

function generatePassword() {
  addStaff_generatedPassword = Math.random().toString(36).slice(2, 10);
}

$("#btn_staffs_generateReport").on("click", function () {
  $.ajax({
    type: "POST",
    url: "staffProcess.php",
    data: {
      operation: "printReport",
    },
    success: function (data) {
      alert(data);
    },
  });
});

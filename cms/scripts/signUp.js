let step1 = document.getElementById("step1");
let step2 = document.getElementById("step2");
let step3 = document.getElementById("step3");

$(document).ready(function () {
  $("#btn_Next1").click(function () {
    var signUp_firstName = $("#signUp_firstName").val();
    var signUp_lastName = $("#signUp_lastName").val();
    if (signUp_firstName == "" && signUp_lastName == "") {
      $("#signUp_firstNameError").text("First name cannot be blank");
      $("#signUp_lastNameError").text("Last name cannot be blank");
    } else if (signUp_lastName == "") {
      $("#signUp_lastNameError").text("Last name cannot be blank");
    } else if (signUp_firstName == "") {
      $("#signUp_firstNameError").text("First name cannot be blank");
    } else if (signUp_firstName != "" || signUp_lastName != "") {
      $("#signUp_greet").text("Hi! " + signUp_firstName);
      step1.classList.add("hidden");
      step2.classList.remove("hidden");
    }
  });

  $("input").focus(function () {
    $("input").removeClass();
    $("input").addClass(
      "bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5"
    );
  });

  var signUp_username = $("#signUp_username").val();
  var signUp_password = $("#signUp_password").val();
  var signUp_confirmPassword = $("#signUp_confirmPassword").val();

  var signUp_usernameCheck;
  var signUp_passwordCheck;

  $("#signUp_username").keyup(function () {
    signUp_username = $("#signUp_username").val();

    function containsSpecialChars(signUp_username) {
      const specialCharsforUsername = /[ `!@#$%^&*()+\=\[\]{};':"\\|,<>\/?~]/;
      return specialCharsforUsername.test(signUp_username);
    }

    if (containsSpecialChars(signUp_username) == true) {
      $("#signUp_usernameError").text(
        "Username only allows special characters such as dashes (-), underscores (_), and period (.)."
      );
      $("#signUp_usernameError").removeClass();
      $("#signUp_usernameError").addClass("mt-2 text-xs text-red-600");
      $("#signUp_usernameErrorSVG").removeClass("hidden");
      $("#signUp_usernameSuccessSVG").addClass("hidden");
      $("#signUp_username").removeClass();
      $("#signUp_username").addClass(
        "block w-full pr-10 text-red-900 border-red-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm p-2.5"
      );
      signUp_usernameCheck = "invalid";
    } else if ((signUp_username.length = 0)) {
      $("#signUp_usernameError").text("Username cannot be blank.");
      $("#signUp_usernameError").removeClass();
      $("#signUp_usernameError").addClass("mt-2 text-xs text-red-600");
      $("#signUp_usernameErrorSVG").removeClass("hidden");
      $("#signUp_usernameSuccessSVG").addClass("hidden");
      $("#signUp_username").removeClass();
      $("#signUp_username").addClass(
        "block w-full pr-10 text-red-900 border-red-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm p-2.5"
      );
      signUp_usernameCheck = "invalid";
    } else if (signUp_username.length <= 1 || signUp_username.length >= 31) {
      $("#signUp_usernameError").text(
        "The username must be 2 to 30 characters long."
      );
      $("#signUp_usernameError").removeClass();
      $("#signUp_usernameError").addClass("mt-2 text-xs text-red-600");
      $("#signUp_usernameErrorSVG").removeClass("hidden");
      $("#signUp_usernameSuccessSVG").addClass("hidden");
      $("#signUp_username").removeClass();
      $("#signUp_username").addClass(
        "block w-full pr-10 text-red-900 border-red-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm p-2.5"
      );
      signUp_usernameCheck = "invalid";
    } else if (signUp_username.length >= 2 || signUp_username.length <= 30) {
      $.ajax({
        type: "POST",
        url: "checkUsername.php",
        data: {
          signUp_username: signUp_username,
        },
        success: function (result) {
          checkUsername = JSON.parse(result);
          if (checkUsername == "available") {
            $("#signUp_usernameError").text("Username is available.");
            $("#signUp_usernameError").removeClass();
            $("#signUp_usernameError").addClass("mt-2 text-xs text-green-600");
            $("#signUp_usernameErrorSVG").addClass("hidden");
            $("#signUp_usernameSuccessSVG").removeClass("hidden");
            $("#signUp_username").removeClass();
            $("#signUp_username").addClass(
              "block w-full pr-10 text-green-900 border-green-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm p-2.5"
            );
            signUp_usernameCheck = "valid";
          } else if (checkUsername == "unavailable") {
            $("#signUp_usernameError").text("Username already exists.");
            $("#signUp_usernameError").removeClass();
            $("#signUp_usernameError").addClass("mt-2 text-xs text-red-600");
            $("#signUp_usernameErrorSVG").removeClass("hidden");
            $("#signUp_usernameSuccessSVG").addClass("hidden");
            $("#signUp_username").removeClass();
            $("#signUp_username").addClass(
              "block w-full pr-10 text-red-900 border-red-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm p-2.5"
            );
            signUp_usernameCheck = "invalid";
          }
        },
      });
    }
  });

  $("#signUp_password").keyup(function () {
    signUp_password = $("#signUp_password").val();

    function containsSpecialChars(signUp_password) {
      const specialCharsforPassword = /[ ]/;
      return specialCharsforPassword.test(signUp_password);
    }

    if (containsSpecialChars(signUp_password) == true) {
      $("#signUp_passwordError").text("Password does not allow whitespaces.");
      $("#signUp_passwordError").removeClass();
      $("#signUp_passwordError").addClass("mt-2 text-xs text-red-600");
      $("#signUp_passwordErrorSVG").removeClass("hidden");
      $("#signUp_passwordSuccessSVG").addClass("hidden");
      $("#signUp_password").removeClass();
      $("#signUp_password").addClass(
        "block w-full pr-10 text-red-900 border-red-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm p-2.5"
      );
    } else if ((signUp_password.length = 0)) {
      $("#signUp_passwordError").text("Password cannot be blank.");
      $("#signUp_passwordError").removeClass();
      $("#signUp_passwordError").addClass("mt-2 text-xs text-red-600");
      $("#signUp_passwordErrorSVG").removeClass("hidden");
      $("#signUp_passwordSuccessSVG").addClass("hidden");
      $("#signUp_password").removeClass();
      $("#signUp_password").addClass(
        "block w-full pr-10 text-red-900 border-red-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm p-2.5"
      );
    } else if (signUp_password.length < 8) {
      $("#signUp_passwordError").text(
        "Password must be 8 characters or longer."
      );
      $("#signUp_passwordError").removeClass();
      $("#signUp_passwordError").addClass("mt-2 text-xs text-red-600");
      $("#signUp_passwordErrorSVG").removeClass("hidden");
      $("#signUp_passwordSuccessSVG").addClass("hidden");
      $("#signUp_password").removeClass();
      $("#signUp_password").addClass(
        "block w-full pr-10 text-red-900 border-red-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm p-2.5"
      );
    } else if (signUp_password.length >= 8) {
      $("#signUp_passwordError").text("Password is valid.");
      $("#signUp_passwordError").removeClass();
      $("#signUp_passwordError").addClass("mt-2 text-xs text-green-600");
      $("#signUp_passwordErrorSVG").addClass("hidden");
      $("#signUp_passwordSuccessSVG").removeClass("hidden");
      $("#signUp_password").removeClass();
      $("#signUp_password").addClass(
        "block w-full pr-10 text-green-900 border-green-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-green-500 sm:text-sm p-2.5"
      );
    }
  });

  $("#signUp_confirmPassword").keyup(function () {
    signUp_confirmPassword = $("#signUp_confirmPassword").val();

    function containsSpecialChars(signUp_confirmPassword) {
      const specialCharsforPassword = /[ ]/;
      return specialCharsforPassword.test(signUp_confirmPassword);
    }

    if (containsSpecialChars(signUp_confirmPassword) == true) {
      $("#signUp_confirmPasswordError").text("Password does not allow whitespaces.");
      $("#signUp_confirmPasswordError").removeClass();
      $("#signUp_confirmPasswordError").addClass("mt-2 text-xs text-red-600");
      $("#signUp_confirmPasswordErrorSVG").removeClass("hidden");
      $("#signUp_confirmPasswordSuccessSVG").addClass("hidden");
      $("#signUp_confirmPassword").removeClass();
      $("#signUp_confirmPassword").addClass(
        "block w-full pr-10 text-red-900 border-red-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm p-2.5"
      );
    } else if ((signUp_confirmPassword.length = 0)) {
      $("#signUp_confirmPasswordError").text("Password cannot be blank.");
      $("#signUp_confirmPasswordError").removeClass();
      $("#signUp_confirmPasswordError").addClass("mt-2 text-xs text-red-600");
      $("#signUp_confirmPasswordErrorSVG").removeClass("hidden");
      $("#signUp_confirmPasswordSuccessSVG").addClass("hidden");
      $("#signUp_confirmPassword").removeClass();
      $("#signUp_confirmPassword").addClass(
        "block w-full pr-10 text-red-900 border-red-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm p-2.5"
      );
    } else if (signUp_confirmPassword.length < 8) {
      $("#signUp_confirmPasswordError").text(
        "Password must be 8 characters or longer."
      );
      $("#signUp_confirmPasswordError").removeClass();
      $("#signUp_confirmPasswordError").addClass("mt-2 text-xs text-red-600");
      $("#signUp_confirmPasswordErrorSVG").removeClass("hidden");
      $("#signUp_confirmPasswordSuccessSVG").addClass("hidden");
      $("#signUp_confirmPassword").removeClass();
      $("#signUp_confirmPassword").addClass(
        "block w-full pr-10 text-red-900 border-red-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm p-2.5"
      );
    } else if (signUp_confirmPassword.length >= 8) {
      $("#signUp_confirmPasswordError").text("Password is valid.");
      $("#signUp_confirmPasswordError").removeClass();
      $("#signUp_confirmPasswordError").addClass("mt-2 text-xs text-green-600");
      $("#signUp_confirmPasswordErrorSVG").addClass("hidden");
      $("#signUp_confirmPasswordSuccessSVG").removeClass("hidden");
      $("#signUp_confirmPassword").removeClass();
      $("#signUp_confirmPassword").addClass(
        "block w-full pr-10 text-green-900 border-green-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-green-500 sm:text-sm p-2.5"
      );
    }
  });

  setInterval(function() {
    if (
        signUp_password.length >= 8 &&
        signUp_confirmPassword.length >= 8 &&
        signUp_password != signUp_confirmPassword
      ) {
        $("#signUp_passwordError").text("Passwords do not match.");
        $("#signUp_confirmPasswordError").text("Passwords do not match.");
        $("#signUp_passwordError").removeClass();
        $("#signUp_confirmPasswordError").removeClass();
        $("#signUp_passwordError").addClass("mt-2 text-xs text-red-600");
        $("#signUp_confirmPasswordError").addClass("mt-2 text-xs text-red-600");
        $("#signUp_passwordErrorSVG").removeClass("hidden");
        $("#signUp_confirmPasswordErrorSVG").removeClass("hidden");
        $("#signUp_passwordSuccessSVG").addClass("hidden");
        $("#signUp_confirmPasswordSuccessSVG").addClass("hidden");
        $("#signUp_password").removeClass();
        $("#signUp_confirmPassword").removeClass();
        $("#signUp_password").addClass(
          "block w-full pr-10 text-red-900 border-red-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm p-2.5"
        );
        $("#signUp_confirmPassword").addClass(
          "block w-full pr-10 text-red-900 border-red-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm p-2.5"
        );
        signUp_passwordCheck = "invalid";
      } else if (
        signUp_password.length >= 8 &&
        signUp_confirmPassword.length >= 8 &&
        signUp_password == signUp_confirmPassword
      ) {
        $("#signUp_passwordError").text("Passwords matched.");
        $("#signUp_confirmPasswordError").text("Passwords matched.");
        $("#signUp_passwordError").removeClass();
        $("#signUp_confirmPasswordError").removeClass();
        $("#signUp_passwordError").addClass("mt-2 text-xs text-green-600");
        $("#signUp_confirmPasswordError").addClass("mt-2 text-xs text-green-600");
        $("#signUp_passwordErrorSVG").addClass("hidden");
        $("#signUp_confirmPasswordErrorSVG").addClass("hidden");
        $("#signUp_passwordSuccessSVG").removeClass("hidden");
        $("#signUp_confirmPasswordSuccessSVG").removeClass("hidden");
        $("#signUp_password").removeClass();
        $("#signUp_confirmPassword").removeClass();
        $("#signUp_password").addClass(
          "block w-full pr-10 text-green-900 border-green-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm p-2.5"
        );
        $("#signUp_confirmPassword").addClass(
          "block w-full pr-10 text-green-900 border-green-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500 sm:text-sm p-2.5"
        );
        signUp_passwordCheck = "valid";
      }
}, 1000);

  

  $("#btn_Next2").click(function () {
    if (signUp_usernameCheck == "valid" && signUp_passwordCheck == "valid"){
        step2.classList.add("hidden");
        step3.classList.remove("hidden");
    }     
    else {

    }      
  });

  $("#lnk_goBack1").click(function () {
    step1.classList.remove("hidden");
    step2.classList.add("hidden");
  });

});

/*
block w-full pr-10 text-red-900 border-red-300 rounded-md focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm p-2.5

*/

<?php

include './dbconnect.php';
require './session.php';

checkSession();
?>

<html lang="en" class="h-full bg-gray-50">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="CURSOR CMS Sign Up page">
  <link rel="stylesheet" href="../styles/tailwind.css">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="icon" href="../resources/favicon.svg">
  <title>Sign Up - CURSOR CMS</title>
</head>

<body class="h-full bg-[url('../resources/bg/bg_authLight.jpg')] bg-cover bg-center antialiased">
  <div class="flex flex-col justify-center min-h-full py-12 sm:px-6 lg:px-8">

    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="py-12 bg-white shadow bg-opacity-90 backdrop-blur-xl px-7 sm:rounded-lg sm:px-10">

        <div id="step1" class="block">
          <img class="w-auto h-20 mx-auto" src="../resources/icon/icon_setupSmile.svg">
          <h2 class="mt-4 text-3xl font-bold text-center text-gray-900">First things first...</h2>
          <p class="mt-2 text-sm text-center text-gray-600">
            Kindly enter your name so that we can recognize you.
          </p>
          <div id="signUp_step1" class="mt-8 space-y-6">
            <div>
              <label for="signUp_firstName" class="block mb-2 text-sm font-medium text-gray-700">First Name</label>
              <input id="signUp_firstName" name="signUp_firstName" type="text" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500  block w-full p-2.5" required>
              <p class="mt-2 text-xs text-red-600" id="signUp_firstNameError"></p>
            </div>
            <div>
              <div class="flex justify-between">
                <label for="signUp_middleName" class="block mb-2 text-sm font-medium text-gray-700">Middle Initial</label>
                <span class="text-xs text-gray-500" id="email-optional">Optional</span>
              </div>
              <input id="signUp_middleName" name="signUp_middleName" type="text" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500  block w-full p-2.5">
            </div>
            <div>
              <label for="signUp_lastName" class="block mb-2 text-sm font-medium text-gray-700">Last Name</label>
              <input id="signUp_lastName" name="signUp_lastName" type="text" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500  block w-full p-2.5">
              <p class="mt-2 text-xs text-red-600" id="signUp_lastNameError"></p>
            </div>
            <button id="btn_Next1" class="w-full flex justify-center mt-8 py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500"> Next </button>
          </div>
        </div>

        <div id="step2" class="hidden">
          <img class="w-auto h-20 mx-auto" src="../resources/icon/icon_setupCredentials.svg">
          <h2 id="signUp_greet" class="mt-4 text-3xl font-bold text-center text-gray-900">Hi! First Name</h2>
          <p class="mt-2 text-sm text-center text-gray-600">
            Let's set up your account credentials.
          </p>
          <div class="mt-8 space-y-6">
            <div>
              <label for="signUp_username" class="block text-sm font-medium text-gray-700">Username</label>
              <div class="relative mt-1 rounded-md shadow-sm">
                <input type="text" name="signUp_username" id="signUp_username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500  block w-full p-2.5" aria-invalid="true" aria-describedby="signUp_usernameError" required>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                  <svg id="signUp_usernameErrorSVG" class="hidden w-5 h-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                  </svg>
                  <svg id="signUp_usernameSuccessSVG" class="hidden w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
              <p class="mt-2 text-xs text-gray-600" id="signUp_usernameError">Username must be between 2-30 characters.</p>
            </div>
            <div>
              <label for="signUp_password" class="block text-sm font-medium text-gray-700">Password</label>
              <div class="relative mt-1 rounded-md shadow-sm">
                <input type="password" name="signUp_password" id="signUp_password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500  block w-full p-2.5" aria-invalid="true" aria-describedby="signUp_passwordError" required>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                  <svg id="signUp_passwordErrorSVG" class="hidden w-5 h-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                  </svg>
                  <svg id="signUp_passwordSuccessSVG" class="hidden w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
              <p class="mt-2 text-xs text-gray-600" id="signUp_passwordError">Password must be 8 characters or longer.</p>
            </div>
            <div>
              <label for="signUp_confirmPassword" class="block text-sm font-medium text-gray-700">Confirm Password</label>
              <div class="relative mt-1 rounded-md shadow-sm">
                <input type="password" name="signUp_confirmPassword" id="signUp_confirmPassword" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500  block w-full p-2.5" aria-invalid="true" aria-describedby="signUp_confirmPasswordError" required>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                  <svg id="signUp_confirmPasswordErrorSVG" class="hidden w-5 h-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                  </svg>
                  <svg id="signUp_confirmPasswordSuccessSVG" class="hidden w-5 h-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12zm13.36-1.814a.75.75 0 10-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 00-1.06 1.06l2.25 2.25a.75.75 0 001.14-.094l3.75-5.25z" clip-rule="evenodd" />
                  </svg>
                </div>
              </div>
              <p class="mt-2 text-xs text-gray-600" id="signUp_confirmPasswordError">Password must be 8 characters or longer.</p>
            </div>
            <button id="btn_Next2" class="w-full flex justify-center mt-8 py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500"> Next </button>
            <a id="lnk_goBack1" class="block text-sm font-medium text-center cursor-pointer text-amber-600 hover:text-amber-500">Go back</a>
          </div>

        </div>

        <div id="step3" class="hidden">
          <img class="w-auto h-20 mx-auto" src="../resources/icon/icon_setupDone.svg">
          <h2 class="mt-4 text-3xl font-bold text-center text-gray-900">All set!</h2>
          <p class="mt-2 text-sm text-center text-gray-600">
            You can now use the CMS. However, you must complete your details located in the account page.
          </p>
          <div class="mt-8 space-y-6">
            <button id="btn_Next3" class="w-full flex justify-center mt-8 py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500""> Let's go </button>
            </div>
          </div>

      

      </div>
    </div>
  </div>

  


</body>


<script src=" https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
              <script src="../scripts/signUp.js" defer></script>

</html>
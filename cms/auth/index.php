<?php

include './dbconnect.php';
require_once('./session.php');

checkSession();

// permanent delete articles within 60 days 
mysqli_query($dbConnect, 'DELETE FROM contents WHERE timestamp < cast(DATE_ADD(CURDATE(), INTERVAL -6 MONTH)as date) AND (stage = "Under review" OR stage = "Upon approval" OR stage="Archived");');
?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="CURSOR CMS Sign In page">
  <link rel="stylesheet" href="../styles/tailwind.css">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="icon" href="../resources/favicon.svg">
  <title>Sign In - CURSOR CMS</title>
</head>

<body class="h-full bg-[url('../resources/bg/bg_authLight.jpg')] bg-cover bg-center antialiased">
  <div class="flex flex-col justify-center min-h-full py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
      <img class="w-auto h-12 mx-auto" src="../resources/logo/logo_cursorCMS.svg" alt="CURSOR CMS">

    </div>

    <!-- SIGN IN FORM -->
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
      <div class="py-12 bg-white shadow bg-opacity-90 backdrop-blur-xl px-7 sm:rounded-lg sm:px-10">
        <div id="signInForm" class="block">
          <h2 class="text-3xl font-bold text-center text-gray-900">Welcome back</h2>
          <p class="mt-2 text-sm text-center text-gray-600">
            Sign in to your CURSOR Staff account
          </p>

          <div id="signIn_unmatchedCredentials" class="hidden p-4 mt-8 rounded-md bg-red-50">
            <div class="flex">
              <div class="flex-shrink-0">
                <!-- Heroicon name: solid/check-circle -->
                <svg class="w-5 h-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                </svg>
              </div>
              <div class="ml-3">
                <p class="text-sm font-medium text-red-800">Incorrect username or password.</p>
              </div>
              <div class="pl-3 ml-auto">
                <div class="-mx-1.5 -my-1.5">
                  <button id="triggerElement" type="button" class="inline-flex bg-red-50 rounded-md p-1.5 text-red-500 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-red-50 focus:ring-red-600">
                    <span class="sr-only">Dismiss</span>
                    <!-- Heroicon name: solid/x -->
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                      <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                  </button>
                </div>
              </div>
            </div>
          </div>

          <form class="mt-8 space-y-6" action="#" method="POST">
            <div>
              <label for="signIn_username" class="block mb-2 text-sm font-medium text-gray-700">Username</label>
              <input id="signIn_username" name="signIn_username" type="text" autocomplete="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500  block w-full p-2.5" required>
            </div>
            <div>
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <label for="signIn_password" class="block mb-2 text-sm font-medium text-gray-700">Password</label>
                </div>
                <div class="text-sm">
                  <a href="#" class="block mb-2 text-sm font-medium text-amber-600 hover:text-amber-500"> Forgot your password? </a>
                </div>
              </div>
              <input id="signIn_password" name="signIn_password" type="password" autocomplete="current-password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-amber-500 focus:border-amber-500 block w-full p-2.5" required>
            </div>
            <div>
              <button type="submit" id="signinSubmit" name="signinSubmit" class="w-full flex justify-center py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500">Sign in</button>
            </div>
          </form>
          <p class="block mt-4 py-2.5 text-sm text-center">New to Cursor CMS? <a id="signUpLink" class="mb-2 text-sm font-medium cursor-pointer text-amber-600 hover:text-amber-500" onClick="javascript:gotoSignUp()">Create an account</a>.</p>
        </div>

        <!-- SIGN UP FORM -->
        <div id="signUpForm" class="hidden">
          <h2 class="text-3xl font-bold text-center text-gray-900">Account registration is currently unavailable</h2>
          <p class="mt-2 text-sm text-center text-gray-600">
            You cannot register your staff account on your own for the sake of the publication's security. However, if you are a current staff member, you may proceed with the instructions below.
          </p>
          <div>
            <div class="flow-root mt-6">
              <ul role="list" class="-my-5 divide-y divide-gray-200">
                <li class="py-5">
                  <div class="relative focus-within:ring-2 focus-within:ring-amber-500">
                    <h3 class="text-sm font-semibold text-gray-800">
                      Step 1
                    </h3>
                    <p class="mt-1 text-sm text-gray-600">Request a new staff account from your publication's Adviser, Editor-in-Chief, or Associate Editor by going to the Staffs page and clicking the Add Staff button.</p>
                  </div>
                </li>
                <li class="py-5">
                  <div class="relative focus-within:ring-2 focus-within:ring-amber-500">
                    <h3 class="text-sm font-semibold text-gray-800">
                      Step 2
                    </h3>
                    <p class="mt-1 text-sm text-gray-600">You can now sign in to your account once you have your credentials.</p>
                  </div>
                </li>
                <li class="py-5">
                  <div class="relative focus-within:ring-2 focus-within:ring-amber-500">
                    <h3 class="text-sm font-semibold text-gray-800">
                      Step 3
                    </h3>
                    <p class="mt-1 text-sm text-gray-600">Complete your account setup by following the setup wizard.</p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
          <button id="goBacktoSignIn" class="w-full flex justify-center mt-8 py-2.5 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500"> Got it </button>
        </div>
      </div>
    </div>

    <footer class="bottom-0 block py-4 opacity-50">
      <p class="text-sm text-center">&copy; <script>
          document.write(/\d{4}/.exec(Date())[0])
        </script> CURSOR CMS</p>
    </footer>
</body>

<script src="./../scripts/auth.js"></script>

</html>
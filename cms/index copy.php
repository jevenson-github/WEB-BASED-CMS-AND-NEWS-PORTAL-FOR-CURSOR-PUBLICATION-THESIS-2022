<?php

$title = 'Dashboard';
$page = 'dashboard';

require('./auth/session.php');
require('./ui/affirmation.php');

checkSession();

?>

<!DOCTYPE html>
<html lang="en" class="h-full bg-white">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="description" content="CURSOR CMS Sign In page">
   <link rel="stylesheet" href="styles/tailwind.css">
   <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
   <link rel="icon" href="resources/favicon.svg">
   <title><?php echo $title ?> - CURSOR CMS</title>
</head>

<body class="flex-row lg:flex lg:flex-none">
   <?php include './ui/sideNav1.php'; ?>
   <main class="flex-1">
      <!-- Page title & actions -->
      <div class="px-4 py-4 border-b border-gray-200 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
         <!-- Page Breadcrumbs -->
         <div class="flex-1 min-w-0">
            <nav class="flex" aria-label="Breadcrumb">
               <ol role="list" class="flex items-center space-x-4">
                  <li>
                     <div>
                        <a href="#" class="text-gray-400 hover:text-gray-500">
                           <!-- Heroicon name: solid/home -->
                           <svg class="flex-shrink-0 w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                           </svg>
                           <span class="sr-only">Home</span>
                        </a>
                     </div>
                  </li>

                  <li>
                     <div class="flex items-center">
                        <!-- Heroicon name: solid/chevron-right -->
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                           <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700">Dashboard</a>
                     </div>
                  </li>

                  <li>
                     <div class="flex items-center">
                        <!-- Heroicon name: solid/chevron-right -->
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                           <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                        <a href="#" class="ml-4 text-sm font-medium text-gray-500 hover:text-gray-700" aria-current="page">Summary</a>
                     </div>
                  </li>
               </ol>
            </nav>

         </div>
         <div class="flex mt-4 sm:mt-0 sm:ml-4">
            <button type="button" class="inline-flex items-center order-1 px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 sm:order-0 sm:ml-0">SECO</button>
            <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white border border-transparent rounded-md shadow-sm bg-amber-600 order-0 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-amber-500 sm:order-1 sm:ml-3">PRIM</button>
         </div>
      </div>

      <div class="max-w-full px-4 pt-4 mx-auto sm:px-6 lg:max-w-full lg:px-8">

         <h1 class="sr-only">Profile</h1>
         <!-- Main 3 column grid -->
         <div class="grid items-start grid-cols-1 gap-4 lg:grid-cols-3 lg:gap-8">
            <!-- Left column -->
            <div class="grid grid-cols-1 gap-4 lg:col-span-2">
               <!-- Welcome panel -->
               <section aria-labelledby="profile-overview-title">
                  <div class="overflow-hidden bg-white rounded-lg">
                     <h2 class="sr-only" id="profile-overview-title">Profile Overview</h2>
                     <div class="p-6 bg-white">
                        <div class="sm:flex sm:items-center sm:justify-between">
                           <div class="sm:flex sm:space-x-5">
                              <div class="flex-shrink-0">
                                 <img class="w-20 h-20 mx-auto rounded-full" src="data:image/jpeg;base64,<?= base64_encode($_SESSION['image'])?>" alt="">
                              </div>
                              <div class="mt-4 text-center sm:mt-0 sm:pt-1 sm:text-left">
                                 <p id="greetAffirmation" class="text-lg font-bold text-gray-900 sm:text-3xl"><?php echo $greet . " " . $_SESSION['fName'] ?></p>
                                 
                              </div>
                           </div>
                           <div class="flex justify-center mt-5 sm:mt-0">
                           <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500">Primary btn</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </section>

               <div class="grid grid-cols-2 gap-5 mt-2 sm:grid-cols-2 md:grid-cols-4 lg:grid-cols-2 xl:grid-cols-4">
                  <!-- Card -->
                  <div class="p-5 overflow-hidden transition rounded-lg bg-amber-50 hover:bg-amber-100 hover:transition">
                     <img class="w-12 h-12 mb-1 text-gray-400" src="./resources/icon/icon_dashboard_visit.svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"></img>
                     <dl>
                        <dd>
                           <div class="text-3xl font-bold text-gray-900 truncate">123</div>
                        </dd>
                        <dt class="font-medium text-gray-700 truncate text-md">Page Visits</dt>
                     </dl>
                     <p class="mt-2 text-xs text-gray-500">Compared to 123 last academic year </p>
                  </div>

                  <div class="p-5 overflow-hidden transition rounded-lg bg-amber-50 hover:bg-amber-100 hover:transition">
                     <img class="w-12 h-12 mb-1 text-gray-400" src="./resources/icon/icon_dashboard_news.svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"></img>
                     <dl>
                        <dd>
                           <div class="text-3xl font-bold text-gray-900 truncate">123</div>
                        </dd>
                        <dt class="font-medium text-gray-700 truncate text-md">Articles Posted</dt>
                     </dl>
                     <p class="mt-2 text-xs text-gray-500">Compared to 123 last academic year </p>
                  </div>

                  <div class="p-5 overflow-hidden transition rounded-lg bg-amber-50 hover:bg-amber-100 hover:transition">
                     <img class="w-12 h-12 mb-1 text-gray-400" src="./resources/icon/icon_dashboard_staffs.svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"></img>
                     <dl>
                        <dd>
                           <div class="text-3xl font-bold text-gray-900 truncate">123</div>
                        </dd>
                        <dt class="font-medium text-gray-700 truncate text-md">Current Staffs</dt>
                     </dl>
                     <p class="mt-2 text-xs text-gray-500">Compared to 123 last academic year </p>
                  </div>



                  <div class="p-5 overflow-hidden transition rounded-lg bg-amber-50 hover:bg-amber-100 hover:transition">
                     <img class="w-12 h-12 mb-1 text-gray-400" src="./resources/icon/icon_dashboard_news.svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"></img>
                     <dl>
                        <dd>
                           <div class="text-3xl font-bold text-gray-900 truncate">123</div>
                        </dd>
                        <dt class="font-medium text-gray-700 truncate text-md">Articles Posted</dt>
                     </dl>
                     <p class="mt-2 text-xs text-gray-500">Compared to 123 last academic year </p>
                  </div>

               </div>

               <!-- Actions panel 
               <section aria-labelledby="quick-links-title">
                  <div class="overflow-hidden bg-gray-200 divide-y divide-gray-200 rounded-lg shadow sm:divide-y-0 sm:grid sm:grid-cols-2 sm:gap-px">
                     <h2 class="sr-only" id="quick-links-title">Quick links</h2>

                     <div class="relative p-6 bg-white rounded-tl-lg rounded-tr-lg sm:rounded-tr-none group focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                        <div>
                           <span class="inline-flex p-3 text-teal-700 rounded-lg bg-teal-50 ring-4 ring-white">
                              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                           </span>
                        </div>
                        <div class="mt-8">
                           <h3 class="text-lg font-medium">
                              <a href="#" class="focus:outline-none">
                                 <span class="absolute inset-0" aria-hidden="true"></span>
                                 Request time off
                              </a>
                           </h3>
                           <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae.</p>
                        </div>
                        <span class="absolute text-gray-300 pointer-events-none top-6 right-6 group-hover:text-gray-400" aria-hidden="true">
                           <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                           </svg>
                        </span>
                     </div>

                     <div class="relative p-6 bg-white sm:rounded-tr-lg group focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                        <div>
                           <span class="inline-flex p-3 text-purple-700 rounded-lg bg-purple-50 ring-4 ring-white">
                              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                              </svg>
                           </span>
                        </div>
                        <div class="mt-8">
                           <h3 class="text-lg font-medium">
                              <a href="#" class="focus:outline-none">
                                 <span class="absolute inset-0" aria-hidden="true"></span>
                                 Benefits
                              </a>
                           </h3>
                           <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae.</p>
                        </div>
                        <span class="absolute text-gray-300 pointer-events-none top-6 right-6 group-hover:text-gray-400" aria-hidden="true">
                           <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                           </svg>
                        </span>
                     </div>

                     <div class="relative p-6 bg-white group focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                        <div>
                           <span class="inline-flex p-3 rounded-lg bg-sky-50 text-sky-700 ring-4 ring-white">
                              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                              </svg>
                           </span>
                        </div>
                        <div class="mt-8">
                           <h3 class="text-lg font-medium">
                              <a href="#" class="focus:outline-none">
                                 <span class="absolute inset-0" aria-hidden="true"></span>
                                 Schedule a one-on-one
                              </a>
                           </h3>
                           <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae.</p>
                        </div>
                        <span class="absolute text-gray-300 pointer-events-none top-6 right-6 group-hover:text-gray-400" aria-hidden="true">
                           <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                           </svg>
                        </span>
                     </div>

                     <div class="relative p-6 bg-white group focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                        <div>
                           <span class="inline-flex p-3 text-yellow-700 rounded-lg bg-yellow-50 ring-4 ring-white">
                              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                              </svg>
                           </span>
                        </div>
                        <div class="mt-8">
                           <h3 class="text-lg font-medium">
                              <a href="#" class="focus:outline-none">
                                 <span class="absolute inset-0" aria-hidden="true"></span>
                                 Payroll
                              </a>
                           </h3>
                           <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae.</p>
                        </div>
                        <span class="absolute text-gray-300 pointer-events-none top-6 right-6 group-hover:text-gray-400" aria-hidden="true">
                           <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                           </svg>
                        </span>
                     </div>

                     <div class="relative p-6 bg-white sm:rounded-bl-lg group focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                        <div>
                           <span class="inline-flex p-3 rounded-lg bg-rose-50 text-rose-700 ring-4 ring-white">
                              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 15v-1a4 4 0 00-4-4H8m0 0l3 3m-3-3l3-3m9 14V5a2 2 0 00-2-2H6a2 2 0 00-2 2v16l4-2 4 2 4-2 4 2z" />
                              </svg>
                           </span>
                        </div>
                        <div class="mt-8">
                           <h3 class="text-lg font-medium">
                              <a href="#" class="focus:outline-none">
                                 <span class="absolute inset-0" aria-hidden="true"></span>
                                 Submit an expense
                              </a>
                           </h3>
                           <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae.</p>
                        </div>
                        <span class="absolute text-gray-300 pointer-events-none top-6 right-6 group-hover:text-gray-400" aria-hidden="true">
                           <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                           </svg>
                        </span>
                     </div>

                     <div class="relative p-6 bg-white rounded-bl-lg rounded-br-lg sm:rounded-bl-none group focus-within:ring-2 focus-within:ring-inset focus-within:ring-cyan-500">
                        <div>
                           <span class="inline-flex p-3 text-indigo-700 rounded-lg bg-indigo-50 ring-4 ring-white">
                              <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                 <path d="M12 14l9-5-9-5-9 5 9 5z" />
                                 <path d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                              </svg>
                           </span>
                        </div>
                        <div class="mt-8">
                           <h3 class="text-lg font-medium">
                              <a href="#" class="focus:outline-none">
                                 <span class="absolute inset-0" aria-hidden="true"></span>
                                 Training
                              </a>
                           </h3>
                           <p class="mt-2 text-sm text-gray-500">Doloribus dolores nostrum quia qui natus officia quod et dolorem. Sit repellendus qui ut at blanditiis et quo et molestiae.</p>
                        </div>
                        <span class="absolute text-gray-300 pointer-events-none top-6 right-6 group-hover:text-gray-400" aria-hidden="true">
                           <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                              <path d="M20 4h1a1 1 0 00-1-1v1zm-1 12a1 1 0 102 0h-2zM8 3a1 1 0 000 2V3zM3.293 19.293a1 1 0 101.414 1.414l-1.414-1.414zM19 4v12h2V4h-2zm1-1H8v2h12V3zm-.707.293l-16 16 1.414 1.414 16-16-1.414-1.414z" />
                           </svg>
                        </span>
                     </div>
                  </div>-->
               </section>
            </div>
            

            <!-- Right column -->
            <div class="grid grid-cols-1 gap-4">
               <!-- Announcements -->
               <section aria-labelledby="announcements-title">
                  <div class="overflow-hidden bg-white rounded-lg shadow">
                     <div class="p-6">
                        <h2 class="text-base font-medium text-gray-900" id="announcements-title">Announcements</h2>
                        <div class="flow-root mt-6">
                           <ul role="list" class="-my-5 divide-y divide-gray-200">
                              <li class="py-5">
                                 <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                    <h3 class="text-sm font-semibold text-gray-800">
                                       <a href="#" class="hover:underline focus:outline-none">
                                          <!-- Extend touch target to entire panel -->
                                          <span class="absolute inset-0" aria-hidden="true"></span>
                                          1
                                       </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 line-clamp-2">1</p>
                                 </div>
                              </li>

                              <li class="py-5">
                                 <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                    <h3 class="text-sm font-semibold text-gray-800">
                                       <a href="#" class="hover:underline focus:outline-none">
                                          <!-- Extend touch target to entire panel -->
                                          <span class="absolute inset-0" aria-hidden="true"></span>
                                          2
                                       </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 line-clamp-2">2</p>
                                 </div>
                              </li>

                              <li class="py-5">
                                 <div class="relative focus-within:ring-2 focus-within:ring-cyan-500">
                                    <h3 class="text-sm font-semibold text-gray-800">
                                       <a href="#" class="hover:underline focus:outline-none">
                                          <!-- Extend touch target to entire panel -->
                                          <span class="absolute inset-0" aria-hidden="true"></span>
                                          3
                                       </a>
                                    </h3>
                                    <p class="mt-1 text-sm text-gray-600 line-clamp-2">3</p>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <div class="mt-6">
                           <a href="#" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50"> View all </a>
                        </div>
                     </div>
                  </div>
               </section>

               <!-- Recent Hires 
               <section aria-labelledby="recent-hires-title">
                  <div class="overflow-hidden bg-white rounded-lg shadow">
                     <div class="p-6">
                        <h2 class="text-base font-medium text-gray-900" id="recent-hires-title">Recent Hires</h2>
                        <div class="flow-root mt-6">
                           <ul role="list" class="-my-5 divide-y divide-gray-200">
                              <li class="py-4">
                                 <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                       <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                       <p class="text-sm font-medium text-gray-900 truncate">Leonard Krasner</p>
                                       <p class="text-sm text-gray-500 truncate">@leonardkrasner</p>
                                    </div>
                                    <div>
                                       <a href="#" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50"> View </a>
                                    </div>
                                 </div>
                              </li>

                              <li class="py-4">
                                 <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                       <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1463453091185-61582044d556?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                       <p class="text-sm font-medium text-gray-900 truncate">Floyd Miles</p>
                                       <p class="text-sm text-gray-500 truncate">@floydmiles</p>
                                    </div>
                                    <div>
                                       <a href="#" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50"> View </a>
                                    </div>
                                 </div>
                              </li>

                              <li class="py-4">
                                 <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                       <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                       <p class="text-sm font-medium text-gray-900 truncate">Emily Selman</p>
                                       <p class="text-sm text-gray-500 truncate">@emilyselman</p>
                                    </div>
                                    <div>
                                       <a href="#" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50"> View </a>
                                    </div>
                                 </div>
                              </li>

                              <li class="py-4">
                                 <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                       <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1500917293891-ef795e70e1f6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                       <p class="text-sm font-medium text-gray-900 truncate">Kristin Watson</p>
                                       <p class="text-sm text-gray-500 truncate">@kristinwatson</p>
                                    </div>
                                    <div>
                                       <a href="#" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50"> View </a>
                                    </div>
                                 </div>
                              </li>
                           </ul>
                        </div>
                        <div class="mt-6">
                           <a href="#" class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50"> View all </a>
                        </div>
                     </div>
                  </div>
               </section>-->
            </div>
         </div>
      </div>

      <footer>
         <div class="max-w-full px-4 pt-8 mx-auto sm:px-6 lg:px-8 lg:max-w-full">
            <div class="py-8 text-sm text-center text-gray-500 border-t border-gray-200 sm:text-left"><span class="block sm:inline">&copy; 2021 CURSOR CMS</span> <span class="block sm:inline">All rights reserved.</span></div>
         </div>
      </footer>

   </main>

</body>
<script src="scripts/navigation.js" defer></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

</html>
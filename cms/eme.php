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
   <title>Dashboard - CURSOR CMS</title>
</head>

<body>

<!--
  This example requires Tailwind CSS v2.0+ 
  
  This example requires some changes to your config:
  
  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
<div class="min-h-full">
  <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
  <div class="fixed inset-0 z-40 flex lg:hidden" role="dialog" aria-modal="true">
    <!--
      Off-canvas menu overlay, show/hide based on off-canvas menu state.

      Entering: "transition-opacity ease-linear duration-300"
        From: "opacity-0"
        To: "opacity-100"
      Leaving: "transition-opacity ease-linear duration-300"
        From: "opacity-100"
        To: "opacity-0"
    -->
    <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>

    <!--
      Off-canvas menu, show/hide based on off-canvas menu state.

      Entering: "transition ease-in-out duration-300 transform"
        From: "-translate-x-full"
        To: "translate-x-0"
      Leaving: "transition ease-in-out duration-300 transform"
        From: "translate-x-0"
        To: "-translate-x-full"
    -->
    <div class="relative flex flex-col flex-1 w-full max-w-xs pt-5 pb-4 bg-white">
      <!--
        Close button, show/hide based on off-canvas menu state.

        Entering: "ease-in-out duration-300"
          From: "opacity-0"
          To: "opacity-100"
        Leaving: "ease-in-out duration-300"
          From: "opacity-100"
          To: "opacity-0"
      -->
      <div class="absolute top-0 right-0 pt-2 -mr-12">
        <button type="button" class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
          <span class="sr-only">Close sidebar</span>
          <!-- Heroicon name: outline/x -->
          <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <div class="flex items-center flex-shrink-0 px-4">
        <img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg" alt="Workflow">
      </div>
      <div class="flex-1 h-0 mt-5 overflow-y-auto">
        <nav class="px-2">
          <div class="space-y-1">
            <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:text-gray-900 hover:bg-gray-50" -->
            <a href="#" class="flex items-center px-2 py-2 text-base font-medium leading-5 text-gray-900 bg-gray-100 rounded-md group" aria-current="page">
              <!--
                Heroicon name: outline/home

                Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
              -->
              <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
              </svg>
              Home
            </a>

            <a href="#" class="flex items-center px-2 py-2 text-base font-medium leading-5 text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 group">
              <!-- Heroicon name: outline/view-list -->
              <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
              </svg>
              My tasks
            </a>

            <a href="#" class="flex items-center px-2 py-2 text-base font-medium leading-5 text-gray-600 rounded-md hover:text-gray-900 hover:bg-gray-50 group">
              <!-- Heroicon name: outline/clock -->
              <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              Recent
            </a>
          </div>
          <div class="mt-8">
            <h3 class="px-3 text-xs font-semibold tracking-wider text-gray-500 uppercase" id="mobile-teams-headline">Teams</h3>
            <div class="mt-1 space-y-1" role="group" aria-labelledby="mobile-teams-headline">
              <a href="#" class="flex items-center px-3 py-2 text-base font-medium leading-5 text-gray-600 rounded-md group hover:text-gray-900 hover:bg-gray-50">
                <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full" aria-hidden="true"></span>
                <span class="truncate"> Engineering </span>
              </a>

              <a href="#" class="flex items-center px-3 py-2 text-base font-medium leading-5 text-gray-600 rounded-md group hover:text-gray-900 hover:bg-gray-50">
                <span class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full" aria-hidden="true"></span>
                <span class="truncate"> Human Resources </span>
              </a>

              <a href="#" class="flex items-center px-3 py-2 text-base font-medium leading-5 text-gray-600 rounded-md group hover:text-gray-900 hover:bg-gray-50">
                <span class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full" aria-hidden="true"></span>
                <span class="truncate"> Customer Success </span>
              </a>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div class="flex-shrink-0 w-14" aria-hidden="true">
      <!-- Dummy element to force sidebar to shrink to fit close icon -->
    </div>
  </div>

  <!-- Static sidebar for desktop -->
  <div class="hidden lg:flex lg:flex-col lg:w-64 lg:fixed lg:inset-y-0 lg:border-r lg:border-gray-200 lg:pt-5 lg:pb-4 lg:bg-gray-100">
    <div class="flex items-center flex-shrink-0 px-6">
      <img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-logo-purple-500-mark-gray-700-text.svg" alt="Workflow">
    </div>
    <!-- Sidebar component, swap this element with another sidebar if you like -->
    <div class="flex flex-col flex-1 h-0 mt-6 overflow-y-auto">
      <!-- User account dropdown -->
      <div class="relative inline-block px-3 text-left">
        <div>
          <button type="button" class="group w-full bg-gray-100 rounded-md px-3.5 py-2 text-sm text-left font-medium text-gray-700 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-purple-500" id="options-menu-button" aria-expanded="false" aria-haspopup="true">
            <span class="flex items-center justify-between w-full">
              <span class="flex items-center justify-between min-w-0 space-x-3">
                <img class="flex-shrink-0 w-10 h-10 bg-gray-300 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=3&w=256&h=256&q=80" alt="">
                <span class="flex flex-col flex-1 min-w-0">
                  <span class="text-sm font-medium text-gray-900 truncate">Jessy Schwarz</span>
                  <span class="text-sm text-gray-500 truncate">@jessyschwarz</span>
                </span>
              </span>
              <!-- Heroicon name: solid/selector -->
              <svg class="flex-shrink-0 w-5 h-5 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
              </svg>
            </span>
          </button>
        </div>

        <!--
          Dropdown menu, show/hide based on menu state.

          Entering: "transition ease-out duration-100"
            From: "transform opacity-0 scale-95"
            To: "transform opacity-100 scale-100"
          Leaving: "transition ease-in duration-75"
            From: "transform opacity-100 scale-100"
            To: "transform opacity-0 scale-95"
        -->
        <div class="absolute left-0 right-0 z-10 hidden mx-3 mt-1 origin-top bg-white divide-y divide-gray-200 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="options-menu-button" tabindex="-1">
          <div class="py-1" role="none">
            <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-0">View profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-1">Settings</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-2">Notifications</a>
          </div>
          <div class="py-1" role="none">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-3">Get desktop app</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-4">Support</a>
          </div>
          <div class="py-1" role="none">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="options-menu-item-5">Logout</a>
          </div>
        </div>
      </div>
      <!-- Sidebar Search -->
      <div class="px-3 mt-5">
        <label for="search" class="sr-only">Search</label>
        <div class="relative mt-1 rounded-md shadow-sm">
          <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none" aria-hidden="true">
            <!-- Heroicon name: solid/search -->
            <svg class="w-4 h-4 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
          </div>
          <input type="text" name="search" id="search" class="block w-full border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500 pl-9 sm:text-sm" placeholder="Search">
        </div>
      </div>
      <!-- Navigation -->
      <nav class="px-3 mt-6">
        <div class="space-y-1">
          <!-- Current: "bg-gray-200 text-gray-900", Default: "text-gray-700 hover:text-gray-900 hover:bg-gray-50" -->
          <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-900 bg-gray-200 rounded-md group" aria-current="page">
            <!--
              Heroicon name: outline/home

              Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
            -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
            </svg>
            Home
          </a>

          <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50 group">
            <!-- Heroicon name: outline/view-list -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
            </svg>
            My tasks
          </a>

          <a href="#" class="flex items-center px-2 py-2 text-sm font-medium text-gray-700 rounded-md hover:text-gray-900 hover:bg-gray-50 group">
            <!-- Heroicon name: outline/clock -->
            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Recent
          </a>
        </div>
        <div class="mt-8">
          <!-- Secondary navigation -->
          <h3 class="px-3 text-xs font-semibold tracking-wider text-gray-500 uppercase" id="desktop-teams-headline">Teams</h3>
          <div class="mt-1 space-y-1" role="group" aria-labelledby="desktop-teams-headline">
            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md group hover:text-gray-900 hover:bg-gray-50">
              <span class="w-2.5 h-2.5 mr-4 bg-indigo-500 rounded-full" aria-hidden="true"></span>
              <span class="truncate"> Engineering </span>
            </a>

            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md group hover:text-gray-900 hover:bg-gray-50">
              <span class="w-2.5 h-2.5 mr-4 bg-green-500 rounded-full" aria-hidden="true"></span>
              <span class="truncate"> Human Resources </span>
            </a>

            <a href="#" class="flex items-center px-3 py-2 text-sm font-medium text-gray-700 rounded-md group hover:text-gray-900 hover:bg-gray-50">
              <span class="w-2.5 h-2.5 mr-4 bg-yellow-500 rounded-full" aria-hidden="true"></span>
              <span class="truncate"> Customer Success </span>
            </a>
          </div>
        </div>
      </nav>
    </div>
  </div>
  <!-- Main column -->
  <div class="flex flex-col lg:pl-64">
    <!-- Search header -->
    <div class="sticky top-0 z-10 flex flex-shrink-0 h-16 bg-white border-b border-gray-200 lg:hidden">
      <!-- Sidebar toggle, controls the 'sidebarOpen' sidebar state. -->
      <button type="button" class="px-4 text-gray-500 border-r border-gray-200 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-purple-500 lg:hidden">
        <span class="sr-only">Open sidebar</span>
        <!-- Heroicon name: outline/menu-alt-1 -->
        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
        </svg>
      </button>
      <div class="flex justify-between flex-1 px-4 sm:px-6 lg:px-8">
        <div class="flex flex-1">
          <form class="flex w-full md:ml-0" action="#" method="GET">
            <label for="search-field" class="sr-only">Search</label>
            <div class="relative w-full text-gray-400 focus-within:text-gray-600">
              <div class="absolute inset-y-0 left-0 flex items-center pointer-events-none">
                <!-- Heroicon name: solid/search -->
                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
              </div>
              <input id="search-field" name="search-field" class="block w-full h-full py-2 pl-8 pr-3 text-gray-900 placeholder-gray-500 border-transparent focus:outline-none focus:ring-0 focus:border-transparent focus:placeholder-gray-400 sm:text-sm" placeholder="Search" type="search">
            </div>
          </form>
        </div>
        <div class="flex items-center">
          <!-- Profile dropdown -->
          <div class="relative ml-3">
            <div>
              <button type="button" class="flex items-center max-w-xs text-sm bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open user menu</span>
                <img class="w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1502685104226-ee32379fefbe?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
              </button>
            </div>

            <!--
              Dropdown menu, show/hide based on menu state.

              Entering: "transition ease-out duration-100"
                From: "transform opacity-0 scale-95"
                To: "transform opacity-100 scale-100"
              Leaving: "transition ease-in duration-75"
                From: "transform opacity-100 scale-100"
                To: "transform opacity-0 scale-95"
            -->
            <div class="absolute right-0 w-48 mt-2 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
              <div class="py-1" role="none">
                <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">View profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Notifications</a>
              </div>
              <div class="py-1" role="none">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-3">Get desktop app</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-4">Support</a>
              </div>
              <div class="py-1" role="none">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-5">Logout</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <main class="flex-1">
      <!-- Page title & actions -->
      <div class="px-4 py-4 border-b border-gray-200 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
        <div class="flex-1 min-w-0">
          <h1 class="text-lg font-medium leading-6 text-gray-900 sm:truncate">Home</h1>
        </div>
        <div class="flex mt-4 sm:mt-0 sm:ml-4">
          <button type="button" class="inline-flex items-center order-1 px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-0 sm:ml-0">Share</button>
          <button type="button" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-purple-600 border border-transparent rounded-md shadow-sm order-0 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:order-1 sm:ml-3">Create</button>
        </div>
      </div>
      <!-- Pinned projects -->
      <div class="px-4 mt-6 sm:px-6 lg:px-8">
        <h2 class="text-xs font-medium tracking-wide text-gray-500 uppercase">Pinned Projects</h2>
        <ul role="list" class="grid grid-cols-1 gap-4 mt-3 sm:gap-6 sm:grid-cols-2 xl:grid-cols-4">
          <li class="relative flex col-span-1 rounded-md shadow-sm">
            <div class="flex items-center justify-center flex-shrink-0 w-16 text-sm font-medium text-white bg-pink-600 rounded-l-md">GA</div>
            <div class="flex items-center justify-between flex-1 truncate bg-white border-t border-b border-r border-gray-200 rounded-r-md">
              <div class="flex-1 px-4 py-2 text-sm truncate">
                <a href="#" class="font-medium text-gray-900 hover:text-gray-600"> GraphQL API </a>
                <p class="text-gray-500">12 Members</p>
              </div>
              <div class="flex-shrink-0 pr-2">
                <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-gray-400 bg-white rounded-full hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500" id="pinned-project-options-menu-0-button" aria-expanded="false" aria-haspopup="true">
                  <span class="sr-only">Open options</span>
                  <!-- Heroicon name: solid/dots-vertical -->
                  <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                  </svg>
                </button>

                <!--
                  Dropdown menu, show/hide based on menu state.

                  Entering: "transition ease-out duration-100"
                    From: "transform opacity-0 scale-95"
                    To: "transform opacity-100 scale-100"
                  Leaving: "transition ease-in duration-75"
                    From: "transform opacity-100 scale-100"
                    To: "transform opacity-0 scale-95"
                -->
                <div class="absolute z-10 w-48 mx-3 mt-1 origin-top-right bg-white divide-y divide-gray-200 rounded-md shadow-lg right-10 top-3 ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="pinned-project-options-menu-0-button" tabindex="-1">
                  <div class="py-1" role="none">
                    <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="pinned-project-options-menu-0-item-0">View</a>
                  </div>
                  <div class="py-1" role="none">
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="pinned-project-options-menu-0-item-1">Removed from pinned</a>
                    <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="pinned-project-options-menu-0-item-2">Share</a>
                  </div>
                </div>
              </div>
            </div>
          </li>

          <!-- More items... -->
        </ul>
      </div>

      <!-- Projects list (only on smallest breakpoint) -->
      <div class="mt-10 sm:hidden">
        <div class="px-4 sm:px-6">
          <h2 class="text-xs font-medium tracking-wide text-gray-500 uppercase">Projects</h2>
        </div>
        <ul role="list" class="mt-3 border-t border-gray-200 divide-y divide-gray-100">
          <li>
            <a href="#" class="flex items-center justify-between px-4 py-4 group hover:bg-gray-50 sm:px-6">
              <span class="flex items-center space-x-3 truncate">
                <span class="w-2.5 h-2.5 flex-shrink-0 rounded-full bg-pink-600" aria-hidden="true"></span>
                <span class="text-sm font-medium leading-6 truncate">
                  GraphQL API
                  <span class="font-normal text-gray-500 truncate">in Engineering</span>
                </span>
              </span>
              <!-- Heroicon name: solid/chevron-right -->
              <svg class="w-5 h-5 ml-4 text-gray-400 group-hover:text-gray-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
              </svg>
            </a>
          </li>

          <!-- More projects... -->
        </ul>
      </div>

      <!-- Projects table (small breakpoint and up) -->
      <div class="hidden mt-8 sm:block">
        <div class="inline-block min-w-full align-middle border-b border-gray-200">
          <table class="min-w-full">
            <thead>
              <tr class="border-t border-gray-200">
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                  <span class="lg:pl-2">Project</span>
                </th>
                <th class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">Members</th>
                <th class="hidden px-6 py-3 text-xs font-medium tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 md:table-cell bg-gray-50">Last updated</th>
                <th class="py-3 pr-6 text-xs font-medium tracking-wider text-right text-gray-500 uppercase border-b border-gray-200 bg-gray-50"></th>
              </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
              <tr>
                <td class="w-full px-6 py-3 text-sm font-medium text-gray-900 max-w-0 whitespace-nowrap">
                  <div class="flex items-center space-x-3 lg:pl-2">
                    <div class="flex-shrink-0 w-2.5 h-2.5 rounded-full bg-pink-600" aria-hidden="true"></div>
                    <a href="#" class="truncate hover:text-gray-600">
                      <span>
                        GraphQL API
                        <span class="font-normal text-gray-500">in Engineering</span>
                      </span>
                    </a>
                  </div>
                </td>
                <td class="px-6 py-3 text-sm font-medium text-gray-500">
                  <div class="flex items-center space-x-2">
                    <div class="flex flex-shrink-0 -space-x-1">
                      <img class="w-6 h-6 rounded-full max-w-none ring-2 ring-white" src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Dries Vincent">

                      <img class="w-6 h-6 rounded-full max-w-none ring-2 ring-white" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Lindsay Walton">

                      <img class="w-6 h-6 rounded-full max-w-none ring-2 ring-white" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Courtney Henry">

                      <img class="w-6 h-6 rounded-full max-w-none ring-2 ring-white" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Tom Cook">
                    </div>

                    <span class="flex-shrink-0 text-xs font-medium leading-5">+8</span>
                  </div>
                </td>
                <td class="hidden px-6 py-3 text-sm text-right text-gray-500 md:table-cell whitespace-nowrap">March 17, 2020</td>
                <td class="px-6 py-3 text-sm font-medium text-right whitespace-nowrap">
                  <a href="#" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                </td>
              </tr>

              <!-- More projects... -->
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</div>


</body>
</html>
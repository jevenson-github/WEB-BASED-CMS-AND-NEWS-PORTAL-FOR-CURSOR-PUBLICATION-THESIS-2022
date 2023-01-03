<?php

//require './../configs/redirect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- WEBPAGE META DATA -->
  <title><?= $title ?> | CURSOR eConnect</title>
  <meta name="description" content="<?= $leadText ?>">
  <meta property="og:url" content="https://www.cursorpub.me/">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= $title ?> | CURSOR eConnect">
  <meta property="og:description" content="<?= $leadText ?>">
  <meta property="og:image" content="data:image/jpeg;base64,<?= base64_encode($leadVisual) ?>&quality=50">
  <meta name="twitter:card" content="summary_large_image">
  <meta property="twitter:domain" content="https://www.cursorpub.me/">
  <meta property="twitter:url" content="https://www.cursorpub.me/">
  <meta name="twitter:title" content="<?= $title ?> | CURSOR eConnect">
  <meta name="twitter:description" content="<?= $leadText ?>">
  <meta name="twitter:image" content="data:image/jpeg;base64,<?= base64_encode($leadVisual) ?>">
  <link rel="shortcut icon" href="./../resources/favicon.svg" type="image/x-icon">

  <!-- STYLESHEETS AND SCRIPTS -->
  <link rel="stylesheet" href="./../styles/style.css">
  <link rel="stylesheet" href="./../styles/tailwind.css">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

  <!-- THEME COLOR -->
  <meta name="theme-color" content="#f59e0b">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black or black-translucent">

  <link rel="manifest" href="./manifest.json">
</head>

<body class="overflow-x-hidden">

  <!-- NAVIGATION BAR -->
  <?php include './components/header.php' ?>

  <!-- PROFILE BANNER -->
  <div>
    <div>
      <img class="object-cover w-full h-32" src="https://images.unsplash.com/photo-1444628838545-ac4016a5418a?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1950&q=80" alt="">
    </div>
    <div class="px-4 mx-auto max-w-screen-2xl sm:px-6 lg:px-8">
      <div class="-mt-12 sm:flex sm:items-end sm:space-x-5">
        <div class="flex">
          <img class="object-cover w-32 h-32 mx-auto rounded-full ring-4 ring-amber-50" src="https://scontent.fcrk1-3.fna.fbcdn.net/v/t39.30808-6/312193972_481122974045117_6190532326235965741_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=0debeb&_nc_eui2=AeFC3nBUmIKNdqXV6lRwmKqN5fvqAtCT0LDl--oC0JPQsOnnuYKmLlMCpN_iDykpXjgvAmeuviuVq_bNolVmzs-A&_nc_ohc=oI_FtmoosYoAX82-p2R&tn=hfvNSPJKE5N6ZCj8&_nc_ht=scontent.fcrk1-3.fna&oh=00_AT8zPuJDVAwsOFivljyBydacZeV1mP9Vve-X1PmWKxMNMg&oe=635B9EEE" alt="">
        </div>
        <div class="mt-6 sm:flex-1 sm:min-w-0 sm:flex sm:items-center sm:justify-end sm:space-x-6 sm:pb-1">
          <div class="flex-1 min-w-0 mt-6 sm:hidden md:block">
            <h1 class="text-2xl font-semibold leading-snug text-center sm:text-left">Marielle Jiean Teodoro</h1>
            <h5 class="text-center text-gray-500 text-md sm:text-left">Editor-in-Chief</h5>
          </div>
          <div class="flex flex-col mt-6 space-y-3 justify-stretch sm:flex-row sm:space-y-0 sm:space-x-4">
            <button type="button" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white border-gray-300 rounded-md bg-amber-500">
              <!-- Heroicon name: solid/mail -->
              <svg class="w-5 h-5 mr-2 -ml-1 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
              </svg>
              <span>Message</span>
            </button>
          </div>
        </div>
      </div>
      <div class="flex-1 hidden min-w-0 mt-6 sm:block md:hidden">
        <h1 class="text-2xl font-semibold leading-snug text-center sm:text-left">Marielle Jiean Teodoro</h1>
        <h5 class="text-center text-gray-500 text-md sm:text-left">Editor-in-Chief</h5>
      </div>
    </div>
  </div>


  <!-- CONTENT -->
  <main class="grid grid-cols-5 px-4 mx-auto mt-12 gap-y-0 md:gap-y-4 max-w-screen-2xl sm:px-8 gap-x-8">
    <!-- ABOUT ROW -->
    <div class="col-span-5 md:col-span-1">
      <h4 class="text-lg font-semibold">About</h4>
    </div>
    <div class="col-span-5 md:col-span-4">
      <p class="mt-1 leading-relaxed">Marielle is a student at Bulacan State University, where she is majoring in Information Technology. She writes non-fiction with a lot of enthusiasm and is a journalist in school.</p>
    </div>
    <!-- EXPERIENCE ROW -->
    <div class="col-span-5 md:col-span-1">
      <h4 class="mt-8 text-lg font-semibold md:mt-0">Experience</h4>
    </div>
    <div class="col-span-5 md:col-span-4">
      <div class="grid grid-cols-1 gap-4 mt-2 sm:grid-cols-2 lg:grid-cols-4 md:mt-0">
        <!-- EXPERIENCE CARD -->
        <div class="flex flex-row p-4 border rounded sm:flex-col">
          <svg class="w-16 h-16" viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="64" cy="64" r="64" fill="#F5C630" fill-opacity="0.25" />
          </svg>
          <div class="my-auto ml-3 sm:ml-0">
            <h5 class="mt-0 font-medium text-md sm:mt-2">Managing Editor for Finance</h5>
            <h6 class="text-sm text-gray-700">Higher Editorial Board</h6>
            <p class="mt-1 text-xs text-gray-500">2022 - 2023</p>
          </div>
        </div>
        <!-- EXPERIENCE CARD -->
        <div class="flex flex-row p-4 border rounded sm:flex-col">
          <svg class="w-16 h-16" viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="64" cy="64" r="64" fill="#F5C630" fill-opacity="0.25" />
          </svg>
          <div class="my-auto ml-3 sm:ml-0">
            <h5 class="mt-0 font-medium text-md sm:mt-2">Managing Editor for Finance</h5>
            <h6 class="text-sm text-gray-700">Higher Editorial Board</h6>
            <p class="mt-1 text-xs text-gray-500">2022 - 2023</p>
          </div>
        </div>
        <!-- EXPERIENCE CARD -->
        <div class="flex flex-row p-4 border rounded sm:flex-col">
          <svg class="w-16 h-16" viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="64" cy="64" r="64" fill="#F5C630" fill-opacity="0.25" />
          </svg>
          <div class="my-auto ml-3 sm:ml-0">
            <h5 class="mt-0 font-medium text-md sm:mt-2">Managing Editor for Finance</h5>
            <h6 class="text-sm text-gray-700">Higher Editorial Board</h6>
            <p class="mt-1 text-xs text-gray-500">2022 - 2023</p>
          </div>
        </div>
        <!-- EXPERIENCE CARD -->
        <div class="flex flex-row p-4 border rounded sm:flex-col">
          <svg class="w-16 h-16" viewBox="0 0 128 128" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="64" cy="64" r="64" fill="#F5C630" fill-opacity="0.25" />
          </svg>
          <div class="my-auto ml-3 sm:ml-0">
            <h5 class="mt-0 font-medium text-md sm:mt-2">Managing Editor for Finance</h5>
            <h6 class="text-sm text-gray-700">Higher Editorial Board</h6>
            <p class="mt-1 text-xs text-gray-500">2022 - 2023</p>
          </div>
        </div>
      </div>
    </div>
    <!-- ABOUT ROW -->
    <div class="col-span-5 md:col-span-1">
      <h4 class="text-lg font-semibold">Published works</h4>
    </div>
    <div class="col-span-5 md:col-span-4">
        <div class="grid grid-cols-2 gap-4 sm:grid-cols-2 lg:grid-cols-4">
          <!-- ARTICLE CARD -->
          <div class="flex flex-col mt-4">
            <div class="rounded aspect-w-6 aspect-h-3">
              <img class="object-cover object-top w-full h-full rounded" src="https://scontent.fcrk1-3.fna.fbcdn.net/v/t39.30808-6/311801979_477938484363566_7456364287445462973_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeFstvLAFFFkYxO-Fy3QIsVKUFt-5gtC15JQW37mC0LXkqquK62Lgbd8WeKY2EeegF1DfJcxRKNE4dv2gemkdhNN&_nc_ohc=L2DvKFmns2YAX9oz4F_&_nc_ht=scontent.fcrk1-3.fna&oh=00_AT-QxpkfOVj86RCQgqvuyeEDW_0kQgVw6m8hBnDd4wbszA&oe=6355D768" alt="" />
            </div>
            <div class="flex flex-col justify-between flex-1">
              <div class="flex-1">
                <p class="mt-3 text-xs font-semibold text-amber-600">
                  <a href="#" class=""> EDITORIAL </a>
                </p>
                <a href="#" class="block mt-1">
                  <p class="text-sm font-medium text-gray-900">The loss we needed</p>
                </a>
                <p class="mt-1 text-xs font-medium text-gray-600">
                  <a href="#" class=""> October 14, 2022 </a>
                </p>
              </div>
            </div>
          </div>
          <!-- ARTICLE CARD -->
          <div class="flex flex-col mt-4">
            <div class="rounded aspect-w-6 aspect-h-3">
              <img class="object-cover object-top w-full h-full rounded" src="https://scontent.fcrk1-3.fna.fbcdn.net/v/t39.30808-6/311801979_477938484363566_7456364287445462973_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeFstvLAFFFkYxO-Fy3QIsVKUFt-5gtC15JQW37mC0LXkqquK62Lgbd8WeKY2EeegF1DfJcxRKNE4dv2gemkdhNN&_nc_ohc=L2DvKFmns2YAX9oz4F_&_nc_ht=scontent.fcrk1-3.fna&oh=00_AT-QxpkfOVj86RCQgqvuyeEDW_0kQgVw6m8hBnDd4wbszA&oe=6355D768" alt="" />
            </div>
            <div class="flex flex-col justify-between flex-1">
              <div class="flex-1">
                <p class="mt-3 text-xs font-semibold text-amber-600">
                  <a href="#" class=""> EDITORIAL </a>
                </p>
                <a href="#" class="block mt-1">
                  <p class="text-sm font-medium text-gray-900">The loss we needed</p>
                </a>
                <p class="mt-1 text-xs font-medium text-gray-600">
                  <a href="#" class=""> October 14, 2022 </a>
                </p>
              </div>
            </div>
          </div>
          <!-- ARTICLE CARD -->
          <div class="flex flex-col mt-4">
            <div class="rounded aspect-w-6 aspect-h-3">
              <img class="object-cover object-top w-full h-full rounded" src="https://scontent.fcrk1-3.fna.fbcdn.net/v/t39.30808-6/311801979_477938484363566_7456364287445462973_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeFstvLAFFFkYxO-Fy3QIsVKUFt-5gtC15JQW37mC0LXkqquK62Lgbd8WeKY2EeegF1DfJcxRKNE4dv2gemkdhNN&_nc_ohc=L2DvKFmns2YAX9oz4F_&_nc_ht=scontent.fcrk1-3.fna&oh=00_AT-QxpkfOVj86RCQgqvuyeEDW_0kQgVw6m8hBnDd4wbszA&oe=6355D768" alt="" />
            </div>
            <div class="flex flex-col justify-between flex-1">
              <div class="flex-1">
                <p class="mt-3 text-xs font-semibold text-amber-600">
                  <a href="#" class=""> EDITORIAL </a>
                </p>
                <a href="#" class="block mt-1">
                  <p class="text-sm font-medium text-gray-900">The loss we needed</p>
                </a>
                <p class="mt-1 text-xs font-medium text-gray-600">
                  <a href="#" class=""> October 14, 2022 </a>
                </p>
              </div>
            </div>
          </div>
          <!-- ARTICLE CARD -->
          <div class="flex flex-col mt-4">
            <div class="rounded aspect-w-6 aspect-h-3">
              <img class="object-cover object-top w-full h-full rounded" src="https://scontent.fcrk1-3.fna.fbcdn.net/v/t39.30808-6/311801979_477938484363566_7456364287445462973_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeFstvLAFFFkYxO-Fy3QIsVKUFt-5gtC15JQW37mC0LXkqquK62Lgbd8WeKY2EeegF1DfJcxRKNE4dv2gemkdhNN&_nc_ohc=L2DvKFmns2YAX9oz4F_&_nc_ht=scontent.fcrk1-3.fna&oh=00_AT-QxpkfOVj86RCQgqvuyeEDW_0kQgVw6m8hBnDd4wbszA&oe=6355D768" alt="" />
            </div>
            <div class="flex flex-col justify-between flex-1">
              <div class="flex-1">
                <p class="mt-3 text-xs font-semibold text-amber-600">
                  <a href="#" class=""> EDITORIAL </a>
                </p>
                <a href="#" class="block mt-1">
                  <p class="text-sm font-medium text-gray-900">The loss we needed</p>
                </a>
                <p class="mt-1 text-xs font-medium text-gray-600">
                  <a href="#" class=""> October 14, 2022 </a>
                </p>
              </div>
            </div>
          </div>
          <!-- ARTICLE CARD -->
          <div class="flex flex-col mt-4">
            <div class="rounded aspect-w-6 aspect-h-3">
              <img class="object-cover object-top w-full h-full rounded" src="https://scontent.fcrk1-3.fna.fbcdn.net/v/t39.30808-6/311801979_477938484363566_7456364287445462973_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeFstvLAFFFkYxO-Fy3QIsVKUFt-5gtC15JQW37mC0LXkqquK62Lgbd8WeKY2EeegF1DfJcxRKNE4dv2gemkdhNN&_nc_ohc=L2DvKFmns2YAX9oz4F_&_nc_ht=scontent.fcrk1-3.fna&oh=00_AT-QxpkfOVj86RCQgqvuyeEDW_0kQgVw6m8hBnDd4wbszA&oe=6355D768" alt="" />
            </div>
            <div class="flex flex-col justify-between flex-1">
              <div class="flex-1">
                <p class="mt-3 text-xs font-semibold text-amber-600">
                  <a href="#" class=""> EDITORIAL </a>
                </p>
                <a href="#" class="block mt-1">
                  <p class="text-sm font-medium text-gray-900">The loss we needed</p>
                </a>
                <p class="mt-1 text-xs font-medium text-gray-600">
                  <a href="#" class=""> October 14, 2022 </a>
                </p>
              </div>
            </div>
          </div>
          <!-- ARTICLE CARD -->
          <div class="flex flex-col mt-4">
            <div class="rounded aspect-w-6 aspect-h-3">
              <img class="object-cover object-top w-full h-full rounded" src="https://scontent.fcrk1-3.fna.fbcdn.net/v/t39.30808-6/311801979_477938484363566_7456364287445462973_n.jpg?_nc_cat=100&ccb=1-7&_nc_sid=730e14&_nc_eui2=AeFstvLAFFFkYxO-Fy3QIsVKUFt-5gtC15JQW37mC0LXkqquK62Lgbd8WeKY2EeegF1DfJcxRKNE4dv2gemkdhNN&_nc_ohc=L2DvKFmns2YAX9oz4F_&_nc_ht=scontent.fcrk1-3.fna&oh=00_AT-QxpkfOVj86RCQgqvuyeEDW_0kQgVw6m8hBnDd4wbszA&oe=6355D768" alt="" />
            </div>
            <div class="flex flex-col justify-between flex-1">
              <div class="flex-1">
                <p class="mt-3 text-xs font-semibold text-amber-600">
                  <a href="#" class=""> EDITORIAL </a>
                </p>
                <a href="#" class="block mt-1">
                  <p class="text-sm font-medium text-gray-900">The loss we needed</p>
                </a>
                <p class="mt-1 text-xs font-medium text-gray-600">
                  <a href="#" class=""> October 14, 2022 </a>
                </p>
              </div>
            </div>
          </div>
        </div>


  </main>


  <div class="h-8"></div>

  <?php include './components/footer.php' ?>



</body>

<!-- Messenger Chat Plugin Code -->
<div id="fb-root"></div>

<!-- Your Chat Plugin code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

<div id="fb-root"></div>

<div id="fb-customer-chat" class="fb-customerchat"></div>

<script>
  var chatbox = document.getElementById('fb-customer-chat');
  chatbox.setAttribute("page_id", "109909348621946");
  chatbox.setAttribute("attribution", "biz_inbox");
</script>

<!-- Your SDK code -->
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v15.0'
    });
  };

  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>

</html>
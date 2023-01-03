<?php

require './../../configs/redirect.php';

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
  <meta property="og:image" content="./../../resources/uploads/contents/<?= ($leadVisual) ?>">
  <meta name="twitter:card" content="summary_large_image">
  <meta property="twitter:domain" content="https://www.cursorpub.me/">
  <meta property="twitter:url" content="https://www.cursorpub.me/">
  <meta name="twitter:title" content="<?= $title ?> | CURSOR eConnect">
  <meta name="twitter:description" content="<?= $leadText ?>">
  <meta name="twitter:image" content="./../../resources/uploads/contents/<?= ($leadVisual) ?>">
  <link rel="shortcut icon" href="./../../resources/favicon.svg" type="image/x-icon">

  <!-- STYLESHEETS AND SCRIPTS -->
  <link rel="stylesheet" href="./../../styles/style.css">
  <link rel="stylesheet" href="./../../styles/tailwind.css">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

  <!-- THEME COLOR -->
  <meta name="theme-color" content="#f59e0b">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black or black-translucent">
</head>

<body class="overflow-x-hidden bg-amber-500">

  <!-- NAVIGATION BAR -->
  <?php include './../components/ui/header.php' ?>

  <!-- LEAD VISUAL -->

  <div class="block h-16 "></div>

  <!-- ANNOUNCEMENT -->
  <div class="flex flex-col max-w-screen-md py-4 pl-0 pr-0 mx-auto sm:pl-5 sm:pr-16 xl:py-10">
    <div class="max-w-screen-md p-8 mx-auto my-auto rounded-lg bg-amber-50">
      <div class="flex text-xs font-medium text-gray-500 ">
        <a href="#" class="my-auto mr-2 font-bold tracking-widest hover:underline underline-offset-4 text-amber-500 decoration-amber-500"><?= strtoupper($section) ?></a>
        <span class="my-auto mr-2 tracking-wider">OCTOBER 14 2022</span>
      </div>
      <div class="block mt-2 mb-4 space-y-2 text-base leading-normal text-gray-900">
        <p class="font-bold"><?= $leadText ?></p>
        <p class=""><?= $content ?></p>
      </div>
      <div class="mt-8 aspect-w-1 aspect-h-1">
        <img class="object-cover object-top lg:rounded" src="./../../resources/uploads/contents/<?= ($leadVisual) ?>" />
      </div>

    </div>

    <div>

      <div class="flex flex-row justify-end gap-x-2">
        <button id="btn_shareFB" type="button" class="inline-flex items-center p-1 text-white transition border border-white rounded-full bg-amber-500 hover:bg-white hover:text-amber-500">
          <svg width="30" height="30" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="m18.393 16.258.355-2.335H16.53v-1.515c0-.639.31-1.262 1.303-1.262h1.01V9.158S17.926 9 17.051 9c-1.827 0-3.021 1.118-3.021 3.143v1.78H12v2.335h2.031v5.644a7.944 7.944 0 0 0 2.499 0v-5.644h1.863Z"></path>
          </svg>
        </button>
        <button id="btn_shareTW" type="button" class="inline-flex items-center p-1 text-white transition border border-white rounded-full bg-amber-500 hover:bg-white hover:text-amber-500">
          <svg width="30" height="30" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M20.608 13.49c.008.108.008.216.008.326 0 3.336-2.44 7.184-6.9 7.184v-.002A6.667 6.667 0 0 1 10 19.866c.192.024.384.036.577.037a4.747 4.747 0 0 0 3.011-1.083c-1.037-.02-1.947-.725-2.265-1.754.364.073.738.058 1.095-.043-1.131-.238-1.945-1.273-1.945-2.475v-.032c.337.195.714.304 1.1.316-1.065-.742-1.393-2.218-.75-3.371 1.231 1.577 3.047 2.536 4.997 2.637a2.594 2.594 0 0 1 .701-2.412 2.36 2.36 0 0 1 3.431.11 4.75 4.75 0 0 0 1.54-.613 2.518 2.518 0 0 1-1.066 1.396c.48-.059.95-.193 1.392-.397-.325.508-.735.95-1.21 1.307Z"></path>
          </svg>
        </button>
        <button id="btn_shareCL" type="button" class="inline-flex items-center p-1 text-white transition border border-white rounded-full bg-amber-500 hover:bg-white hover:text-amber-500">
          <svg width="30" height="30" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M14.187 21.112a3.044 3.044 0 0 1-4.299 0 3.044 3.044 0 0 1 0-4.299l2.388-2.388a3.044 3.044 0 0 1 4.299 0 .507.507 0 1 1-.717.717c-.8-.8-2.065-.8-2.865 0l-2.388 2.388c-.8.8-.8 2.065 0 2.865.8.8 2.065.8 2.865 0l2.269-2.268a.507.507 0 1 1 .716.716l-2.268 2.269Zm4.537-4.537a3.044 3.044 0 0 1-4.299 0 .506.506 0 1 1 .717-.717c.8.8 2.065.8 2.865 0l2.388-2.388c.8-.8.8-2.065 0-2.865-.8-.8-2.065-.8-2.865 0l-2.269 2.268a.507.507 0 1 1-.716-.716l2.268-2.269a3.044 3.044 0 0 1 4.299 0 3.044 3.044 0 0 1 0 4.299l-2.388 2.388Z"></path>
          </svg>
        </button>
      </div>

    </div>

  </div>


  <?php include './../components/relatedArticle.php'; ?>

  <?php include './../components/ui/footer.php' ?>

</body>

</html>
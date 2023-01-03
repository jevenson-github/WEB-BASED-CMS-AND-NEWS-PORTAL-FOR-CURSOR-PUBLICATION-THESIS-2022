<?php

require './../configs/dbConnect.php';

$section = strtolower($_GET['section']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- WEBPAGE META DATA -->
  <title><?= $section ?> | CURSOR eConnect</title>
  <meta name="description" content="<?= $leadText ?>">
  <meta property="og:url" content="https://www.cursorpub.me/">
  <meta property="og:type" content="website">
  <meta property="og:title" content="<?= $section ?> | CURSOR eConnect">
  <meta property="og:description" content="<?= $leadText ?>">
  <meta property="og:image" content="data:image/jpeg;base64,<?= base64_encode($leadVisual) ?>&quality=50">
  <meta name="twitter:card" content="summary_large_image">
  <meta property="twitter:domain" content="https://www.cursorpub.me/">
  <meta property="twitter:url" content="https://www.cursorpub.me/">
  <meta name="twitter:title" content="<?= $section ?> | CURSOR eConnect">
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

  <!-- FACEBOOK -->
  <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>

  <link rel="manifest" href="./manifest.json">
</head>

<body class="overflow-x-hidden">

  <div class="block h-4"></div>

  <!-- NAVIGATION BAR -->
  <?php include './components/ui/header.php' ?>
  <?php include './components/pageHeader_section.php' ?>

  <!-- SECTION BREAK -->
  <div class="h-8"></div>

  <!-- LATEST STORIES -->
  <div class="flex flex-col max-w-screen-xl px-4 mx-auto lg:flex-row">

    <div class="w-full h-full sm:basis-full shrink-0 group">

      <!-- LATEST ARTICLE BANNER -->
      <?php include './components/banner_latestContent.php' ?>
      
      <?php include './components/section_latestArticles.php' ?>

    </div>

    <!-- SECTION BREAK -->
    <div class="block h-0 xl:h-8"></div>

  </div>

  <!-- CATEGORIZED STORIES  -->
  <div class="flex w-full max-w-screen-xl px-4 mx-auto">
    <div class="flex flex-col w-full max-w-full mx-auto divide-y md:max-w-screen-md xl:mx-0">

      <?php

      // LATEST CONTENT FROM SELECTED SECTION //
      if ($section == "news") {
        $query = "SELECT *, coverage.title AS 'coverageTitle', contents.title AS 'contentsTitle', contents.leadVisual AS 'contentsLeadVisual'  FROM contents LEFT OUTER JOIN staffs ON contents.author = staffs.staffID LEFT JOIN coverage ON contents.coverage = coverage.fURL WHERE (section='News' OR section='Announcement') AND stage='Published' ORDER BY contents.timestamp DESC LIMIT 99999 OFFSET 3;";
      } elseif ($section == "features") {
        $query = "SELECT *, coverage.title AS 'coverageTitle', contents.title AS 'contentsTitle', contents.leadVisual AS 'contentsLeadVisual'  FROM contents LEFT OUTER JOIN staffs ON contents.author = staffs.staffID LEFT JOIN coverage ON contents.coverage = coverage.fURL WHERE (section='Features' OR section='Sports') AND stage='Published' ORDER BY contents.timestamp DESC LIMIT 99999 OFFSET 3;";
      } elseif ($section == "editorial") {
        $query = "SELECT *, coverage.title AS 'coverageTitle', contents.title AS 'contentsTitle', contents.leadVisual AS 'contentsLeadVisual'  FROM contents LEFT OUTER JOIN staffs ON contents.author = staffs.staffID LEFT JOIN coverage ON contents.coverage = coverage.fURL WHERE (section='Editorial' OR section='Opinion') AND stage='Published' ORDER BY contents.timestamp DESC LIMIT 99999 OFFSET 3;";
      } elseif ($section == "literary") {
        $query = "SELECT *, coverage.title AS 'coverageTitle', contents.title AS 'contentsTitle', contents.leadVisual AS 'contentsLeadVisual'  FROM contents LEFT OUTER JOIN staffs ON contents.author = staffs.staffID LEFT JOIN coverage ON contents.coverage = coverage.fURL WHERE section='Literary' AND stage='Published' ORDER BY contents.timestamp DESC LIMIT 99999 OFFSET 3;";
      }

      $result = mysqli_query($dbConnect, $query);

      while ($row = mysqli_fetch_assoc($result)) {

        if ($row['section'] == "News" && $row['coverage'] == "bulsu-cict") {
          include './components/link_contentBig.php';
        } elseif ($row['section'] == "Announcement") {
          include './components/announcementLink.php';
        } else {
          include './components/link_contentSmall.php';
        }
      }
      ?>


    </div>
  </div>


  <div class="h-8"></div>

  <?php include './components/ui/footer.php' ?>

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
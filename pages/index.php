<?php
require './../configs/dbConnect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- WEBPAGE META DATA -->
    <title>Home | CURSOR eConnect</title>
    <meta name="description" content="The Official Online News Portal of BulSU-CICT">
    <meta property="og:url" content="https://www.cursorpub.me/">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Home | CURSOR eConnect">
    <meta property="og:description" content="The Official Online News Portal of BulSU-CICT">
    <meta property="og:image" content="https://www.cursorpub.me/og-opengraph-v2.png">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="opengraph.xyz">
    <meta property="twitter:url" content="https://www.cursorpub.me/">
    <meta name="twitter:title" content="Home | CURSOR eConnect">
    <meta name="twitter:description" content="The Official Online News Portal of BulSU-CICT">
    <meta name="twitter:image" content="https://www.cursorpub.me/og-opengraph-v2.png">
    <link rel="shortcut icon" href="favicon.svg" type="image/x-icon">

    <!-- STYLESHEETS AND SCRIPTS -->
    <link rel="stylesheet" href="./../styles/style.css">
    <link rel="stylesheet" href="./../styles/tailwind.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- THEME COLOR -->
    <meta name="theme-color" content="#f59e0b">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black or black-translucent">

</head>

<body>

    <!-- NAVIGATION BAR -->
    <?php include './components/ui/header.php' ?>

    <!-- SECTION BREAK -->
    <div class="h-0 md:h-24"></div>


    <!-- SECTION BREAK -->
    <div class="h-8 md:hidden"></div>


    <!-- LATEST STORIES -->
    <section class="max-w-screen-xl px-4 mx-auto lg:px-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-y-4 gap-x-4">

            <?php include './components/homepage_latestContent.php' ?>

            <?php

            $query = "SELECT *, coverage.title AS 'coverageTitle', contents.title AS 'contentsTitle', contents.leadVisual AS 'contentsLeadVisual'  FROM contents LEFT OUTER JOIN staffs ON contents.author = staffs.staffID LEFT JOIN coverage ON contents.coverage = coverage.fURL WHERE section != 'Announcement' AND stage='Published' ORDER BY contents.timestamp DESC LIMIT 4 OFFSET 1;";
            $result = mysqli_query($dbConnect, $query);

            while ($row = mysqli_fetch_assoc($result)) {

            ?>

            <div class="flex flex-col overflow-hidden">
                <div class="object-cover overflow-hidden rounded aspect-w-6 aspect-h-3">
                    <img class="object-cover object-top w-full rounded h-36" src="./../resources/uploads/contents/<?= $row['contentsLeadVisual'] ?>" alt="" />
                </div>
                <div class="flex flex-col justify-between flex-1 bg-white">
                    <div class="flex-1">
                        <div class="inline-flex gap-1 mt-3">
                            <p class="text-xs font-semibold text-amber-600">
                            <a href="./section.php?section=<?= $row['section'] ?>" class="block mr-2 text-xs font-medium tracking-widest uppercase text-amber-500 hover:underline underline-offset-4 decoration-amber-500"><?= $row['section'] ?></a>
                            </p>
                               <span class="text-xs font-medium tracking-wider text-gray-600 uppercase lg:inline-block"><?= date("M j Y", strtotime($row['publishTimestamp'])) ?> </span>
                        </div>
                        <a href="./contents/<?= $row['section'] ?>.php?slug=<?= $row['slug'] ?>" class="inline-block mt-1 text-xl font-bold leading-tight text-gray-900 md:leading-tight group-hover:underline underline-offset-2 decoration-amber-500"><?= $row['contentsTitle'] ?></a>
                    </div>
                </div>
            </div>

            <?php } ?>

        </div>
    </section>

    <!-- SECTION BREAK -->
    <div class="h-8 sm:h-16"></div>

    <!-- CATEGORIZED STORIES  -->
  <div class="flex w-full max-w-screen-xl px-4 mx-auto">
    <div class="flex flex-col w-full max-w-full mx-auto divide-y md:max-w-screen-md xl:mx-0">

      <?php

$query = "SELECT *, coverage.title AS 'coverageTitle', contents.title AS 'contentsTitle', contents.leadVisual AS 'contentsLeadVisual'  FROM contents LEFT OUTER JOIN staffs ON contents.author = staffs.staffID LEFT JOIN coverage ON contents.coverage = coverage.fURL WHERE stage='Published' ORDER BY contents.timestamp DESC;";
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
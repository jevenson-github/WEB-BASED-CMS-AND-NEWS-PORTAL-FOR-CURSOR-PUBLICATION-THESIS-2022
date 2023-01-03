<?php

require './../configs/dbConnect.php';

$fURL = $_GET['fURL'];

// LATEST CONTENT FROM SELECTED SECTION //
$query = "SELECT * FROM coverage WHERE fURL = '$fURL'";
$result = mysqli_query($dbConnect, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $title = $row['title'];
    $description = $row['description'];
    $leadVisual = $row['leadVisual'];
}

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

    <!-- FACEBOOK -->
    <script async defer src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.2"></script>
</head>

<body class="overflow-x-hidden">

    <!-- NAVIGATION BAR -->
    <?php include './components/ui/header.php' ?>

    <!-- HEADER COVERAGE -->
    <?php include './components/pageHeader_coverage.php' ?>

    <div class="flex flex-col flex-none max-w-screen-xl px-8 mx-auto mt-8 xl:flex-row gap-x-16">

        <!-- COVERAGE NEWS  -->
        <div class="flex flex-col flex-initial max-w-screen-md mx-auto divide-y xl:mx-0">
            <?php
            $query = "SELECT * FROM contents LEFT OUTER JOIN staffs ON contents.author = staffs.staffID WHERE section='News' AND coverage='$fURL' AND stage='Published' ORDER BY contents.timestamp DESC";
            $result = mysqli_query($dbConnect, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                include './components/coverage_news.php';
            }
            ?>
        </div>

        <!-- COVERAGE LATEST ANNOUNCEMENT  -->
        <div class="max-w-md">
            <h2 class="mx-auto mb-4 font-semibold text-amber-500">Most recent from <?= $title ?></h2>
            <?php
            $query = "SELECT * FROM contents LEFT OUTER JOIN staffs ON contents.author = staffs.staffID WHERE section='Announcement' AND coverage='$fURL' AND stage='Published' ORDER BY contents.timestamp DESC LIMIT 1";
            $result = mysqli_query($dbConnect, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                include './components/coverage_latestAnnouncement.php';
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
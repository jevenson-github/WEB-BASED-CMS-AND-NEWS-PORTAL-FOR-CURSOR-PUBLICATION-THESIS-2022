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

    <div class="flex flex-row justify-center w-full max-w-screen-xl mx-auto gap-x-4">
        <a class="px-4 py-1 mb-3 font-semibold tracking-widest text-black uppercase rounded-full w-fit">Gallery</a>
        <a class="px-4 py-1 mb-3 font-semibold tracking-widest text-black uppercase rounded-full w-fit">Newsletter</a>
        <a class="px-4 py-1 mb-3 font-semibold tracking-widest text-black uppercase rounded-full w-fit">Videos</a>
    </div>

    <section id="section_multimediaGallery" class="hidden">

        <!-- SECTION BREAK -->
        <div class="h-8 md:hidden"></div>

        <!-- LATEST STORIES -->
        <section class="max-w-screen-xl px-4 mx-auto lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-y-8 gap-x-4">

                <?php

                $query = "SELECT * FROM videos ORDER BY videos.videoID DESC LIMIT 1;";
                $result = mysqli_query($dbConnect, $query);

                while ($row = mysqli_fetch_assoc($result)) {

                ?>

                    <div class="flex-col-reverse hidden col-span-4 lg:grid lg:grid-cols-12 lg:items-center lg:gap-x-8 md:flex">
                        <div class="flex flex-col justify-between h-full mt-6 lg:col-span-5 lg:col-start-8 lg:row-start-1 lg:mt-0 xl:col-span-4 xl:col-start-9">
                            <div class="mt-4">
                                <div class="mt-1 space-x-2 text-xs font-medium text-gray-300 capitalize">
                                    <span class="w-0 font-bold tracking-widest uppercase hover:underline underline-offset-4 text-amber-500 decoration-amber-500">LATEST</span>
                                </div>
                                <a href="./contents/<?= $section ?>.php?slug=<?= $slug ?>" class="block mt-2 text-2xl font-bold leading-tight text-gray-900 sm:text-3xl md:leading-tight group-hover:underline underline-offset-4 decoration-amber-500"><?= $row['video_title'] ?></a>
                                <div class="block mt-2 mb-4 space-y-2 text-base leading-normal text-gray-700 line-clamp-5"><?= $row['description'] ?></div>
                            </div>
                            <div class="mb-4 text-xs font-medium text-gray-500 capitalize">
                                <?php echo '<span class="my-auto tracking-wider lg:inline-block lg:mt-0.5 uppercase">' . date("M j Y", strtotime($row['timestamp'])) . '</span>'; ?>
                            </div>
                        </div>
                        <div class="flex-auto lg:col-span-7 lg:col-start-1 lg:row-start-1 xl:col-span-8">
                            <a href="./contents/<?= $section ?>.php?slug=<?= $slug ?>">
                                <div class="w-full overflow-hidden bg-cover rounded-lg h-80"> <?= $row['video_url'] ?> </div>
                            </a>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </section>

        <div class="flex flex-col flex-none max-w-screen-xl px-8 mx-auto mt-8 xl:flex-row gap-x-16">

            <!-- COVERAGE NEWS  -->
            <div class="flex flex-col flex-initial max-w-screen-md mx-auto divide-y xl:mx-0">
                <?php
                $query = "SELECT * FROM videos ORDER BY videos.videoID DESC LIMIT 9999 OFFSET 1 ;";
                $result = mysqli_query($dbConnect, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="flex flex-col py-4 pl-0 pr-0 sm:pl-5 sm:pr-16 xl:py-6 group">
                        <div class="pr-8 my-auto">
                            
                        </div>
                        <a class="flex-none my-auto w-max-32">
                            <?= $row['video_url'] ?>
                            <a class="inline-block mt-2 text-xl font-bold leading-tight text-gray-900 md:text-2xl md:leading-tight group-hover:underline underline-offset-2 decoration-amber-500"><?= $row['video_title'] ?></a>
                            <div class="mt-1 text-xs font-medium text-gray-500 uppercase ">
                                <span class="my-auto mr-2 tracking-wider lg:inline-block lg:mt-0.5"><?= date("M j Y", strtotime($row['timestamp'])) ?></span>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>

        </div>

    </section>

    <section id="section_multimediaNewsletter" class="">

        <!-- SECTION BREAK -->
        <div class="h-8 md:hidden"></div>

        <!-- LATEST STORIES -->
        <section class="max-w-screen-xl px-4 mx-auto lg:px-8">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-y-8 gap-x-4">

                <?php

                $query = "SELECT * FROM videos ORDER BY videos.videoID DESC LIMIT 1;";
                $result = mysqli_query($dbConnect, $query);

                while ($row = mysqli_fetch_assoc($result)) {

                ?>

                    <div class="flex-col-reverse hidden col-span-4 lg:grid lg:grid-cols-12 lg:items-center lg:gap-x-8 md:flex">
                        <div class="flex flex-col justify-between h-full mt-6 lg:col-span-5 lg:col-start-8 lg:row-start-1 lg:mt-0 xl:col-span-4 xl:col-start-9">
                            <div class="mt-4">
                                <div class="mt-1 space-x-2 text-xs font-medium text-gray-300 capitalize">
                                    <span class="w-0 font-bold tracking-widest uppercase hover:underline underline-offset-4 text-amber-500 decoration-amber-500">LATEST</span>
                                </div>
                                <a href="./contents/<?= $section ?>.php?slug=<?= $slug ?>" class="block mt-2 text-2xl font-bold leading-tight text-gray-900 sm:text-3xl md:leading-tight group-hover:underline underline-offset-4 decoration-amber-500"><?= $row['video_title'] ?></a>
                                <div class="block mt-2 mb-4 space-y-2 text-base leading-normal text-gray-700 line-clamp-5"><?= $row['description'] ?></div>
                            </div>
                            <div class="mb-4 text-xs font-medium text-gray-500 capitalize">
                                <?php echo '<span class="my-auto tracking-wider lg:inline-block lg:mt-0.5 uppercase">' . date("M j Y", strtotime($row['timestamp'])) . '</span>'; ?>
                            </div>
                        </div>
                        <div class="flex-auto lg:col-span-7 lg:col-start-1 lg:row-start-1 xl:col-span-8">
                            <a href="./contents/<?= $section ?>.php?slug=<?= $slug ?>">
                                <div class="w-full overflow-hidden bg-cover rounded-lg h-80"> <?= $row['video_url'] ?> </div>
                            </a>
                        </div>
                    </div>

                <?php } ?>

            </div>
        </section>

        <div class="flex flex-col flex-none max-w-screen-xl px-8 mx-auto mt-8 xl:flex-row gap-x-16">

            <!-- COVERAGE NEWS  -->
            <div class="flex flex-col flex-initial max-w-screen-md mx-auto divide-y xl:mx-0">
                <?php
                $query = "SELECT * FROM videos ORDER BY videos.videoID DESC LIMIT 9999 OFFSET 1 ;";
                $result = mysqli_query($dbConnect, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <div class="flex flex-col py-4 pl-0 pr-0 sm:pl-5 sm:pr-16 xl:py-6 group">
                        <div class="pr-8 my-auto">
                            
                        </div>
                        <a class="flex-none my-auto w-max-32">
                            <?= $row['video_url'] ?>
                            <a class="inline-block mt-2 text-xl font-bold leading-tight text-gray-900 md:text-2xl md:leading-tight group-hover:underline underline-offset-2 decoration-amber-500"><?= $row['video_title'] ?></a>
                            <div class="mt-1 text-xs font-medium text-gray-500 uppercase ">
                                <span class="my-auto mr-2 tracking-wider lg:inline-block lg:mt-0.5"><?= date("M j Y", strtotime($row['timestamp'])) ?></span>
                            </div>
                        </a>
                    </div>
                <?php
                }
                ?>
            </div>

        </div>

    </section>

    <!-- SECTION BREAK -->
    <div class="h-0 md:h-20 lg:h-24 xl:h-36"></div>

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
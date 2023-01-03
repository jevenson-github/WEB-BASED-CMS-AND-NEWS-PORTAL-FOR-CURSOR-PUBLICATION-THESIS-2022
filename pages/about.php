<?php

# PAGE DETAILS
$title = "About";

require './../configs/dbConnect.php';

#RANDOM IMAGES
$query = "SELECT image FROM editorialboard WHERE acadYear='2022-2023' AND position != 'Developer' ORDER BY RAND() LIMIT 8";
$result_rand_eb = mysqli_query($dbConnect, $query);

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
    <meta property="og:image" content="./../resources/uploads/contents/<?= ($leadVisual) ?>">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="https://www.cursorpub.me/">
    <meta property="twitter:url" content="https://www.cursorpub.me/">
    <meta name="twitter:title" content="<?= $title ?> | CURSOR eConnect">
    <meta name="twitter:description" content="<?= $leadText ?>">
    <meta name="twitter:image" content="./../resources/uploads/contents/<?= ($leadVisual) ?>">
    <link rel="shortcut icon" href="./../../resources/favicon.svg" type="image/x-icon">

    <!-- STYLESHEETS AND SCRIPTS -->
    <link rel="stylesheet" href="./../styles/style.css">
    <link rel="stylesheet" href="./../styles/tailwind.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- THEME COLOR -->
    <meta name="theme-color" content="#f59e0b">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black or black-translucent">
</head>

<body class="overflow-x-hidden">

    <?php include "./components/ui/header.php" ?>

    <div class="flex flex-row w-screen h-screen">
        <div class="z-10 flex flex-col w-full max-w-screen-xl mx-auto my-auto">
            <h2 class="justify-center w-full max-w-6xl mx-auto font-bold text-center text-7xl">With <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#e67e22] to-[#f39c12]">innovative minds</span> and <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f39c12] to-[#e67e22]">creative drive</span>, we empower youth through journalism.</h2>
            <p class="max-w-screen-md mx-auto mt-8 text-2xl text-center text-gray-700"><span class="font-bold">CURSOR Publication</span> is the official student publication of the College of Information and Communications Technology of Bulacan State University. Established in 2001, we have been a reliable source of news and information for the college for 2 decades.</p>
        </div>
    </div>

    <div class="flex w-screen bg-gray-50 h-fit border-y">
        <div class="flex justify-center w-full max-w-screen-xl mx-auto my-6 divide-x">
            <div class="flex flex-col justify-center px-16">
                <h6 class="text-6xl font-bold text-center">2001</h6>
                <span class="font-medium tracking-widest text-center uppercase">Founded</span>
            </div>
            <div class="flex flex-col justify-center px-16">
                <h6 class="text-6xl font-bold text-center">10+</h6>
                <span class="font-medium tracking-widest text-center uppercase">Partnerships</span>
            </div>
            <div class="flex flex-col justify-center px-16">
                <h6 class="text-6xl font-bold text-center">8000+</h6>
                <span class="font-medium tracking-widest text-center uppercase">Published Works</span>
            </div>
        </div>
    </div>

    <div class="h-32"></div>

    <div class="grid w-screen max-w-screen-xl grid-cols-2 mx-auto min-h-96">
        <div class="py-16 pr-16 my-auto ">
            <h2 class="mb-6 text-6xl font-bold">Who are we?</h2>
            <p class="text-xl text-gray-700">
                As a student publication, we provide accurate and reliable information free of any compromises for the student body. We also release issues such as newsletters, magazines, and literary folios. We inform, we produce, and we publish.
            </p>
            <a class="flex flex-col" href="./editorial-board.php">
                <button type="button" class="inline-flex mt-4 text-base font-medium rounded-md text-amber-600 ">
                    View Editorial Board
                
            </a>
            </button>

        </div>
        <div class="grid grid-cols-8 rounded-lg">


            <?php
            while ($row = mysqli_fetch_assoc($result_rand_eb)) {
            ?>
                <div class="w-full h-full bg-center bg-cover" style="background-image: url('./../resources/uploads/editorial-board/<?= $row['image'] ?>')"></div>
            <?php
            }
            ?>
        </div>
    </div>

    <div class="h-32"></div>
    '
    <div class="max-w-screen-xl mx-auto bg-center bg-no-repeat bg-cover rounded-lg" style="background-image: url('https://scontent.fcrk1-5.fna.fbcdn.net/v/t1.6435-9/52666701_2237440249641193_7078106481765122048_n.jpg?_nc_cat=104&ccb=1-7&_nc_sid=cdbe9c&_nc_eui2=AeErF8K292ybj6oYBRlMaZk1tnWtqo2_sqe2da2qjb-yp9_UPj00cXPuNKmhV89IRqjGT32o2QdKl1Px0FRBXZXW&_nc_ohc=wtSyDyA_QuwAX-Fbdt0&_nc_ht=scontent.fcrk1-5.fna&oh=00_AfAuDQTGODXzeemz2-gGVUYSLiKC1J5qKf9YjLx5htCnog&oe=63A8AEDC');">
        <div class="grid w-full h-full grid-cols-2 rounded-lg bg-gradient-to-tl from-amber-200 via-amber-50">
            <div></div>
            <div class="flex py-16 pl-24 pr-8">
                <div class="self-end h-fit">
                    <span class="tracking-widest text-gray-900 uppercase">10th Pandayang Plaridel</span>
                    <h2 class="mt-2 mb-6 text-6xl font-bold text-gray-900 uppercase">Overall Champion</h2>
                    <p class="text-xl text-gray-700">
                        In 2019, CURSOR Publication won the overall Collaborative Publishing gold medal. We also bagged the Best in News, Feature, and Layout awards.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="h-32"></div>

    <div class="grid w-screen max-w-screen-xl grid-cols-2 mx-auto h-fit">

        <div class="h-full py-16 pr-16 rounded-lg">
            <h2 class="mb-6 text-4xl font-bold">Get in touch with us</h2>
            <div class="flex flex-col space-y-4">
                <dl>
                    <dt class="text-sm font-medium tracking-widest text-gray-900 uppercase">We are located at</dt>
                    <dd class="mt-1 text-xl font-semibold">Student Centre, 4th Floor - Pimentel Hall, Bulacan State University, Guinhawa, Malolos, Bulacan</dd>
                </dl>
                <dl>
                    <dt class="text-sm font-medium tracking-widest text-gray-900 uppercase">Our office opens</dt>
                    <dd class="mt-1 text-xl font-semibold">Weekdays, 8:00 AM - 4:00 PM</dd>
                </dl>
                <dl>
                    <dt class="text-sm font-medium tracking-widest text-gray-900 uppercase">Text or call us at</dt>
                    <dd class="mt-1 text-xl font-semibold">0969 630 8822</dd>
                </dl>
                <dl>
                    <dt class="text-sm font-medium tracking-widest text-gray-900 uppercase">Send you inquiries at</dt>
                    <dd class="mt-1 text-xl font-semibold">cursor.publication@bulsu.edu.ph</dd>
                </dl>
                <dl>
                    <dt class="text-sm font-medium tracking-widest text-gray-900 uppercase">Follow us on Facebook and Instagram</dt>
                    <dd class="mt-1 text-xl font-semibold">@cursorpub</dd>
                </dl>
            </div>

        </div>

        <div class="grid w-full h-full grid-cols-8 bg-center bg-cover rounded-lg" style="background-image: url('48.jpg');">

        </div>

    </div>

    <div class="h-16"></div>

    <div class="w-screen bg-gradient-to-t from-amber-100 via-amber-50">
        <div class="grid w-full max-w-screen-xl grid-cols-4 py-16 mx-auto">
            <div class="col-span-3">
                <span class="font-medium tracking-widest text-gray-700 uppercase">We are looking for you!</span>
                <h2 class="mt-2 mb-4 text-6xl font-bold text-gray-900">Do you want to be a voice for the student body?</h2>
                <p class="max-w-xl text-xl text-gray-700">
                    If you're an aspiring journalist with innovative mind and creative drive. This is your chance to be one of us.
                </p>
                <button type="button" class="inline-flex items-center px-6 py-3 mt-6 text-base font-medium text-white border border-transparent rounded-md shadow-sm bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2">CURRENTLY CLOSED</button>

            </div>
        </div>

    </div>

    <?php include "./components/ui/footer.php" ?>




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
            xfbml: true,
            version: 'v15.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

</html>
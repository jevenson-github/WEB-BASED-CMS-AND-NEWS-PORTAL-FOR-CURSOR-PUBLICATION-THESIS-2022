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

<body class="overflow-x-hidden">

    <!-- NAVIGATION BAR -->
    <?php include './../components/ui/header.php' ?>

    <div class="block h-16"></div>

    <!-- LEAD VISUAL -->

    <!-- HEADER CONTENT -->
    <?php include './../components/pageHeader_sports.php'; ?>

    <div class="max-w-screen-xl mx-auto">

        <div class="flex flex-row justify-between">

            <article class="mx-8 prose max-w-prose prose-lead:font-normal prose-lead:text-3xl prose-lead:leading-snug">
                <p class="text-lg"><?= $content ?></p>
            </article>

            <div class="flex-initial mt-8 mr-8 w-fit">
                <?php include "./../components/recentStories.php" ?>
            </div>

        </div>

    </div>

    <?php include './../components/relatedArticle.php'; ?>

    <?php include './../components/ui/footer.php' ?>

</body>

</html>
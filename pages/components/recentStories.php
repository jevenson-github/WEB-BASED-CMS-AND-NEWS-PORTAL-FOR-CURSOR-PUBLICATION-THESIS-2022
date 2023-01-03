<?php

require './../../configs/dbConnect.php';

# LATEST NEWS
$query = "SELECT * FROM contents LEFT OUTER JOIN staffs ON contents.author = staffs.staffID WHERE section='News' AND stage='Published' AND slug != '$slug' ORDER BY contents.timestamp DESC LIMIT 1";
$result = mysqli_query($dbConnect, $query);
$latestNews = mysqli_fetch_assoc($result);

# LATEST FEATURES
$query = "SELECT * FROM contents LEFT OUTER JOIN staffs ON contents.author = staffs.staffID WHERE (section='Features' OR section='Sports') AND stage='Published' AND slug != '$slug' ORDER BY contents.timestamp DESC LIMIT 1";
$result = mysqli_query($dbConnect, $query);
$latestFeatures= mysqli_fetch_assoc($result);

# LATEST EDITORIAL
$query = "SELECT * FROM contents LEFT OUTER JOIN staffs ON contents.author = staffs.staffID WHERE (section='Editorial' OR section='Opinion') AND stage='Published' AND slug != '$slug' ORDER BY contents.timestamp DESC LIMIT 1";
$result = mysqli_query($dbConnect, $query);
$latestEditorial = mysqli_fetch_assoc($result);

# LATEST LITERARY
$query = "SELECT * FROM contents LEFT OUTER JOIN staffs ON contents.author = staffs.staffID WHERE section='Literary' AND stage='Published' AND slug != '$slug' ORDER BY contents.timestamp DESC LIMIT 1";
$result = mysqli_query($dbConnect, $query);
$latestLiterary = mysqli_fetch_assoc($result);

?>

<div class="w-full lg:max-w-xs h-fit">
    <h2 class="mx-auto font-semibold text-amber-500">Recent stories</h2>
    <!-- LATEST SUB-ENTRIES -->
    <div class="flex-col w-full max-w-screen-md mx-auto basis-full">

        <!-- NEWS -->
        <div class="flex justify-between py-4 pl-0 pr-0 group">
            <div class="my-auto">
                <a href="./../section.php?section=News" class="block mr-2 text-xs font-medium tracking-widest text-gray-500 capitalize hover:underline underline-offset-4 decoration-amber-500">NEWS</a>
                <a href="./../contents/news.php?slug=<?= $latestNews['slug']; ?>" class="inline-block mt-1 text-lg font-bold leading-tight text-gray-900 md:leading-tight group-hover:underline underline-offset-2 decoration-amber-500"><?= $latestNews['title']; ?></a>
                <div class="mt-1 text-xs font-medium text-gray-500 capitalize ">
                    <a href="./../staff.php?username=<?= $latestNews['username']; ?>" class="mr-2 tracking-widest uppercase hover:underline underline-offset-4 text-amber-500 decoration-amber-500 lg:inline-block"><?= $latestNews['fName'] . ' ' . $latestNews['lName']; ?></a>
                    <span class="my-auto mr-2 tracking-wider lg:inline-block lg:mt-0.5 uppercase"><?= date("M j Y", strtotime($latestNews['publishTimestamp'])) ?></span>
                </div>
            </div>
        </div>

        <hr class="w-full border border-b-gray-100">

        <!-- FEATURE -->
        <div class="flex justify-between py-4 pl-0 pr-0 group">
            <div class="my-auto">
                <a href="./../section.php?section=Features" class="block mr-2 text-xs font-medium tracking-widest text-gray-500 capitalize hover:underline underline-offset-4 decoration-amber-500">FEATURES</a>
                <a href="./../contents/news.php?slug=<?= $latestFeatures['slug']; ?>" class="inline-block mt-1 text-lg font-bold leading-tight text-gray-900 md:leading-tight group-hover:underline underline-offset-2 decoration-amber-500"><?= $latestFeatures['title']; ?></a>
                <div class="mt-1 text-xs font-medium text-gray-500 capitalize ">
                    <a href="./../staff.php?username=<?= $latestNews['username'] ?>" class="mr-2 tracking-widest uppercase hover:underline underline-offset-4 text-amber-500 decoration-amber-500 lg:inline-block"><?= $latestFeatures['fName'] . ' ' . $latestFeatures['lName']; ?></a>
                    <span class="my-auto mr-2 tracking-wider lg:inline-block lg:mt-0.5 uppercase"><?= date("M j Y", strtotime($latestFeatures['publishTimestamp'])) ?></span>
                </div>
            </div>
        </div>

        <hr class="w-full border border-b-gray-100">

        <!-- EDITORIAL -->
        <div class="flex justify-between py-4 pl-0 pr-0 group">
            <div class="my-auto">
                <a href="./../section.php?section=Editorial" class="block mr-2 text-xs font-medium tracking-widest text-gray-500 capitalize hover:underline underline-offset-4 decoration-amber-500">EDITORIAL</a>
                <a href="./../contents/editorial.php?slug=<?= $latestEditorial['slug']; ?>" class="inline-block mt-1 text-lg font-bold leading-tight text-gray-900 md:leading-tight group-hover:underline underline-offset-2 decoration-amber-500"><?= $latestEditorial['title']; ?></a>
                <div class="mt-1 text-xs font-medium text-gray-500 capitalize ">
                    <a href="./../staff.php?username=<?= $latestEditorial['username'] ?>" class="mr-2 tracking-widest uppercase hover:underline underline-offset-4 text-amber-500 decoration-amber-500 lg:inline-block"><?= $latestEditorial['fName'] . ' ' . $latestEditorial['lName']; ?></a>
                    <span class="my-auto mr-2 tracking-wider lg:inline-block lg:mt-0.5 uppercase"><?= date("M j Y", strtotime($latestEditorial['publishTimestamp'])) ?></span>
                </div>
            </div>
        </div>

        <hr class="w-full border border-b-gray-100">

        <!-- LITERARY -->
        <div class="flex justify-between py-4 pl-0 pr-0 group">
            <div class="my-auto">
                <a href="./../section.php?section=Literary" class="block mr-2 text-xs font-medium tracking-widest text-gray-500 capitalize hover:underline underline-offset-4 decoration-amber-500">LITERARY</a>
                <a href="./../contents/literary.php?slug=<?= $latestLiterary['slug']; ?>" class="inline-block mt-1 text-lg font-bold leading-tight text-gray-900 md:leading-tight group-hover:underline underline-offset-2 decoration-amber-500"><?= $latestLiterary['title']; ?></a>
                <div class="mt-1 text-xs font-medium text-gray-500 capitalize ">
                    <a href="./../staff.php?username=<?= $latestLiterary['username'] ?>" class="mr-2 tracking-widest uppercase hover:underline underline-offset-4 text-amber-500 decoration-amber-500 lg:inline-block"><?= $latestLiterary['fName'] . ' ' . $latestLiterary['lName']; ?></a>
                    <span class="my-auto mr-2 tracking-wider lg:inline-block lg:mt-0.5 uppercase"><?= date("M j Y", strtotime($latestLiterary['publishTimestamp'])) ?></span>
                </div>
            </div>
        </div>

        <hr class="w-full border border-b-gray-100">

    </div>
</div>
</div>
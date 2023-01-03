<?php

if  ($section == 'news') {
    $description = 'The latest news and announcements from the College of Information and Communications Technology.';
    } 
elseif ($section == 'features') {
    $description = 'The latest features and sports articles from the College of Information and Communications Technology.';
    } 
elseif ($section == 'editorial') {
    $description = 'The latest editorials and opinion pieces from the College of Information and Communications Technology.';
    }
    elseif ($section == 'literary') {
    $description = 'The latest literary articles from the College of Information and Communications Technology.';
}

?>

<div class="flex flex-col h-full bg-gradient-to-b from-amber-500 via-amber-500">
    <div class="flex flex-col h-full bg-gradient-to-t from-white via-white">

        <div class="flex flex-col-reverse w-full max-w-screen-xl mx-auto">

            <div class="mx-8">

                <div>
                    <h1 class="text-5xl font-bold text-gray-900 "><?= ucfirst($section) ?></h1>
                    <p class="mt-4 text-gray-700"><?= $description ?></p>
                    
                </div>

            </div>
            <div class="h-24"></div>
        </div>

    </div>
</div>
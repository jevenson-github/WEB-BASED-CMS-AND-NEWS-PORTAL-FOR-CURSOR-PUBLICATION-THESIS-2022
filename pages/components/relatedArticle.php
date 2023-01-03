<?php

$query = "SELECT * FROM contents WHERE slug != '$slug' AND section = '$section'  ORDER BY contents.timestamp DESC LIMIT 3";
$result = mysqli_query($dbConnect, $query);

?>

<div class="w-screen bg-gray-100">
    <div class="w-full max-w-screen-xl px-6 py-8 mx-auto lg:px-8">
        <h2 class="block">More from  <a  class="font-medium hover:underline decoration-1 underline-offset-4 " href="./../section.php?section=<?= $section ?>">CURSOR <?= $section ?></a></h2>

        <div class="flex flex-col mt-4 divide-y">
            <?php 
                while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="flex flex-row py-4 gap-x-5">
                <img class="ml-2.5 object-cover w-16 h-16 my-auto border" src="./../../resources/uploads/contents/<?= $row['leadVisual'] ?>">
                <a class="py-1 my-auto text-2xl md:text-3xl font-semibold leading-none hover:underline decoration-1 underline-offset-4 line-clamp" href="./../contents/<?= $row['section'] ?>.php?slug=<?= $row['slug']; ?>" ><?= $row['title'] ?></a>
            </div>
            <?php 
                }
            ?>
        </div>

    </div>
</div>
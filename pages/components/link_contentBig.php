<div class="flex flex-col py-4 pl-0 pr-0 sm:pl-5 sm:pr-16 xl:py-10 group">
    <a href="./contents/<?= $row['section'] ?>.php?slug=<?= $row['slug'] ?>">
        <img class="object-cover object-top w-full border rounded h-60 sm:h-64 md:h-72 lg:h-80 xl:h-96" src="./../resources/uploads/contents/<?= $row['contentsLeadVisual'] ?>">
    </a>
    <div class="my-auto mt-2">
        <?php
        if ($row['coverageTitle'] != null) {
            echo '<a href="./coverage.php?fURL=' . $row['fURL'] . '" class="mr-2 text-xs font-bold tracking-widest text-gray-500 uppercase hover:underline underline-offset-4 decoration-amber-500">' . $row['coverageTitle'] . '</a>';
        } else {
        }
        ?>
        <a href="./contents/<?= $row['section'] ?>.php?slug=<?= $row['slug'] ?>" class="block mt-2 text-xl font-bold leading-tight text-gray-900 md:text-2xl md:leading-tight group-hover:underline underline-offset-2 decoration-amber-500"><?= $row['contentsTitle'] ?></a>
        <p class="block mt-2 mb-4 space-y-2 text-base leading-normal text-gray-900"><?= $row['leadText'] ?></p>
        <div class="flex mt-2 text-xs font-medium text-gray-500 uppercase">
            <a href="./staff.php?username=<?= $row['username'] ?>" class="my-auto mr-2 tracking-widest hover:underline underline-offset-4 text-amber-500 decoration-amber-500"><?= $row['fName'] . " " . $row['lName'] ?></a>
            <span class="my-auto mr-2 tracking-wider"><?= date("M j Y", strtotime($row['publishTimestamp'])) ?></span>
        </div>
    </div>
</div>
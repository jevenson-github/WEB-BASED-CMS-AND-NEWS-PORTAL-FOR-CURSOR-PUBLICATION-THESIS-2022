<div class="flex justify-between py-4 pl-0 pr-0 sm:pl-5 sm:pr-16 xl:py-6 group">
    <div class="pr-8 my-auto">
        <a href="./contents/<?= $row['section'] ?>.php?slug=<?= $row['slug'] ?>" class="inline-block mt-2 text-xl font-bold leading-tight text-gray-900 md:text-2xl md:leading-tight group-hover:underline underline-offset-2 decoration-amber-500"><?= $row['title'] ?></a>
        <div class="mt-1 text-xs font-medium text-gray-500 uppercase ">
            <a href="./staff.php?username=<?= $row['username'] ?> " class="mr-2 tracking-widest hover:underline underline-offset-4 text-amber-500 decoration-amber-500 lg:inline-block"><?= $row['fName'] . " " . $row['lName'] ?></a>
            <span class="my-auto mr-2 tracking-wider lg:inline-block lg:mt-0.5"><?= date("M j Y", strtotime($row['publishTimestamp'])) ?></span>
        </div>
    </div>
    <a href="./contents/<?= $row['section'] ?>.php?slug=<?= $row['slug'] ?>" class="flex-none my-auto">
        <img class="object-cover object-top w-20 h-20 border rounded sm:h-48 sm:w-48 md:h-36 lg:w-64" src="./../resources/uploads/contents/<?= $row['leadVisual'] ?>" alt="" />
    </a>
</div>
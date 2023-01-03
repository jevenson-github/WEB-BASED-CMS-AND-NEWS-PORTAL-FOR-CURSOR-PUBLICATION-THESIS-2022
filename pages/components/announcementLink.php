<div class="flex py-4 pl-0 pr-0 sm:pl-5 sm:pr-16 xl:py-6 group">
    <div class="my-auto">
        <div class="flex text-xs font-medium text-gray-500 ">
            <?php
            if ($row['coverageTitle'] != null) {
                echo '<a href="./coverage.php?fURL=' . $row['fURL'] . '" class="mr-2 text-xs font-bold tracking-widest uppercase text-amber-500 hover:underline underline-offset-4 decoration-amber-500">' . $row['coverageTitle'] . '</a>';
            } else {
            }
            ?>
            <span class="mr-2 tracking-wider uppercase"> <?= date("M j Y", strtotime($row['publishTimestamp'])) ?> </span>
            <a href="./contents/<?= $row['section'] ?>.php?slug=<?= $row['slug'] ?>">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 text-gray-300 hover:text-amber-500">
                    <title>Open announcement</title>
                    <path fill-rule="evenodd" d="M4.25 5.5a.75.75 0 00-.75.75v8.5c0 .414.336.75.75.75h8.5a.75.75 0 00.75-.75v-4a.75.75 0 011.5 0v4A2.25 2.25 0 0112.75 17h-8.5A2.25 2.25 0 012 14.75v-8.5A2.25 2.25 0 014.25 4h5a.75.75 0 010 1.5h-5z" clip-rule="evenodd" />
                    <path fill-rule="evenodd" d="M6.194 12.753a.75.75 0 001.06.053L16.5 4.44v2.81a.75.75 0 001.5 0v-4.5a.75.75 0 00-.75-.75h-4.5a.75.75 0 000 1.5h2.553l-9.056 8.194a.75.75 0 00-.053 1.06z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
        <div class="w-full mt-2 mb-4 space-y-2 text-base leading-normal text-gray-900">
            <article class="prose prose-a:break-all"><?= $row['content'] ?> </article>
        </div>
        <img class="object-cover object-top w-full border rounded" src="./../resources/uploads/contents/<?= $row['contentsLeadVisual'] ?>" alt="" />
    </div>
</div>
<div class="grid grid-cols-1 gap-8 py-8 border-b md:grid-cols-2 ">
    <?php

    // LATEST CONTENT FROM SELECTED SECTION //
    $query = "SELECT *, coverage.title AS 'coverageTitle', contents.title AS 'contentsTitle', contents.leadVisual AS 'contentsLeadVisual'  FROM contents LEFT OUTER JOIN staffs ON contents.author = staffs.staffID LEFT JOIN coverage ON contents.coverage = coverage.fURL WHERE section='$section' AND stage='Published' ORDER BY contents.timestamp DESC LIMIT 2 OFFSET 1 ";
    $result = mysqli_query($dbConnect, $query);

    while ($row = mysqli_fetch_assoc($result)) {

    ?>

        <div class="flex flex-col">
            <img class="object-cover object-top w-full border rounded h-36 sm:h-40 md:h-44 lg:h-48 xl:h-52" src="./../resources/uploads/contents/<?= $row['contentsLeadVisual'] ?>">
            <div class="my-auto mt-2">
                <?php
                if ($row['coverageTitle'] != null) {
                    echo '<a href="./coverage.php?fURL=' . $row['fURL'] . '" class="mr-2 text-xs font-bold tracking-widest text-gray-500 uppercase hover:underline underline-offset-4 decoration-amber-500">' . $row['coverageTitle'] . '</a>';
                } else {
                }
                ?>
                <a href="./contents/<?= $row['section'] ?>.php?slug=<?= $row['slug'] ?>" class="block mt-2 text-xl font-bold leading-tight text-gray-900 md:text-2xl md:leading-tight hover:underline underline-offset-2 decoration-amber-500"><?= $row['contentsTitle'] ?></a>
                <p class="block mt-2 mb-4 space-y-2 text-base leading-normal text-gray-900 line-clamp-5"><?= $row['leadText'] ?></p>
                <div class="mt-1 text-xs font-medium text-gray-500 uppercase ">
                    <a href="./staff.php?username=<?= $row['username'] ?>" class="mr-2 tracking-widest hover:underline underline-offset-4 text-amber-500 decoration-amber-500 lg:inline-block"><?= $row['fName'] . " " . $row['lName'] ?></a>
                    <span class="my-auto mr-2 tracking-wider lg:inline-block lg:mt-0.5"><?= date("M j Y", strtotime($row['publishTimestamp'])) ?></span>
                </div>
            </div>
        </div>

    <?php
    }
    ?>

</div>
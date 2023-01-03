<?php

// LATEST CONTENT FROM SELECTED SECTION //
$query = "SELECT *, coverage.title AS 'coverageTitle', contents.title AS 'contentsTitle', contents.leadVisual AS 'contentsLeadVisual'  FROM contents LEFT OUTER JOIN staffs ON contents.author = staffs.staffID LEFT JOIN coverage ON contents.coverage = coverage.fURL WHERE section != 'Announcement' AND stage='Published' ORDER BY contents.timestamp DESC LIMIT 1 ";
$result = mysqli_query($dbConnect, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $fURL = $row['fURL'];
    $slug = $row['slug'];
    $coverageTitle = $row['coverageTitle'];
    $leadVisual = $row['contentsLeadVisual'];
    $title = $row['contentsTitle'];
    $leadText = $row['leadText'];
    $date = date("M j Y", strtotime($row['publishTimestamp']));
    $section = $row['section'];
}

?>

<div class="flex flex-col-reverse col-span-4 lg:grid lg:grid-cols-12 lg:items-center lg:gap-x-8">
    <div class="flex flex-col justify-between h-full mt-6 lg:col-span-5 lg:col-start-8 lg:row-start-1 lg:mt-0 xl:col-span-4 xl:col-start-9">
        <div class="mt-4">
            <div class="mt-1 space-x-2 text-xs font-medium text-gray-300 capitalize">
                <?php
                if ($coverageTitle != null) {
                    echo '<a href="./coverage.php?fURL=<?= $fURL ?>" class="w-0 font-bold tracking-widest uppercase hover:underline underline-offset-4 text-amber-500 decoration-amber-500">' . $coverageTitle . '</a>';
                } else {
                    echo '<span class="w-0 font-bold tracking-widest uppercase hover:underline underline-offset-4 text-amber-500 decoration-amber-500">LATEST</span>';
                }
                ?>
            </div>
            <a href="./contents/<?= $section ?>.php?slug=<?= $slug ?>" class="block mt-2 text-2xl font-bold leading-tight text-gray-900 sm:text-3xl md:leading-tight group-hover:underline underline-offset-4 decoration-amber-500"><?= $title ?></a>
            <div class="block mt-2 mb-4 space-y-2 text-base leading-normal text-gray-700 line-clamp-5"><?= $leadText ?></div>
        </div>
        <div class="mb-4 text-xs font-medium text-gray-500 capitalize">
            <?php echo '<span class="my-auto tracking-wider lg:inline-block lg:mt-0.5 uppercase">' . $date . '</span>'; ?>
        </div>
    </div>
    <div class="flex-auto lg:col-span-7 lg:col-start-1 lg:row-start-1 xl:col-span-8">
        <a href="./contents/<?= $section ?>.php?slug=<?= $slug ?>">
            <div class="w-full overflow-hidden bg-cover rounded-lg h-80" style="background-image: url('./../resources/uploads/contents/<?= $leadVisual ?>');"></div>
        </a>
    </div>
</div>
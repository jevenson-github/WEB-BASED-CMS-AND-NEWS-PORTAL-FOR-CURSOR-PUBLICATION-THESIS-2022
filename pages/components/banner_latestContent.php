<?php

// LATEST CONTENT FROM SELECTED SECTION //
$query = "SELECT *, coverage.title AS 'coverageTitle', contents.title AS 'contentsTitle', contents.leadVisual AS 'contentsLeadVisual'  FROM contents LEFT OUTER JOIN staffs ON contents.author = staffs.staffID LEFT JOIN coverage ON contents.coverage = coverage.fURL WHERE section='$section' AND stage='Published' ORDER BY contents.timestamp DESC LIMIT 1 ";
$result = mysqli_query($dbConnect, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $fURL = $row['fURL'];
    $slug = $row['slug'];
    $coverageTitle = $row['coverageTitle'];
    $leadVisual = $row['contentsLeadVisual'];
    $title = $row['contentsTitle'];
    $leadText = $row['leadText'];
    $date = date("F j Y", strtotime($row['publishTimestamp']));
}

?>

<div class="h-full bg-top bg-no-repeat bg-cover rounded min-h-[394px]" style="background-image: url('./../resources/uploads/contents/<?= $leadVisual ?>');">
    <div class="w-full h-full min-h-[394px] rounded bg-gradient-to-r from-gray-900">
        <div class="h-full mx-auto">
            <div class="flex flex-col justify-between w-3/4 min-h-[394px] p-12 md:w-2/4">
                <div>
                    <div class="mt-1 space-x-2 text-xs font-medium text-gray-300 capitalize">
                        <?php
                        if ($coverageTitle != null) {
                            echo '<a href="./coverage.php?fURL=<?= $fURL ?>" class="w-0 font-bold tracking-widest uppercase hover:underline underline-offset-4 text-amber-500 decoration-amber-500">' . $coverageTitle . '</a>';
                            echo '<span class="my-auto tracking-wider lg:inline-block lg:mt-0.5 uppercase"> ' . $date . ' </span>';
                        } else {
                            echo '<span class="w-0 font-bold tracking-widest uppercase hover:underline underline-offset-4 text-amber-500 decoration-amber-500">LATEST</span>';
                            echo '<span class="my-auto tracking-wider lg:inline-block lg:mt-0.5 uppercase">' . $date . '</span>';
                        }
                        ?>

                    </div>
                    <a href="./contents/<?= $section ?>.php?slug=<?= $slug ?>" class="block mt-2 text-2xl font-bold leading-tight text-gray-100 sm:text-3xl md:leading-tight group-hover:underline underline-offset-4 decoration-amber-500"><?= $title ?></a>
                    <div class="block mt-2 mb-4 space-y-2 text-base leading-normal text-gray-100 line-clamp-5"><?= $leadText ?></div>
                </div>
                <a href="./contents/<?= $section ?>.php?slug=<?= $slug ?>" class="inline-flex items-center mt-8 text-base font-semibold text-white w-fit group-hover:underline underline-offset-4 decoration-amber-500">
                    Read full story
                    <svg class="w-5 h-5 ml-2 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M3 10a.75.75 0 01.75-.75h10.638L10.23 5.29a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08l4.158-3.96H3.75A.75.75 0 013 10z" clip-rule="evenodd" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
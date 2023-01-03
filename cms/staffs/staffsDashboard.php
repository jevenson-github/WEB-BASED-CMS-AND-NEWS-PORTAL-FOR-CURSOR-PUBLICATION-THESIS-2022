<main class="flex-1 p-8">

    <div class="lg:flex lg:items-center lg:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-semibold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Editorial Board and Staffs</h2>
            <div class="flex flex-col mt-1 sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                <div class="flex items-center mt-2 text-sm text-gray-500">Manage the Publication's editorial board and its account permissions.</div>
            </div>
        </div>
        <div class="flex flex-row items-start gap-x-2">


            <div class="flex border rounded-lg bg-amber-100 h-fit border-amber-100">
                <label for="select_academicYear" class="px-4 my-auto text-sm border-r border-gray-300 whitespace-nowrap text-amber-600"> Academic Year </label>
                <select id="select_academicYear" name="select_academicYear" class="pl-4 text-sm font-medium text-gray-900 truncate bg-transparent border-0 focus:ring-amber-500 focus:rounded-lg">
                    <?php
                    require './../auth/dbConnect.php';

                    $query = "SELECT * FROM ebyear ORDER BY acadYear DESC";
                    $execute = mysqli_query($dbConnect, $query);

                    while ($rows = mysqli_fetch_array($execute)) { ?>
                        <option value="<?php echo $rows['acadYear']; ?>" <?php if ($rows['status'] == 'Active') {
                                                                                echo 'selected';
                                                                            }  ?>> <?php echo $rows['acadYear']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <button id="btn_staffs_invitePerson" type="button" class="inline-flex items-center px-4 py-2 text-sm text-white border border-transparent rounded-md h-fit bg-amber-600 hover:bg-amber-700">
                <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
                Invite person
            </button>

            <div>

            </div>
            <!-- <button type="button" class="inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                  <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                     <path d="M12.232 4.232a2.5 2.5 0 013.536 3.536l-1.225 1.224a.75.75 0 001.061 1.06l1.224-1.224a4 4 0 00-5.656-5.656l-3 3a4 4 0 00.225 5.865.75.75 0 00.977-1.138 2.5 2.5 0 01-.142-3.667l3-3z" />
                     <path d="M11.603 7.963a.75.75 0 00-.977 1.138 2.5 2.5 0 01.142 3.667l-3 3a2.5 2.5 0 01-3.536-3.536l1.225-1.224a.75.75 0 00-1.061-1.06l-1.224 1.224a4 4 0 105.656 5.656l3-3a4 4 0 00-.225-5.865z" />
                  </svg>
                  View
               </button>
               <button type="button" class="inline-flex items-center px-4 py-2 text-sm text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700">
                  <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                     <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                  </svg>
                  Add staff
               </button> -->
        </div>
    </div>

    <!-- STAFF STATISTICS -->
    <div class="mt-4">
        <dl class="grid grid-cols-1 gap-5 mt-5 sm:grid-cols-2 xl:grid-cols-4">
            <div class="px-4 py-5 overflow-hidden bg-white border border-gray-300 rounded-lg sm:p-6">
                <dt class="text-base font-medium text-gray-700">Total publication staffs</dt>
                <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
                    <h3 class="flex items-baseline text-3xl font-semibold text-gray-900" id="ebCurrentCount"><?php echo $ebCurrentCount ?></h3>

                    <?php
                    if ($ebDifferenceCount >= 0) {
                        echo '
                              <div id="visual_ebDifferenceCount" class="inline-flex items-baseline rounded-full bg-green-50 px-2.5 py-0.5 text-sm font-medium text-green-500 md:mt-2 lg:mt-0">
                                 <svg id="visual_Representation" class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.293 9.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 7.414V15a1 1 0 11-2 0V7.414L6.707 9.707a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                 </svg>
                                 <h4 id="ebDifferenceCount">' . $ebDifferenceCount . '% </h4>
                              </div>
                                 ';
                    } else if ($ebDifferenceCount < 0) {
                        echo '
                              <div id="visual_ebDifferenceCount" class="inline-flex items-baseline rounded-full bg-red-50 px-2.5 py-0.5 text-sm font-medium text-red-500 md:mt-2 lg:mt-0">
                                 <svg id="visual_Representation" class="-ml-1 mr-0.5 flex-shrink-0 self-center h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M14.707 10.293a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 111.414-1.414L9 12.586V5a1 1 0 012 0v7.586l2.293-2.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                 </svg>
                                 <h4 id="ebDifferenceCount">' . $ebDifferenceCount . '% </h4>
                              </div>
                                 ';
                    }
                    ?>

                </dd>
            </div>

            <div class="px-4 py-5 overflow-hidden bg-white border border-gray-300 rounded-lg sm:p-6">
                <dt class="text-base font-medium text-gray-700">Higher editorial board</dt>
                <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
                    <h3 class="flex items-baseline text-3xl font-semibold text-gray-900" id="hebCurrentCount"><?php echo $hebCurrentCount ?></h3>
                    <div class="flex -space-x-1 overflow-hidden">
                        <?php
                        $query = "SELECT DISTINCT(editorialboard.image) FROM staffs INNER JOIN editorialboard ON staffs.staffID = editorialboard.staffID INNER JOIN ebyear ON editorialboard.acadYear = ebyear.acadYear WHERE ebyear.status = 'Active' AND editorialboard.role = 'Higher Editorial Board' ORDER BY staffs.staffID ASC LIMIT 3;";
                        $result = $dbConnect->query($query);

                        while ($row = $result->fetch_assoc()) {
                        ?>

                            <img class="inline-block w-6 h-6 rounded-full ring-2 ring-white" src="./../../resources/uploads/editorial-board/<?= ($row['image']) ?>" alt="">

                        <?php } ?>
                        <div id="hebCurrentCountBadge" class="inline-flex items-center justify-center w-6 h-6 text-xs font-semibold rounded-full ring-2 ring-white bg-amber-50 text-amber-500"><?php echo '+' . $hebDifferenceCount ?></div>

                    </div>
                </dd>
            </div>

            <div class="px-4 py-5 overflow-hidden bg-white border border-gray-300 rounded-lg sm:p-6">
                <dt class="text-base font-medium text-gray-700">Section editor and head</dt>
                <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
                    <h3 class="flex items-baseline text-3xl font-semibold text-gray-900" id="sehCurrentCount"><?php echo $sehCurrentCount ?></h3>
                    <div class="flex -space-x-1 overflow-hidden">
                        <?php
                        $query = "SELECT DISTINCT(editorialboard.image) FROM staffs INNER JOIN editorialboard ON staffs.staffID = editorialboard.staffID INNER JOIN ebyear ON editorialboard.acadYear = ebyear.acadYear WHERE ebyear.status = 'Active' AND (editorialboard.role = 'Section Head' or editorialboard.role = 'Section Editor') ORDER BY staffs.staffID ASC LIMIT 3;";
                        $result = $dbConnect->query($query);

                        while ($row = $result->fetch_assoc()) {
                        ?>
        
                            <img class="inline-block w-6 h-6 rounded-full ring-2 ring-white" src="./../../resources/uploads/editorial-board/<?= ($row['image']) ?>" alt="">

                        <?php } ?>
                        <div id="sehCurrentCountBadge" class="inline-flex items-center justify-center w-6 h-6 text-xs font-semibold rounded-full ring-2 ring-white bg-amber-50 text-amber-500"><?php echo '+' . $sehDifferenceCount ?></div>

                    </div>
                </dd>
            </div>

            <div class="px-4 py-5 overflow-hidden bg-white border border-gray-300 rounded-lg sm:p-6">
                <dt class="text-base font-medium text-gray-700">Members and staffs</dt>
                <dd class="flex items-baseline justify-between mt-1 md:block lg:flex">
                    <h3 class="flex items-baseline text-3xl font-semibold text-gray-900" id="msCurrentCount"><?php echo $msCurrentCount ?></h3>
                    <div class="flex -space-x-1 overflow-hidden">
                        <?php
                        $query = "SELECT DISTINCT(editorialboard.image) FROM staffs INNER JOIN editorialboard ON staffs.staffID = editorialboard.staffID INNER JOIN ebyear ON editorialboard.acadYear = ebyear.acadYear WHERE ebyear.status = 'Active' AND editorialboard.role = 'Members and Staff' ORDER BY staffs.staffID ASC LIMIT 3;";
                        $result = $dbConnect->query($query);

                        while ($row = $result->fetch_assoc()) {
                        ?>
                            <img class="inline-block w-6 h-6 rounded-full ring-2 ring-white" src="./../../resources/uploads/editorial-board/<?= ($row['image']) ?>" alt="">
                        <?php } ?>
                        <div id="msCurrentCountBadge" class="inline-flex items-center justify-center w-6 h-6 text-xs font-semibold rounded-full ring-2 ring-white bg-amber-50 text-amber-500"><?php echo '+' . $msDifferenceCount ?></div>
                    </div>
                </dd>
            </div>

        </dl>
    </div>

    <div class="grid grid-cols-4 pb-8 mt-8 border-b border-gray-200 gap-x-8">
        <div class="pb-5">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Higher Editorial Board</h3>
            <p class="mt-2 text-sm text-gray-700">Higher Editorial Board can add and remove users and manage organization-level settings</p>
        </div>
        <div class="col-span-3 border divide-y rounded-lg">
            <!-- SEARCH BAR AND PAGINATION -->
            <div class="flex flex-row p-4 gap-x-4" id="bar_heb">
                <div class="relative flex-1 rounded-md">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" name="input_searchHEB" id="input_searchHEB" class="block w-full py-2 pl-10 text-sm border border-gray-300 rounded-md focus:border-amber-500 focus:ring-amber-500" placeholder="Search from Higher Editorial Board">

                </div>
                <div id="HEB_pagination">

                </div>
            </div>
            <div class="w-full p-4">
                <table id='' class='min-w-full overflow-hidden divide-gray-200'>
                    <thead class="border-b-2 border-gray-200">
                        <tr>
                            <th scope='col' class='w-2/5 px-6 pb-3 text-sm font-semibold text-left text-gray-700'>Staff</th>
                            <th scope='col' class='w-2/5 px-6 pb-3 text-sm font-semibold text-left text-gray-700'>Position</th>
                            <th scope='col' class='w-1/5 px-6 pb-3 text-sm font-semibold text-left text-gray-700'>Status</th>
                            <th scope='col' class='hidden px-6 py-3 text-sm font-semibold text-left text-gray-700'>Academic Year</th>
                            <th scope='col' class='relative px-6 py-3'>
                                <span class='sr-only'>Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id='table_HEB' class='bg-transparent divide-y divide-gray-200'>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-4 pb-8 mt-8 border-b border-gray-200 gap-x-8">
        <div class="pb-5">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Section Editors and Heads</h3>
            <p class="mt-2 text-sm text-gray-700">Higher Editorial Board can add and remove users and manage organization-level settings</p>
        </div>
        <div class="col-span-3 border divide-y rounded-lg">
            <!-- SEARCH BAR AND PAGINATION -->
            <div class="flex flex-row p-4 gap-x-4" id="bar_heb">
                <div class="relative flex-1 rounded-md">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" name="input_searchSEH" id="input_searchSEH" class="block w-full py-2 pl-10 text-sm border border-gray-300 rounded-md focus:border-amber-500 focus:ring-amber-500" placeholder="Search from Higher Editorial Board">

                </div>
            </div>
            <div class="w-full p-4">
                <table id='' class='min-w-full overflow-hidden divide-gray-200'>
                    <thead class="border-b-2 border-gray-200">
                        <tr>
                            <th scope='col' class='w-2/5 px-6 pb-3 text-sm font-semibold text-left text-gray-700'>Staff</th>
                            <th scope='col' class='w-2/5 px-6 pb-3 text-sm font-semibold text-left text-gray-700'>Position</th>
                            <th scope='col' class='w-1/5 px-6 pb-3 text-sm font-semibold text-left text-gray-700'>Status</th>
                            <th scope='col' class='hidden px-6 py-3 text-sm font-semibold text-left text-gray-700'>Academic Year</th>
                            <th scope='col' class='relative px-6 py-3'>
                                <span class='sr-only'>Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id='table_SEH' class='bg-transparent divide-y divide-gray-200'>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-4 pb-8 mt-8 border-b border-gray-200 gap-x-8">
        <div class="pb-5">
            <h3 class="text-lg font-medium leading-6 text-gray-900">Members and Staffs</h3>
            <p class="mt-2 text-sm text-gray-700">Members and staffs can add and remove users and manage organization-level settings</p>
        </div>
        <div class="col-span-3 border divide-y rounded-lg">
            <!-- SEARCH BAR AND PAGINATION -->
            <div class="flex flex-row p-4 gap-x-4" id="bar_heb">
                <div class="relative flex-1 rounded-md">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" name="input_searchMS" id="input_searchMS" class="block w-full py-2 pl-10 text-sm border border-gray-300 rounded-md focus:border-amber-500 focus:ring-amber-500" placeholder="Search from Higher Editorial Board">

                </div>
            </div>
            <div class="w-full p-4">
                <table id='' class='min-w-full overflow-hidden divide-gray-200'>
                    <thead class="border-b-2 border-gray-200">
                        <tr>
                            <th scope='col' class='w-2/5 px-6 pb-3 text-sm font-semibold text-left text-gray-700'>Staff</th>
                            <th scope='col' class='w-2/5 px-6 pb-3 text-sm font-semibold text-left text-gray-700'>Position</th>
                            <th scope='col' class='w-1/5 px-6 pb-3 text-sm font-semibold text-left text-gray-700'>Status</th>
                            <th scope='col' class='hidden px-6 py-3 text-sm font-semibold text-left text-gray-700'>Academic Year</th>
                            <th scope='col' class='relative px-6 py-3'>
                                <span class='sr-only'>Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody id='table_MS' class='bg-transparent divide-y divide-gray-200'>

                    </tbody>
                </table>
            </div>
        </div>
    </div>



</main>
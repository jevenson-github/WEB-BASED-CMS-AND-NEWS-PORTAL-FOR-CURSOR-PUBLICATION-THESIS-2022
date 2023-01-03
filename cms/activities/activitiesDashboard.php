
<main id="page-contents_dashboard" class="flex-1 p-8">
    <!-- to echo role or staff id  -->
    <?php //echo "Role : ".$_SESSION['role'].' | '.'Position : '. $_SESSION['position'].' Staff ID : '.$_SESSION['staffID'];  ?>
     
    <div class="lg:flex lg:items-center lg:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-semibold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Activities</h2>
            <div class="flex flex-col mt-1 sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                <div class="flex items-center mt-2 text-sm text-gray-500">Manage and track the Publication's contents within the CMS.</div>
            </div>
        </div>
        
                                                                              
        <?php if($_SESSION['position'] == 'Editor-in-Chief' || $_SESSION['position'] == 'Associate Editor' ){ ?>
        <div class="flex flex-row items-start gap-x-2">


            <form action="activityReport.php" method="POST" target="_blank"> 
            <button id="btn_content_generateReport" type="submit" name="generate" type="button" class="inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md h-fit hover:bg-gray-50">
                <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.75 2.75a.75.75 0 00-1.5 0v8.614L6.295 8.235a.75.75 0 10-1.09 1.03l4.25 4.5a.75.75 0 001.09 0l4.25-4.5a.75.75 0 00-1.09-1.03l-2.955 3.129V2.75z" />
                    <path d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z" />
                </svg>
                Generate report
            </button>   
                       
                        </form>

       
            
        </div>
        <?php }?>

    </div>


    <!-- <div class="flex justify-between mt-8 ">

        <div class="flex flex-row gap-x-4">
            <div class="flex flex-row gap-x-4" id="bar_seh">
                <div class="relative w-full max-w-xs rounded-md">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input type="text" name="input_searchSEH" id="searchvalue" onkeydown="return /[a-z0-9]/i.test(event.key)" class="block w-full py-2 pl-10 text-sm border border-gray-300 rounded-md focus:border-amber-500 focus:ring-amber-500" placeholder="Search    ">
                </div>
            </div>
                                
            <select id="category" name="addContent_section" class="w-full max-w-xs py-2 pl-3 pr-10 text-base border-gray-300 rounded-md h-fit focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
              
                                        
                                       
                                     <option value="">Category</option>
                                    <option value="Publish">Publish</option>
                                    <option value="Add">Add</option>
                                    <option value="Edit">Edit</option>
                                    <option value="Approve">Approve</option>
                                    <option value="Review">Review</option>
                                    <option value="Archive">Archive</option>
                     
                
            </select>
        </div>

    </div> -->

    <br><br><br><br>    
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table id="mytable" class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Timestamp</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Staff</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Description</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Action</th>
                                
                            </tr>
                        </thead>
                        <tbody class="divide-y">

                                

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</main>
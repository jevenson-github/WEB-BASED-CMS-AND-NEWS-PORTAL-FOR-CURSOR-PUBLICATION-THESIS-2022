<main class="flex-1 p-8">

    <div class="lg:flex lg:items-center lg:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-semibold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Newsletter</h2>
            <div class="flex flex-col mt-1 sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                <div class="flex items-center mt-2 text-sm text-gray-500">Manage and track the Publication's newsletter within the CMS.</div>
            </div>
        </div>
        <div class="flex flex-row items-start gap-x-2">

            <!-- <button id="btn_staffs_generateReport" type="button" class="inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md h-fit hover:bg-gray-50">
                <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.75 2.75a.75.75 0 00-1.5 0v8.614L6.295 8.235a.75.75 0 10-1.09 1.03l4.25 4.5a.75.75 0 001.09 0l4.25-4.5a.75.75 0 00-1.09-1.03l-2.955 3.129V2.75z" />
                    <path d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z" />
                </svg>
                Generate report
            </button> -->
                <a href="addFile.php">
            <button id="btn_addNewsLetter" type="button" class="inline-flex items-center px-4 py-2 text-sm text-white border border-transparent rounded-md h-fit bg-amber-600 hover:bg-amber-700">
                <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
                Add News Letter
            </button>
            </a>
        </div>


    </div>   

    <br><br><br><br>
  <!-- view pdf file  --> 
    <!-- <div class="grid grid-cols-4 gap-20">
      <?php   
       // $query = "SELECT * FROM newsletter";
        //$result = mysqli_query($dbConnect,$query);  
          //  while ($row = mysqli_fetch_assoc($result)) {   ?> 
            <div class=" border-b-2 border-amber-700 m-auto">
                
            <img  src='data:image/jpeg;base64,<?//= base64_encode( $row['thumbnail'])?>' alt="newsletter_thumbnail" style="width:300px;"> 
            <h3 class="text-base font-medium mt-10"><?php //echo $row['heading'];?></h3>
            <a  href="download.php?pdfFilename=<?php //echo $row['pdfFile']; ?>" target="_blank"><button class="button bg-amber-600  text-white p-2 mt-10  mb-8">View PDF</button></a>  
            </div>
        <?php // } ?>  
        </div> -->

 

                
        <div class="flex flex-col mt-12">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table id="mytable" class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-gray-50">
                            <tr>

                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Staff</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Title</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Version</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max"> </th>
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
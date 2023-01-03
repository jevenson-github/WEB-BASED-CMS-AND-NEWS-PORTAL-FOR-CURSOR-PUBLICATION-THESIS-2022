
<main id="page-contents_dashboard" class="flex-1 p-8">
    <!-- to echo role or staff id  -->
    <?php //echo "Role : ".$_SESSION['role'].' | '.'Position : '. $_SESSION['position'];  ?>
     
    <div class="lg:flex lg:items-center lg:justify-between">
        <div class="flex-1 min-w-0">
            <h2 class="text-2xl font-semibold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Content</h2>
            <div class="flex flex-col mt-1 sm:mt-0 sm:flex-row sm:flex-wrap sm:space-x-6">
                <div class="flex items-center mt-2 text-sm text-gray-500">Manage and track the Publication's contents within the CMS.</div>
            </div>
        </div>
        
        <div class="flex flex-row items-start gap-x-2">

            <!-- <button id="btn_content_generateReport" type="button" class="inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md h-fit hover:bg-gray-50">
                <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.75 2.75a.75.75 0 00-1.5 0v8.614L6.295 8.235a.75.75 0 10-1.09 1.03l4.25 4.5a.75.75 0 001.09 0l4.25-4.5a.75.75 0 00-1.09-1.03l-2.955 3.129V2.75z" />
                    <path d="M3.5 12.75a.75.75 0 00-1.5 0v2.5A2.75 2.75 0 004.75 18h10.5A2.75 2.75 0 0018 15.25v-2.5a.75.75 0 00-1.5 0v2.5c0 .69-.56 1.25-1.25 1.25H4.75c-.69 0-1.25-.56-1.25-1.25v-2.5z" />
                </svg>
                Generate report
            </button> -->
                 <!-- notif bell  -->
<div id="notif_bell" class="relative h-32 w-32 mt-2 ml-10">
                <div class="absolute left-0 top-0  rounded-full">
                <span class="count text-xs text-black p-1 bg-red-100 rounded-full">0</span>   
                </div>
        <div class="p-2"  >
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="text-gray-600 w-6 h-6" viewBox="0 0 16 16" >
                <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                </svg> 
        </div>
    </div>   


    <!-- Modal  Notification -->
    <div id="exampleModalScrollable" class="modal fade fixed right-10 z-50 w-96 hidden h-full outline-none overflow-x-hidden overflow-y-auto"   tabindex="-1" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable relative w-auto pointer-events-none">
    <div
      class="modal-content border-none shadow-lg relative flex flex-col w-full pointer-events-auto bg-white bg-clip-padding rounded-md outline-none text-current">
      <div
        class="modal-header flex flex-shrink-0 items-center justify-between p-4 border-b border-gray-200 rounded-t-md">
        <h5 class="text-xl font-medium leading-normal text-gray-800" id="exampleModalScrollableLabel">
         Notifications
        </h5>
      </div> 
      <!-- modal body  -->
      <div class="bodyMessage  modal-body relative p-4">


      </div>
      <!-- end modal body  --> 

    
    </div>
  </div>
</div>
<!-- end Modal Notification   -->


            <button id="btn_content_addContent" type="button" class="inline-flex items-center px-4 py-2 text-sm text-white border border-transparent rounded-md h-fit bg-amber-600 hover:bg-amber-700">
                <svg class="w-5 h-5 mr-2 -ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.75 4.75a.75.75 0 00-1.5 0v4.5h-4.5a.75.75 0 000 1.5h4.5v4.5a.75.75 0 001.5 0v-4.5h4.5a.75.75 0 000-1.5h-4.5v-4.5z" />
                </svg>
                Add entry
            </button> 

       


        </div>

    </div>

            <!-- Analytics  -->
 <div class="mt-10 "> 




<?php if($_SESSION['position'] == 'Editor-in-Chief' || $_SESSION['position'] == 'Associate Editor'  ) {  
  
      $allpublished = mysqli_query($dbConnect, "SELECT * FROM contents WHERE stage='Published'"); 
      $allpublished_Result  = mysqli_num_rows($allpublished); 

      $allunder_approval = mysqli_query($dbConnect, "SELECT * FROM contents WHERE stage='Upon Approval'"); 
      $allunder_approval_Result  = mysqli_num_rows($allunder_approval);
  ?> 

      

  <dl class="grid grid-cols-2 gap-5 mt-5 sm:grid-cols-2 md:grid-cols-2 w-full lg:grid-cols-2 xl:grid-cols-2">
      <div class="px-4 py-5 overflow-hidden bg-white  border  border-gray-300   rounded-lg sm:p-6"> 
          <dt class="font-medium text-gray-500 truncate text-md">Total Published Articles</dt>
          <dd class="mt-1 text-3xl font-bold text-gray-900"><?php echo $allpublished_Result ;?></dd>
      </div>

      <div class="px-4 py-5 overflow-hidden bg-white border border-gray-300 rounded-lg sm:p-6">
          <dt class="font-medium text-gray-500 truncate text-md">Upon Approval</dt>
          <dd class="mt-1 text-3xl font-bold text-gray-900"><?php echo  $allunder_approval_Result ;?></dd>
      </div> 

  </dl>


  <?php } else if($_SESSION['position'] != 'Editor-in-Chief' || $_SESSION['position'] != 'Associate Editor'){ 
                  
                  $section=''; 
                  $author= ''; 

                  $published_Result =''; 
                  $upon_approval_Result = ''; 
                  $under_review_result = ''; 
                  if($_SESSION['position'] == 'Literary Editor'){ 
                         

                          $published = mysqli_query($dbConnect,"SELECT * FROM contents WHERE stage='Published' AND section='Literary' ");
                          $published_Result = mysqli_num_rows($published); 

                          $approval= mysqli_query($dbConnect,"SELECT * FROM contents WHERE stage='Upon Approval' AND section='Literary' ");
                          $upon_approval_Result = mysqli_num_rows($approval);  
                          
                          $review= mysqli_query($dbConnect,"SELECT * FROM contents WHERE stage='Under Review' AND section='Literary' ");
                          $under_review_result = mysqli_num_rows($review);  

                  } else if($_SESSION['position'] == 'News and Current Affairs Editor'){

                        
                      $published = mysqli_query($dbConnect,"SELECT * FROM contents WHERE stage='Published' AND (section='News' OR section='Editorial' OR section='Announcement') ");
                      $published_Result = mysqli_num_rows($published); 

                      $approval= mysqli_query($dbConnect,"SELECT * FROM contents WHERE stage='Upon Approval' AND (section='News' OR section='Editorial' OR section='Announcement') ");
                      $upon_approval_Result = mysqli_num_rows($approval);  
                      
                      $review= mysqli_query($dbConnect,"SELECT * FROM contents WHERE stage='Under Review' AND (section='News' OR section='Editorial' OR section='Announcement') ");
                      $under_review_result = mysqli_num_rows($review);  
                  } else if($_SESSION['position'] == 'Feature Editor'){

                      $published = mysqli_query($dbConnect,"SELECT * FROM contents WHERE stage='Published' AND (section='Feature' OR section='Sports') ");
                      $published_Result = mysqli_num_rows($published); 

                      $approval= mysqli_query($dbConnect,"SELECT * FROM contents WHERE stage='Upon Approval' AND (section='Feature' OR section='Sports') ");
                      $upon_approval_Result = mysqli_num_rows($approval);  
                      
                      $review= mysqli_query($dbConnect,"SELECT * FROM contents WHERE stage='Under Review' AND (section='Feature' OR section='Sports') ");
                      $under_review_result = mysqli_num_rows($review);  

                  }else { 
                      $author = $_SESSION['staffID']; 

                      $published = mysqli_query($dbConnect,"SELECT * FROM contents WHERE stage='Published' AND author='$author' ");
                      $published_Result = mysqli_num_rows($published); 
                      
                      $approval= mysqli_query($dbConnect,"SELECT * FROM contents WHERE stage='Upon Approval' AND author='$author' ");
                      $upon_approval_Result = mysqli_num_rows($approval);  
                      
                      $review= mysqli_query($dbConnect,"SELECT * FROM contents WHERE stage='Under Review' AND author='$author' ");
                      $under_review_result = mysqli_num_rows($review);  

                  }
      
      ?> 

  <dl class="grid grid-cols-3 gap-5 mt-5 sm:grid-cols-3 md:grid-cols-3 w-full lg:grid-cols-3 xl:grid-cols-3"> 

              <div class="px-4 py-5 overflow-hidden bg-white border  border-gray-300  rounded-lg sm:p-6"> 
                  <dt class="font-medium text-gray-500 truncate text-md">Total Published Articles</dt>
                  <dd class="mt-1 text-3xl font-bold text-gray-900"><?php echo  $published_Result  ;?></dd>
              </div>

              <div class="px-4 py-5 overflow-hidden bg-white border border-gray-300 rounded-lg sm:p-6">
                  <dt class="font-medium text-gray-500 truncate text-md">Upon Approval</dt>
                  <dd class="mt-1 text-3xl font-bold text-gray-900"><?php echo $upon_approval_Result  ;?></dd>
              </div>

              <div class="px-4 py-5 overflow-hidden bg-white border border-gray-300 rounded-lg sm:p-6 ">
                  <dt class="font-medium text-gray-500 truncate text-md">Under Review</dt>
                  <dd class="mt-1 text-3xl font-bold text-gray-900"><?php echo $under_review_result ;?></dd> 
              </div>

  </dl>

 
<?php   }?>
 



</div>
<!-- Analytics  -->

    <div class="flex justify-between mt-8 ">

    <span class="relative z-0 inline-flex rounded-md shadow-sm">

                    <ul class="menu-status flex list-none">



                            <?php if($_SESSION['role'] == "Associate Editor" || $_SESSION['role'] =="Editor-in-Chief"){ ?>

                                <li>
                            <input type="radio" id="filterStatus_published" name="filterStatus" value="Published"
                                class="selectedLi  hidden peer" required>
                            <label for="filterStatus_published"
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 peer-checked:bg-amber-100 peer-checked:border-amber-600 peer-checked:text-amber-600 peer-checked:z-50 hover:text-gray-600">
                                Published
                            </label>
                        </li> 

                        <li>
                            <input type="radio" id="filterStatus_underReview" name="filterStatus" value="Upon Approval"
                                class="selectedLi hidden peer" required>
                            <label for="filterStatus_underReview"
                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 peer-checked:bg-amber-100 peer-checked:border-amber-600 peer-checked:text-amber-600 peer-checked:z-50 hover:text-gray-600">
                                Upon Approval
                            </label>
                        </li> 
                                <?php 
                            }else { ?>
                                <li>
                            <input type="radio" id="filterStatus_published" name="filterStatus" value="Published"
                                class="selectedLi  hidden peer" required>
                            <label for="filterStatus_published"
                                class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 peer-checked:bg-amber-100 peer-checked:border-amber-600 peer-checked:text-amber-600 peer-checked:z-50 hover:text-gray-600">
                                Published
                            </label>
                        </li> 

                        <li>
                            <input type="radio" id="filterStatus_underReview" name="filterStatus" value="Upon Approval"
                                class="selectedLi hidden peer" required>
                            <label for="filterStatus_underReview"
                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 peer-checked:bg-amber-100 peer-checked:border-amber-600 peer-checked:text-amber-600 peer-checked:z-50 hover:text-gray-600">
                                Upon Approval
                            </label>
                        </li> 

<li>
                            <input type="radio" id="filterStatus_draft" name="filterStatus" value="Under Review"
                                class="selectedLi hidden peer" required>
                            <label for="filterStatus_draft"
                                class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50 focus:z-10 focus:outline-none focus:ring-1 focus:ring-amber-500 focus:border-amber-500 peer-checked:bg-amber-100 peer-checked:border-amber-600 peer-checked:text-amber-600 peer-checked:z-50 hover:text-gray-600">
                               Under Review
                            </label>
                        </li>

                         <?php  } ?>

                        

                            
                        <?php  if($_SESSION['role']!= 'Section Editor' || $_SESSION['position'] !='Editor-in-Chief' ){ ?>
                        
                              
                        <?php }?>
                    </ul> 

                    <div class="flex flex-row gap-x-4  ml-4" id="bar_seh"> 

                        <div class=" relative w-full max-w-xs rounded-md">
                            <div class="absolute inset-y-0 left-0  z-20 flex items-center pl-3 pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                                    <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <input type="text" name="input_searchSEH" id="searchvalue" onkeydown="return /[a-z0-9]/i.test(event.key)" class="block w-full py-2 pl-10 text-sm border border-gray-300 rounded-md focus:border-amber-500 focus:ring-amber-500" placeholder="Search    ">
                        </div>
            </div>
                </span>

        <div class="flex flex-row gap-x-4">
           
                                
            <select id="category" name="addContent_section" class="w-full max-w-xs py-2 pl-3 pr-10 text-base border-gray-300 rounded-md h-fit focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                <!-- <option value="" selected>Section</option> -->
                        <?php if($_SESSION['position'] == 'Editor-in-Chief' || $_SESSION['position'] == 'Associate Editor' || $_SESSION['role'] == 'Higher Editorial Board' ||$_SESSION['role'] == 'Section Head' || $_SESSION['role'] == 'Members and Staff' ){

                                           ?>
                                     <option value="">Category</option>
                                    <option value="Announcement">Announcement</option>
                                    <option value="News">News</option>
                                    <option value="Feature">Feature</option>
                                    <option value="Sports">Sports</option>
                                    <option value="Editorial">Editorial</option>
                                    <option value="Literary">Literary</option>
                        <?php } ?> 


                        <?php  
                          if($_SESSION['position'] == 'Managing Editor for Administrations' || $_SESSION['position'] == 'Senior Managing Editor for Finance' || 
                          $_SESSION['position'] == 'Junior Managing Editor for Finance' || $_SESSION['position'] == 'Managing Editor for Research and Development' ||
                          $_SESSION['position'] == 'Managing Editor for Community Involvement'){ ?> 
                    
                                    <option value="">Category</option>
                                    <option value="Announcement">Announcement</option>
                                    <option value="News">News</option>
                                    <option value="Feature">Feature</option>
                                    <option value="Sports">Sports</option>
                                    <option value="Editorial">Editorial</option>
                                    <option value="Literary">Literary</option>

                        <?php  } ?>

                        <?php if($_SESSION['position'] == 'Feature Editor'){ ?>
                            <option value="">Category</option>
                            <option value="Feature">Feature</option>
                            <option value="Sports">Sports</option>
                            
                    <?php  }?>

                        <?php  if($_SESSION['position'] == 'News and Current Affairs Editor'){ ?>
                            <option value="">Category</option>
                            <option value="Announcement">Announcement</option>
                            <option value="News">News</option>
                            <option value="Editorial">Editorial</option>  
                        <?php  }?>                
                        
                        <?php   if($_SESSION['position'] == 'Literary Editor'){ ?>
                            <option value="">Category</option>
                            <option value="Literary">Literary</option>
                        <?php  } ?>
                
            </select> 


        </div>

    </div>

                            
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <div class="overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table id="mytable" class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Timestamp</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Title</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Author</th>
                                <th scope="col" class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase w-max">Status</th>
                                
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
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
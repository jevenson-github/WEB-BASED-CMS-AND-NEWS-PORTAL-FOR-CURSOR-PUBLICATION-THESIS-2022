<main id="page-contents_addContent" class="flex-1 hidden">
    <?php //echo "Role : ".$_SESSION['role'].' | '.'Position :'.$_SESSION['position'];  ?>
    <div class="flex flex-row w-full">

        <div class="w-full p-8">
            <div class="flex-1 min-w-0">
                <h5 id="wysiwyg_section" class="font-bold uppercase text-md text-amber-600">SECTION</h5>
                <h2 id="wysiwyg_title" class="mt-2 text-3xl font-medium leading-snug text-gray-900 sm:text-3xl sm:tracking-tight" contenteditable="true" placeholder="Title..."></h2>
                <h5 class="mt-2 text-sm font-medium text-gray-700">by <a id="wysiwyg_author" class="text-amber-600"><?php echo $_SESSION['fName'] . ' ' . $_SESSION['mName'] . ' ' .  $_SESSION['lName'] ?></a></h5>
                <h5 id="wysiwyg_timestamp" class="mt-1 text-sm text-gray-500">Published MMMM DD y at HH:mm A</h5>
            </div>
    
            <div class="flex items-center justify-center w-full mt-8" >
                <label id="ekek" for="wysiwyg_leadVisual" class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer h-96">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>

                        <p class="mb-2 text-sm text-gray-500"><span class="font-semibold">Click to upload</span> your lead visual</p>
                        <p class="text-xs text-gray-300">SVG, PNG, JPG or GIF</p>
                    </div>
                    <!-- image file  -->
                    <input id="wysiwyg_leadVisual"  onchange="preview(event)"  type="file" accept="image/png, image/gif, image/jpeg , image/svg , image/jpg " class="hidden " required />
                    <!-- end image file  -->
                </label>
                <img id="imagePreview" onclick="changeAgain()" class="flex flex-col items-center justify-center hidden object-cover w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer h-96" />
            </div>

            <div class="max-w-full mx-auto mt-8 prose">
            <article  id="wysiwyg_leadText" class="lead" contenteditable="true" placeholder="Lead text..."></article>
                <article id="wysiwyg_content" class="h-full" contenteditable="true" placeholder="Tell your story..."></article>
            </div>
        </div>


        <div class="flex-none w-full h-full max-w-sm max-h-screen py-8 pl-4 pr-8">

            <div class="flex flex-row-reverse mb-8 gap-x-2">
                <!-- submit content -->
               <button id="btn_addContent_submitContent" type="button" class="inline-flex items-center px-4 py-2 text-sm text-white border border-transparent rounded-md h-fit bg-amber-600 hover:bg-amber-700">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 -ml-1">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd" />
                    </svg>
                    Submit content
                </button>

                
                <!-- Save as Draft Will  -->
                <?php 
                if($_SESSION['role'] == 'Section Head' || $_SESSION['role'] == 'Members and Staff' || 
                   $_SESSION['position'] == 'Managing Editor for Administrations' || $_SESSION['position'] == 'Senior Managing Editor for Finance' || 
                   $_SESSION['position'] == 'Junior Managing Editor for Finance' || $_SESSION['position'] == 'Managing Editor for Research and Development' ||
                   $_SESSION['position'] == 'Managing Editor for Community Involvement' || $_SESSION['position'] == 'Developer') {  ?> 

                    <button id="btn_addContent_draftContent" type="button" class="inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md h-fit hover:bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 -ml-1">
                                <path fill-rule="evenodd" d="M4.25 2A2.25 2.25 0 002 4.25v11.5A2.25 2.25 0 004.25 18h11.5A2.25 2.25 0 0018 15.75V4.25A2.25 2.25 0 0015.75 2H4.25zM6 13.25V3.5h8v9.75a.75.75 0 01-1.064.681L10 12.576l-2.936 1.355A.75.75 0 016 13.25z" clip-rule="evenodd" />
                            </svg>
                            Save as draft
                        </button>
                <?php } else { ?>

                    <a href="index.php">
                    <button  type="button"  class="inline-flex items-center px-4 py-2 text-sm text-gray-700 bg-white border border-gray-300 rounded-md h-fit hover:bg-gray-50">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5 mr-2 -ml-1">
                                <path fill-rule="evenodd" d="M4.25 2A2.25 2.25 0 002 4.25v11.5A2.25 2.25 0 004.25 18h11.5A2.25 2.25 0 0018 15.75V4.25A2.25 2.25 0 0015.75 2H4.25zM6 13.25V3.5h8v9.75a.75.75 0 01-1.064.681L10 12.576l-2.936 1.355A.75.75 0 016 13.25z" clip-rule="evenodd" />
                            </svg>
                            Cancel
                        </button>
                        </a>

               <?php  }?>
                <!-- draft article  -->
               

            </div>

            <ul role="list" class="mt-4 space-y-4">

                <li class="hidden divide-y rounded-lg bg-gray-50">
                    <div class="flex items-center justify-between w-full p-4 space-x-6">
                        <div class="flex-1 ">
                            <div class="flex items-center justify-between">
                                <h3 class="font-medium text-gray-900 ">Draft</h3>
                                <button class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-900">
                                    View stages
                                </button>
                            </div>
                            <div class="flex flex-row mt-2">
                                <img class="flex-shrink-0 object-cover object-center w-8 h-8 my-auto bg-gray-300 rounded-full" src="./../../resources/uploads/editorial-board/<?php echo $_SESSION['image']; ?>" alt="" />
                                <p class="ml-3">
                                    <span class="block text-sm font-medium text-gray-900"> <?php echo $_SESSION['fName'] . " " . $_SESSION['mName'] . " " . $_SESSION['lName'] ?></span>
                                    <span class="block text-xs text-gray-700">Just now</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="hidden divide-y rounded-lg bg-green-50">
                    <div class="flex items-center justify-between w-full p-4 space-x-6">
                        <div class="flex-1 ">
                            <div class="flex items-center justify-between">
                                <h3 class="font-medium text-green-900 ">Published</h3>
                                <button class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-green-100 text-green-900">
                                    View stages
                                </button>
                            </div>
                            <div class="flex flex-row mt-2">
                                <img class="flex-shrink-0 object-cover object-center w-8 h-8 my-auto bg-gray-300 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt="" />
                                <p class="ml-3">
                                    <span class="block text-sm font-medium text-gray-900"> Marielle Jiean Teodoro </span>
                                    <span class="block text-xs text-gray-700"> November 14, 2022 - 12:59 AM</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </li>

                <li class="border border-gray-300 divide-y rounded-lg">
                    <div class="flex items-center justify-between w-full p-4 space-x-6">
                        <div class="flex-1">

                            <h3 class="font-medium text-gray-900 ">Content information</h3>

                            <div class="mt-4 space-y-4">
                                <div>
                                    <label for="addContent_slug" class="block text-sm font-medium text-gray-700">Slug</label>
                                    <div id="addContent_slug" name="addContent_slug" contenteditable="true" class="block w-full px-3 py-2 mt-1 text-base border border-gray-300 rounded-md focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                                    </div>
                                </div>

                                <div> 

                                    <label class="block text-sm font-medium text-gray-700">Section</label>
                                    <select id="addContent_section" name="addContent_section" class="block w-full py-2 pl-3 pr-10 mt-1 text-base border-gray-300 rounded-md focus:outline-none focus:ring-amber-500 focus:border-amber-500 sm:text-sm">
                                    <?php if($_SESSION['position'] == 'Editor-in-Chief' || $_SESSION['position'] == 'Associate Editor' || $_SESSION['role'] == 'Higher Editorial Board' ||$_SESSION['role'] == 'Section Head' || $_SESSION['role'] == 'Members and Staff'){

                                           ?>
                                    <option value=""></option>      
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

                                <?php  if($_SESSION['position'] == 'Feature Editor'){ ?>
                                    <option value=""></option>  
                                    <option value="Feature">Feature</option>
                                    <option value="Sports">Sports</option>

                                <?php  }?>

                                 <?php  if($_SESSION['position'] == 'News and Current Affairs Editor'){ ?>
                                    <option value=""></option>  
                                    <option value="Announcement">Announcement</option>
                                    <option value="News">News</option>
                                    <option value="Editorial">Editorial</option>  
                                <?php  }?>                
                        
                                <?php   if($_SESSION['position'] == 'Literary Editor'){ ?>
                                    <option value=""></option>  
                                    <option value="Literary">Literary</option>
                                 <?php  } ?>
                                

                                    </select>
                                </div>

                                <div>
                                   
                                </div>

                                <div class="flex flex-col gap-y-2">
                                
                                </div>


                            </div>

                        </div>
                    </div>
                </li>



    
            </ul>
        </div>
    </div>

</main>
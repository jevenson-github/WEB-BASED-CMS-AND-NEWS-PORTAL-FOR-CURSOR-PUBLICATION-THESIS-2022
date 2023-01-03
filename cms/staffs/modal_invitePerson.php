<!-- ADD STAFF MODAL -->
   <div id="modal_staffs_invitePerson" class="fixed inset-0 z-10 hidden overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
      <div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
         <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75 backdrop-blur-sm" aria-hidden="true"></div>
         <span class="hidden sm:inline-block sm:h-screen sm:align-middle" aria-hidden="true">&#8203;</span>
         <div class="inline-block px-4 pt-5 pb-4 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:w-full sm:max-w-lg sm:p-6 sm:align-middle">
            <div>
               <div class="">
                  <h3 class="text-lg font-semibold leading-6 text-gray-900">Invite person</h3>

                  <div>
                     <div class="mt-6">
                        <div class="flex justify-between">
                           <label class="text-sm font-medium text-gray-700">Name</label>
                           <label id="helper_addStaff_name" class="my-auto text-xs text-gray-500">First and last names are required.</label>
                        </div>
                        <div class="flex w-full mt-1 gap-x-2">
                           <input type="text" name="addStaff_fName" id="addStaff_fName" placeholder="First Name" autocomplete="off" class="block w-1/2 border-gray-300 rounded-md focus:border-amber-500 focus:ring-amber-500 sm:text-sm" />
                           <input type="text" name="addStaff_lName" id="addStaff_lName" placeholder="Last Name" autocomplete="off" class="block w-1/2 border-gray-300 rounded-md focus:border-amber-500 focus:ring-amber-500 sm:text-sm" />
                        </div>
                     </div>
                  </div>

                  <div class="mt-4">
                     <div class="flex justify-between">
                        <label class="text-sm font-medium text-gray-700">Email address</label>
                        <label id="helper_addStaff_email" class="my-auto text-xs text-gray-500">An institutional email address is required.</label>
                     </div>
                     <input type="email" name="addStaff_email" id="addStaff_email" placeholder="juan.delacruz.x@bulsu.edu.ph" autocomplete="off" class="block w-full mt-1 border-gray-300 rounded-md focus:border-amber-500 focus:ring-amber-500 sm:text-sm" />
                  </div>

                  <fieldset class="mt-4">
                     <div class="-space-y-px bg-white rounded-md">
                        <div class="flex justify-between mb-1">
                           <label class="text-sm font-medium text-gray-700">Role</label>
                           <label id="helper_addStaff_role" class="my-auto text-xs text-gray-500">Required</label>
                        </div>
                        <label class="relative flex p-4 border cursor-pointer rounded-tl-md rounded-tr-md focus:outline-none">
                           <input type="radio" id="addStaff_role" name="addStaff_role" value="Higher Editorial Board" class="mt-0.5 h-4 w-4 cursor-pointer border-gray-300 text-amber-500 focus:ring-amber-500" aria-labelledby="privacy-setting-0-label" aria-describedby="privacy-setting-0-description" />
                           <div class="flex flex-col ml-3">
                              <span class="block text-sm font-medium">Higher Editorial Board</span>
                              <span class="block text-sm">Full administrative access</span>
                           </div>
                        </label>
                        <label class="relative flex p-4 border cursor-pointer focus:outline-none">
                           <input type="radio" id="addStaff_role" name="addStaff_role" value="Section Editors and Heads" class="mt-0.5 h-4 w-4 cursor-pointer border-gray-300 text-amber-500 focus:ring-amber-500" aria-labelledby="privacy-setting-1-label" aria-describedby="privacy-setting-1-description" />
                           <div class="flex flex-col ml-3">
                              <span class="block text-sm font-medium">Section Editors and Heads</span>
                              <span class="block text-sm">Limited administrative access</span>
                           </div>
                        </label>
                        <label class="relative flex p-4 border cursor-pointer rounded-bl-md rounded-br-md focus:outline-none">
                           <input type="radio" id="addStaff_role" name="addStaff_role" value="Members and Staff" class="mt-0.5 h-4 w-4 cursor-pointer border-gray-300 text-amber-500 focus:ring-amber-500" aria-labelledby="privacy-setting-2-label" aria-describedby="privacy-setting-2-description" />
                           <div class="flex flex-col ml-3">
                              <span class="block text-sm font-medium">Members and Staffs</span>
                              <span class="block text-sm"> Standard access for content creation </span>
                           </div>
                        </label>
                     </div>
                  </fieldset>

                  <div class="hidden mt-4" id="addStaff_selectPositionHEB">
                     <div class="flex justify-between mb-1">
                        <label class="text-sm font-medium text-gray-700">Position</label>
                        <label id="helper_addStaff_positionHEB" class="my-auto text-xs text-gray-500">Required</label>
                     </div>
                     <select id="addStaff_positionHEB" name="addStaff_positionHEB" autocomplete="off" class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-md focus:border-amber-500 focus:outline-none focus:ring-amber-500 sm:text-sm">
                        <option value="Select a position for Higher Editorial Board">Select a position for Higher Editorial Board</option>
                        <option value="Editor-in-Chief">Editor-in-Chief</option>
                        <option value="Associate Editor">Associate Editor</option>
                        <option value="Mangaing Editor for Administration">Managing Editor for Administration</option>
                        <option value="Managing Editor for Community Involvement">Managing Editor for Community Involvement</option>
                        <option value="Managing Editor for Finance">Managing Editor for Finance</option>
                        <option value="Managing Editor for Research & Development">Managing Editor for Research & Development</option>
                     </select>
                  </div>

                  <div class="hidden mt-4" id="addStaff_selectPositionSEH">
                     <div class="flex justify-between mb-1">
                        <label class="text-sm font-medium text-gray-700">Position</label>
                        <label id="helper_addStaff_positionSEH" class="my-auto text-xs text-gray-500">Required</label>
                     </div>
                     <select id="addStaff_positionSEH" name="addStaff_positionSEH" autocomplete="off" class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-md focus:border-amber-500 focus:outline-none focus:ring-amber-500 sm:text-sm">
                        <option value="Select a position for Section Editors and Heads">Select a position for Section Editors and Heads</option>
                        <option value="Art Editor">Art Editor</option>
                        <option value="Feature and Lifestyle Editor">Feature and Lifestyle Editor</option>
                        <option value="Literary Editor">Literary Editor</option>
                        <option value="News & Current Affairs Editor">News and Current Affairs Editor</option>
                        <option value="Head Cartoonist">Head Cartoonist</option>
                        <option value="Head Layout Artist">Head Layout Artist</option>
                        <option value="Head Photojournalist">Head Photojournalist</option>
                        <option value="Head Video Editor">Head Video Editor</option>
                     </select>
                  </div>

                  <div class="hidden mt-4" id="addStaff_selectPositionMS">
                     <div class="flex justify-between mb-1">
                        <label class="text-sm font-medium text-gray-700">Position</label>
                        <label id="helper_addStaff_positionMS" class="my-auto text-xs text-gray-500">Required</label>
                     </div>
                     <select id="addStaff_positionMS" name="addStaff_positionMS" autocomplete="off" class="block w-full px-3 py-2 bg-white border border-gray-300 rounded-md focus:border-amber-500 focus:outline-none focus:ring-amber-500 sm:text-sm">
                        <option value="Select a position for Members and Staff">Select a position for Members and Staff</option>
                        <option value="Cartoonist">Cartoonist</option>
                        <option value="Layout Artist">Layout Artist</option>
                        <option value="Photojournalist">Photojournalist</option>
                        <option value="Sound Designer">Sound Designer</option>
                        <option value="Staff Writer">Staff Writer</option>
                        <option value="Video Editor">Video Editor</option>
                     </select>
                  </div>

               </div>
            </div>
            <div class="flex flex-row-reverse mt-6 gap-x-2">
               <button id="btn_addStaff_invite" type="button" class="inline-flex justify-center px-4 py-2 text-base font-medium text-white border border-transparent rounded-md w-fit bg-amber-600 hover:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 sm:col-start-2 sm:text-sm">Invite</button>
               <button id="btn_addStaff_cancel" type="button" class="inline-flex justify-center px-4 py-2 mt-3 text-base font-medium text-gray-700 bg-white border border-gray-300 rounded-md w-fit hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 sm:col-start-1 sm:mt-0 sm:text-sm">Cancel</button>
            </div>
         </div>
      </div>
   </div>
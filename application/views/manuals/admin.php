
<div class="content-wrapper">
   <div class="box box-default entry">
      <div>
         <div class="box-body">
            <div>
               <div class="box-header with-border" style="padding-left: 15px">
                  <i class="fa fa-file-text"></i>
                  <h3 class="box-title" style="text-align: center;">USERS MANUAL</h3>
               </div>
            </div>
            <div class="row">
               <div class="column">
                  <a href="<?php echo site_url('manuals/admin');?>" class='buttons button5'>Admin User's Manual</a>
                  <br>
                  <br>
                  <a href="<?php echo site_url('manuals/holdings');?>" class='buttons button5'>Holdings User's Manual</a>
                  <br>
               </div>
               <div class="column">
                  <a href="<?php echo site_url('manuals/acquisitions');?>" class='buttons button5'>Acquisitions User's Manual</a>
                  <br>
                  <br>
                  <a href="<?php echo site_url('manuals/circulations');?>" class='buttons button5'>Circulation User's Manual</a>
                  <br>
               </div>
               <div class="column">
                  <a href="<?php echo site_url('manuals/patron');?>" class='buttons button5'>Patron User's Manual</a>
                  <br>
                  <br>
                  <a href="<?php echo site_url('manuals/opac');?>" class='buttons button5'>OPAC User's Manual</a>
                  <br>
               </div>
            </div>
            <div class="box-header with-border" style="padding-left: 15px">
               <i class="fa fa-file-text"></i>
               <h3 class="box-title" style="text-align: center;">Administration and Security Module</h3>&nbsp;&nbsp;
  
               <a href="<?php echo base_url()."assets/manual/Manual_of_Admin_and Security.pdf"; ?>" download target="_blank">[DOWNLOAD ADMIN USER'S MANUAL]</a>
            </div>
            <div class="accordion" id="accordionExample">
               <div class="card">
                  <div class="thumbnail" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                     <h4>
                        <div class="thumbnail-description smaller">How to add a New Account</div>
                     </h4>
                  </div>
                  <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                     <div class="card-body">
                        1.	To Add a New Account, click the Account Management link on the Main Menu.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>AccountsMenu.png" width="250px" /></div>
                        <br>
                        2.	The User Accounts Management Page will be displayed, click the Add Account Button.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>AddAccountButton.png" width="90%" /></div>
                        3.	Fill out the Account Entry Form.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>FillOutForm.png" width="90%" /></div>
                        <div style="padding-left:5%">Note: Multiple Group can be selected</div>
                        4.	Once done, click the Submit button below the form.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>SubmitButton.png" width="400px%" /></div>
                     </div>
                  </div>
                </div>
               <div class="card">
                  <div class="thumbnail" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      <h4>
                        <div class="thumbnail-description smaller">How to edit an Account</div>
                      </h4>
                  </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                      <div class="card-body">
                        1. From the List of Accounts, click the username to be edited.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>AccountList.png" width="60%" /></div>
                        <br>
                        <br>
                        2. After the form was displayed, edit the necessary changes on the field.
                        <br>
                        <br>
                        3. Once done, click the Save button.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>AccountUpdate.png" width="70%" /></div>
                    </div>
                  </div>
                </div>
              
               <div class="card">
                  <div class="thumbnail" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                      <h4>
                        <div class="thumbnail-description smaller">How to add a Group</div>
                      </h4>
                  </div>
                  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                      <div class="card-body">
                        1.	To Add a New Group, click the Group Management link on the Main Menu.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>GroupMenu.png" width="250px" /></div>
                        <br>
                        <br>
                        2. The Group Management Page will be displayed, click the Add Group Button.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>AddGroup.png" width="50%" /></div>
                        <br>
                        <br>
                        3. Fill out the Group Entry Form.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>GroupEntry.png" width="80%" /></div>
                        <div style="padding-left:5%">Note: If "Single Access Group" is selected on the Group Status field, only one module is allowed to be added on the Module field</div>
                        <br>
                        <br>
                        4.	Once done, click the Submit button below the form.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>SubmitButton.png" width="40%" /></div>
                      </div>
                    </div>
               <div class="card">
                  <div class="thumbnail" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                      <h4>
                        <div class="thumbnail-description smaller">How to edit a Group</div>
                      </h4>
                  </div>
                  <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                      <div class="card-body">
                        1. From the List of Groups, click the Group Name to be edited.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>EditGroup.png" width="50%" /></div>
                        <br>
                        <br>
                        2. After the form was displayed, edit the necessary changes on the field.
                        <br>
                        <br>
                        3. Once done, click the Save button.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>GroupEditForm.png" width="70%" /></div>
                    </div>
                  </div>
                </div>
               <div class="card">
                  <div class="thumbnail" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                      <h4>
                        <div class="thumbnail-description smaller">How to delete a Group</div>
                      </h4>
                  </div>
                  <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                      <div class="card-body">
                        1. From the List of Groups, click the Group Name to be deleted.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>EditGroup.png" width="50%" /></div>
                        <br>
                        <br>
                        2. After the form was displayed, click the Delete Button.
                        <br>
                        <br>
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>GroupDeleteForm.png" width="70%" /></div>
                        <br>
                        <br>
                        3. A Confirm Box will appear, click OK.
                        <br>
                        <br>
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>ConfirmDelete.png" width="30%" /></div>
                    </div>
                  </div>
                </div>
               <div class="card">
                  <div class="thumbnail" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                      <h4>
                        <div class="thumbnail-description smaller">How to add a Member Agency</div>
                      </h4>
                  </div>
                  <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
                      <div class="card-body">
                        1.	To Add a Member Agency, click the Member Agencies link on the Main Menu.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>MemberMenu.png" width="250px" /></div>
                        <br>
                        <br>
                        2. The Member Agencies Management Page will be displayed, click the Add Agency Button.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>AddAgency.png" width="60%" /></div>
                        <br>
                        <br>
                        3. Fill out the Agency Entry Form.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>AgencyEntry.png" width="80%" /></div>
                        <div style="padding-left:5%">Note: AgencyID is a unique maximum of ten-alphanumeric reference ID to be used by the agency for its Library Management transactions.</div>
                        <br>
                        <br>
                        4.	Once done, click the Submit button below the form.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>SubmitButton.png" width="400px%" /></div>
                      </div>
                    </div>
               <div class="card">
                  <div class="thumbnail" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                      <h4>
                        <div class="thumbnail-description smaller">How to edit an Agency</div>
                      </h4>
                  </div>
                  <div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
                      <div class="card-body">
                        1. From the List of Agencies, click the Agency Name to be edited.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>AgencyList.png" width="60%" /></div>
                        <br>
                        <br>
                        2. After the form was displayed, edit the necessary changes on the field.
                        <br>
                        <br>
                        3. Once done, click the Save button.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>AgencyEditForm.png" width="70%" /></div>
                    </div>
                  </div>
                  </div>
               <div class="card">
                  <div class="thumbnail" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                      <h4>
                        <div class="thumbnail-description smaller">How to delete an Agency</div>
                      </h4>
                  </div>
                  <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
                      <div class="card-body">
                        1. From the List of Agencies, click the Agency Name to be deleted.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>AgencyList.png" width="60%" /></div>
                        <br>
                        <br>
                        2. After the form was displayed, click the Delete Button.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>AgencyDeleteForm.png" width="70%" /></div>
                        <br>
                        <br>
                        3. A Confirm Box will appear, click OK.
                        <br>
                        <br>
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>ConfirmDelete.png" width="30%" /></div>
                    </div>
                  </div>
                  </div>
               <div class="card">
                  <div class="thumbnail" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                      <h4>
                        <div class="thumbnail-description smaller">How to add a Module</div>
                      </h4>
                  </div>
                  <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionExample">
                      <div class="card-body">
                        1.	To Add a new Module, click the Module Management link on the Main Menu.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>ModulesMenu.png" width="250px" /></div>
                        <br>
                        <br>
                        2. The Module Management Page will be displayed, click the Add Module Button.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>AddModule.png" width="40%" /></div>
                        <br>
                        <br>
                        3. Fill out the Agency Entry Form.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>ModuleForm.png" width="80%" /></div>
                        <br>
                        <br>
                        4.	Once done, click the Submit button below the form.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>SubmitButton.png" width="400px%" /></div>
                      </div>
                    </div>
               <div class="card">
                  <div class="thumbnail" type="button" data-toggle="collapse" data-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                      <h4>
                        <div class="thumbnail-description smaller">How to edit a Module</div>
                      </h4>
                  </div>
                  <div id="collapseTen" class="collapse" aria-labelledby="headingsTen" data-parent="#accordionExample">
                      <div class="card-body">
                        1. From the List of Modules, click the Module ID to be edited.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>EditModule.png" width="40%" /></div>
                        <br>
                        <br>
                        2. After the form was displayed, edit the necessary changes on the field.
                        <br>
                        <br>
                        3. Once done, click the Save button.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>ModuleEntry.png" width="70%" /></div>
                    </div>
                  </div>
               <div class="card">
                  <div class="thumbnail" type="button" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                      <h4>
                        <div class="thumbnail-description smaller">How to delete a Module</div>
                      </h4>
                  </div>
                  <div id="collapseEleven" class="collapse" aria-labelledby="headingsEleven" data-parent="#accordionExample">
                      <div class="card-body">
                        1. From the List of Modules, click the Module ID to be edited.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>EditModule.png" width="40%" /></div>
                        <br>
                        <br>
                        2. After the form was displayed, click the Delete Button.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>ModuleDelete.png" width="70%" /></div>
                        <br>
                        <br>
                        3. A Confirm Box will appear, click OK.
                        <br>
                        <br>
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>ConfirmDelete.png" width="30%" /></div>
                    </div>
                  </div>
               <div class="card">
                  <div class="thumbnail" type="button" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                     <h4>
                        <div class="thumbnail-description smaller">How to add new Data Library</div>
                     </h4>
                  </div>
                  <div id="collapseTwelve" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                     <div class="card-body">
                        1.	To Add a New Data Library, click the Data Library link on the Main Menu.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>DataLibrarysMenu.png" width="250px" /></div>
                        <br>
                        <br>
                        2.	The Data Library Page will be displayed, then select an item from the drop down list where you want to add a data.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>FirstAddData.png" width="90%" /></div>
                        <br>
                        <br>
                        3.	After selecting an item, fill out the Data Entry Form that will appear below.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>DataLibEntry.png" width="90%" /></div>
                        <br>
                        <br>
                        4.	Once done, click the Submit button below the form.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>SaveDataLibEntry.png" width="90%" /></div>
                     </div>
                  </div>
                </div>
               <div class="card">
                  <div class="thumbnail" type="button" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                     <h4>
                        <div class="thumbnail-description smaller">How to edit a Data Library</div>
                     </h4>
                  </div>
                  <div id="collapseThirteen" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                     <div class="card-body">
                        1.	From Data Library Page, select an item from the drop down list where you want to edit a data.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>FirstAddData.png" width="90%" /></div>
                        <br>
                        <br>
                        2.	After selecting an item, a list of data library will be displayed. Select the ID of the data you want to edit.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>DataLibEdit.png" width="90%" /></div>
                        <br>
                        <br>
                        <div style="padding-left:5%">Note: Some data are prohibited to be edited / deleted</div>
                        <br>
                        3.	Edit the neccessary changes on the form that will appear below.
                        <br>
                        <br>
                        4.	Once done, click the Submit button below the form.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>SaveEditData.png" width="90%" /></div>
                     </div>
                  </div>
                </div>
               <div class="card">
                  <div class="thumbnail" type="button" data-toggle="collapse" data-target="#collapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                     <h4>
                        <div class="thumbnail-description smaller">How to delete a Data Library</div>
                     </h4>
                  </div>
                  <div id="collapseFourteen" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                     <div class="card-body">
                        1.	From Data Library Page, select an item from the drop down list where you want to delete a data.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>FirstAddData.png" width="90%" /></div>
                        <br>
                        <br>
                        2.	After selecting an item, a list of data library will be displayed. Select the ID of the data you want to delete.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>DataLibEdit.png" width="90%" /></div>
                        <br>
                        <div style="padding-left:5%">Note: Some data are prohibited to be edited / deleted</div>
                        <br>
                        <br>
                        3.	Click the Delete button below the form.
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>DeleteEditData.png" width="90%" /></div>
                        <br>
                        <br>
                        4. A Confirm Box will appear, click OK.
                        <br>
                        <br>
                        <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>ConfirmDelete.png" width="30%" /></div>
                    </div>
                     </div>
                  </div>
                </div>
            </div>
            </div>
           
           
         </div>
      </div>
   </div>
</div>



<style type="text/css">
 {
  box-sizing: border-box;
 }

  /* Create three equal columns that floats next to each other */
  .column {
    float: left;
    padding: 30px;
    margin-left: auto;
    margin-right: auto;
  }
  .row{
      width: 60%;
      margin-left: auto;
      margin-right: auto;
  }

  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  .buttons {
      background-color: #063375;
      border: none;
      color: white;
      padding: 20px;
      width:250px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      margin: 4px 2px;
    }
    .card-body{
      margin-left:5%;
      margin-right:5%;
      padding:20px;
    }
    .button5 {border-radius: 5%;}
    .thumbnail {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
    transition: 0.3s;
    min-width: 40%;
    border-radius: 5px;
    margin-left:4%;
    margin-right:4%;
  }

  .thumbnail-description {
    font-weight: normal;
      margin: auto;
      padding:.5%;
  }

  .thumbnail:hover {
    cursor: pointer;
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 1);
  }
  
  /* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 600px) {
    .column {
      width: 100%;
    }


  }
</style>
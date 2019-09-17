
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
                    <h3 class="box-title" style="text-align: center;">Circulation Module  </h3> 
                    <a href="<?php echo base_url()."assets/manual/Manual_of_Circulation.pdf"; ?>" download target="_blank">[DOWNLOAD CIRCULATION USER'S MANUAL]</a>
					      </div>
                <div class="accordion" id="accordionExample">
                    <div class="card">
                          <div class="thumbnail" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h4>
                              <div class="thumbnail-description smaller">Reservations</div>
                            </h4>
                          </div> 
                          <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                  1.	To Manage the Reservations, click the Reservations link under the Circulation Module on the Main Menu.
                                  <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>ReservationsMenu.png" width="250px" /></div>
                                  <br>
                                  <br>
                                  2.	The Client Reservations page will be displayed. To view the reserved materials by a client, click the button on the right side of the item 
                                  <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>ClientReserveButton.png" width="60%" /></div>
                                  <br>
                                  <br>
                                  3.	Once the reservations are served to the client, click the Serve button below.
                                  <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>ServeReservation.png" width="60%" /></div>
                                
                            </div>
                            </div>
                        </div>
                      </div> 
                    <div class="card">
                          <div class="thumbnail" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <h4>
                              <div class="thumbnail-description smaller">Returns</div>
                            </h4>
                          </div> 
                          <div id="collapseFour" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                            <div class="card-body">
                                  1.	To Manage client's returns, click the Retuns link under the Circulation Module on the Main Menu.
                                  <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>ReturnsButton.png" width="250px" /></div>
                                  <br>
                                  <br>
                                  2.	The Return Material page will be displayed. To view the client's borrowed materials, click the Details Button 
                                  <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>ReturnsList.png" width="60%" /></div>
                                  <br>
                                  <br>
                                  3.	On the list of borrowed materials, tick the checkbox of the material that the client have returned. Once done, click the Accept Return Button
                                  <div style="text-align: center"> <br><img src="<?php echo base_url()."assets/images/manual/"; ?>AcceptReturn.png" width="60%" /></div>
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
    margin-left:3%;
   margin-right:3%;
    padding:20px;
  }
  .button5 {border-radius: 5%;}
  .thumbnail {
   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
   transition: 0.3s;
   min-width: 40%;
   border-radius: 5px;
   margin-left:3%;
   margin-right:3%;
 }

 .thumbnail-description {
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
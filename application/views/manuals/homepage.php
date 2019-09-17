
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
                        <a href="<?php echo site_url('manuals/admin');?>" class='button button5'>Admin User's Manual</a>
                        <br>
                        <br>
                        <a href="<?php echo site_url('manuals/holdings');?>" class='button button5'>Holdings User's Manual</a>
                        <br>
                    </div>
                    <div class="column">
                        <a href="<?php echo site_url('manuals/acquisitions');?>" class='button button5'>Acquisitions User's Manual</a>
                        <br>
                        <br>
                        <a href="<?php echo site_url('manuals/circulations');?>" class='button button5'>Circulation User's Manual</a>
                        <br>
                    </div>
                    <div class="column">
                        <a href="<?php echo site_url('manuals/patron');?>" class='button button5'>Patron User's Manual</a>
                        <br>
                        <br>
                        <a href="<?php echo site_url('manuals/opac');?>" class='button button5'>OPAC User's Manual</a>
                        <br>
                    </div>
                </div>
			</div>
		</div>	
	</div>

	<!-- <div class="box-footer">
	</div> -->
</div>



<style type="text/css">
 {
  box-sizing: border-box;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  padding: 30px;
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
.button {
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
  .button5 {border-radius: 5%;}
 

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
  }


}
</style>
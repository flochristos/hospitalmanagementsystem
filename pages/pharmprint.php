<?php include_once "./includes/header.php" ?>
<?php
if(!isset($_SESSION["orderid"])){
  header ('location: login.php');
}else{
 $pname = $_SESSION["pname"]; 
 $pdes = $_SESSION["pdes"]; 
 $pdate = $_SESSION["pdate"]; 
 $orderid = $_SESSION["orderid"];
}

?>
<div style="height: 100px"></div>
 <div class="container">
     <div class="row">
     	<div class="col-sm-12">
  	 	 <div class="infoboxt" style="background-color:white; border-color: #283c4c;border-radius: 20px !important; padding: 0px; border: 1px solid #283c4c; padding: 20px;">
    			<h5 style="background-color:#283c4c;color: white; text-align: center;"> Patient Pharmacy Drug Prescription Slip </h5>
    			<div class="table-responsive"  style="padding: 0px;">
                      	<small>
                                <table class="table v-middle" id="myTable" >
                                    <thead>
                                        <tr>
                                        	<th class="border-top-0" style="text-align: center;"><b>Details</b></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<tr>
                                        	<td><center>Order ID: <b><?php echo($orderid); ?></b> </center></td>
                                        </tr>
                                        <tr>
                                        	<td><center>Drug Name: <b><?php echo($pname); ?> </b>  </center></td>
                                        </tr>
                                        <tr>
                                        	<td><center>Drug Description: <b><?php echo($pdes); ?></b> </center></td>
                                        </tr>
                                        <tr>
                                        	<td><center>Date: <b><?php echo($pdate); ?></b> </center></td>
                                        </tr>
										
                                    </tbody>
                                </table>
                                	<tr><center>
											<td>----------------------------</td> 
											<td>---------------------------</td>
										</center></tr>
							<tr> <center>
											<small><td>Patient Signature</td> 
											<td style="text-align: right; padding: 20px">Pharmacist Signature</td></small></tr></center>
                            </small>
                            </div><br>
                            <center><a href="" class="btn btn-primary" style="color: white !important;">Print</a></center>
                               
                        </div>
                     </div>
    		</div>
    	</div>
    </div>
</div>

<?php include_once './includes/footer.php';?>

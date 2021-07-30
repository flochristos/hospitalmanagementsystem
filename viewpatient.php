<?php include_once "./includes/header.php" ?>
<?php include_once "./includes/sidebar.php" ?>

<?php
  if(isset($_GET['ide'])){
 $coode = $_GET['ide'];
}


             
                   // mysqli select query
                   $products = $db->query("SELECT name, email, nhis_no, diagnosis, treatment, admission, next_of_kin, next_of_kin_phone_number, patient_consent, doctor_comment FROM patients WHERE id='$coode'");
                   while($row = $products->fetch_assoc()){
                        $name = $row["name"];
                        $email = $row["email"];
                        $nhis_no = $row["nhis_no"];
                        $diagnosis = $row["diagnosis"];
                        $treatment = $row["treatment"];
                        $admission = $row["admission"];
                        $next_of_kin = $row["next_of_kin"];
                        $next_of_kin_phone_number = $row["next_of_kin_phone_number"];
                        $patient_consent = $row["patient_consent"];
                        $doctor_consent = $row["doctor_comment"];

                      }
?>
        <div class="preloader">
             <svg class="circular" viewBox="25 25 50 50">
             <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
        </div>
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">View Patients</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Patients</li>
                            <li class="breadcrumb-item active"><a href="managepatient.php">Manage Patient</a></li>
                            <li class="breadcrumb-item active">View/Edit Patient</li>
                        </ol>
                    </div>
                    
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-block">
                                <div class="row">
          <div class="col-lg-12">
            <section class="panel">
              <header class="panel-heading">
                Update Patient Details

                <?php
                  if(isset($_POST['subbtn'])){
                      //the values in the boxes
                          $name = $_POST['fname'];
                          $email = $_POST['email'];  
                          $nhis_no = $_POST['nhis_no'];  
                          $diagnosis = $_POST['diagnosis']; 
                          $treatment = $_POST['treatment'];
                          $admission = $_POST['admission'];
                          $next_of_kin = $_POST['next_of_kin'];
                          $next_of_kin_phone_number = $_POST['next_of_kin_phone_number'];
                          $patient_consent = $_POST['patient_consent'];
                          $doctor_consent = $_POST['doctor_consent'];

                  $sql = "UPDATE patients SET name='$name', email='$email', nhis_no='$nhis_no', diagnosis='$diagnosis', treatment='$treatment', admission='$admission', next_of_kin='$next_of_kin', next_of_kin_phone_number='$next_of_kin_phone_number', patient_consent='$patient_consent', doctor_comment='$doctor_consent' WHERE id='$coode'";

                if($db->query($sql)== TRUE){
                    ?><div class="container"  id="validatn">
                                                <div class="alert alert-success alert-dismissible">
                                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                  <strong>Success!</strong> Patient Updated Successfully.
                                                </div> 
                                              </div>
                                              <?php
                                              
                }else
                {
                    ?><div class="container"  id="validatn">
                                                <div class="alert alert-danger alert-dismissible">
                                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                  <strong>Error!</strong> Kindly check your Update Entry!
                                                </div> 
                                              </div>
                                              <?php
                }

                  }
                ?>
              </header><hr>
              <div class="panel-body">
                <div class="form">
                  <form class="form-validate form-horizontal " id="register_form" method="post" action="">
                    <div class="form-group ">
                      <label for="fullname" class="control-label col-lg-2">Full Name <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="fullname" name="fname" type="text" required="required" value="<?php echo($name); ?>" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="email" name="email" type="email"  required="required" value="<?php echo($email); ?>" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">NHIS No <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input readonly class="form-control " id="nhis" name="nhis_no" type="text" value="<?php echo($nhis_no)?>" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="Diagnosis" class="control-label col-lg-2">Diagnosis <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="diag" name="diagnosis" type="text"  required="required" value="<?php echo($diagnosis); ?>"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="Treatment" class="control-label col-lg-2">Treatment<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control " id="treatment" name="treatment">
                          <option><?php echo($treatment); ?></option>
                          <option>Given</option>
                          <option>Delivered</option>
                          <option>Not Responding</option>
                          <option>Deceased</option>
                          <option>Terminal</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="Admission" class="control-label col-lg-2">Admission </label>
                      <div class="col-lg-10">
                        <select class="form-control " id="addm" name="admission">
                            <option><?php echo($admission); ?></option>
                            <option>Yes</option>
                            <option>No</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="Next_of_Kin" class="control-label col-lg-2">Next of Kin</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="nok" name="next_of_kin" type="text"  required="required" value="<?php echo($next_of_kin); ?>"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-4">Next of Kin Phone Number <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="next_of_kin_phone_number" name="next_of_kin_phone_number" type="text"  required="required" value="<?php echo($next_of_kin_phone_number); ?>"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-4">Patient's Consent <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="patient_consent" name="patient_consent" type="text"  required="required" value="<?php echo($patient_consent); ?>"/>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-4">Doctor's Consent <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="doctor_consent" name="doctor_consent" type="text"  required="required" value="<?php echo($doctor_consent); ?>"/>
                      </div>
                    </div>
                    
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input class="btn btn-primary" type="submit" value="Update" name="subbtn">
                        <a href="managepatient.php" class="btn btn-default">Back</a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </section>
          </div>
        </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
                   
<?php include_once './includes/footer.php';?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->


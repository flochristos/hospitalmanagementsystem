<?php include_once "./includes/header.php" ?>
<?php include_once "./includes/sidebar.php" ?>

<?php
$randomid = (rand(10000,99999));
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Add Patient</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Patients</li>
                            <li class="breadcrumb-item active">Add Patient</li>
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
                Enter Patient Details

                <?php

                if(isset($_POST['subbtn']))
                     {
                          //the values in the boxes
                          $fname = $_POST['fname'];
                          $email = $_POST['email'];  
                          $nhis_no = $_POST['nhis_no'];  
                          $diagnosis = $_POST['diagnosis']; 
                          $treatment = $_POST['treatment'];
                          $admission = $_POST['admission'];
                          $next_of_kin = $_POST['next_of_kin'];
                          $next_of_kin_phone_number = $_POST['next_of_kin_phone_number'];
                          $patient_consent = $_POST['patient_consent'];
                          $doctor_comment = $_POST['doctor_comment'];
                          
                          $sql ="INSERT INTO patients(date, name, email, nhis_no, diagnosis, treatment, admission, next_of_kin, next_of_kin_phone_number, patient_consent, doctor_comment)  VALUES(CURDATE(),'$fname', '$email', '$nhis_no', '$diagnosis', '$treatment', '$admission', '$next_of_kin', '$next_of_kin_phone_number', '$patient_consent', '$doctor_comment')";
                        
                          if($db->query($sql)== TRUE){
                            
                                           ?><div class="container"  id="validatn">
                                                <div class="alert alert-success alert-dismissible">
                                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                  <strong>Success!</strong> Patient Added Successfully.
                                                </div> 
                                              </div>
                                              <?php
                          }else{
                            
                                              ?><div class="container"  id="validatn">
                                                <div class="alert alert-danger alert-dismissible">
                                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                  <strong>Error!</strong> Kindly check your details of entry!
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
                        <input class=" form-control" id="fullname" name="fname" type="text" required="required" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="email" class="control-label col-lg-2">Email <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="email" name="email" type="email"  required="required" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">NHIS No <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input readonly class="form-control " id="nhis" name="nhis_no" type="text" value="<?php echo($randomid)?>" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="Diagnosis" class="control-label col-lg-2">Diagnosis <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="diag" name="diagnosis" type="text"  required="required" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="Treatment" class="control-label col-lg-2">Treatment<span class="required">*</span></label>
                      <div class="col-lg-10">
                        <select class="form-control " id="treatment" name="treatment">
                          <option>Select...</option>
                          <option>Given</option>
                          <option>Delivered</option>
                          <option>Not Responding</option>
                          <option>Deceased</option>
                          <option>Terminal</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="Admission" class="control-label col-lg-2"> Admission </label>
                      <div class="col-lg-10">
                        <select class="form-control " id="admission" name="admission">
                            <option>Select...</option>
                            <option>In-Patient</option>
                            <option>Out-Patient</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="Next_of_Kin" class="control-label col-lg-2">Next of Kin</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="nok" name="next_of_kin" type="text"  required="required" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-4">Next of Kin Phone Number <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="next_of_kin_phone_number" name="next_of_kin_phone_number" type="text"  required="required" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-4">Patient's Consent <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="patient_consent" name="patient_consent" type="text"  required="required" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-4">Doctor's Comment <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <textarea class=" form-control" id="doctor_comment" name="doctor_comment" required="required"></textarea>
                      </div>
                    </div>
                    
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input class="btn btn-primary" type="submit" value="Save" name="subbtn">
                        <input type="reset" class="btn btn-default" type="button" value="Reset">
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
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->

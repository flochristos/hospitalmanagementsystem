<?php include_once "./includes/header.php" ?>
<?php include_once "./includes/sidebar.php" ?>

<?php
  if(isset($_GET['ide'])){
 $coode = $_GET['ide'];
}


             
                   // mysqli select query
                    $products = $db->query("SELECT name, email, special_no, specialization, appointment, medi_licen, admin_cons FROM nurses WHERE id='$coode'");
                       while($row = $products->fetch_assoc()){
                        $name = $row["name"];
                        $email = $row["email"];
                        $special_no = $row["special_no"];
                        $specialization = $row["specialization"];
                        $appointment = $row["appointment"];
                        $med_licen = $row["medi_licen"];
                        $admin_cons = $row["admin_cons"];

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
                        <h3 class="text-themecolor m-b-0 m-t-0">View Nurse</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Nurses</li>
                            <li class="breadcrumb-item active"><a href="managenurse.php">Manage Nurses</a></li>
                            <li class="breadcrumb-item active">View/Edit Nurse</li>
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
                Update Nurse' Details

                <?php
                  if(isset($_POST['subbtn'])){
                      //the values in the boxes
                          $name = $_POST['fname'];
                          $email = $_POST['email'];  
                          $special_no = $_POST['special_no'];  
                          $specialization = $_POST['specialization']; 
                          $appointment = $_POST['appointment'];
                          $medi_licen = $_POST['medi_licen'];
                          $admin_cons = $_POST['admin_cons'];


                  $sql = "UPDATE nurses SET name='$name', email='$email', special_no='$special_no', specialization='$specialization', appointment='$appointment', medi_licen='$medi_licen', admin_cons='$admin_cons' WHERE id='$coode'";

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
                        <input class="form-control " id="email" name="email" type="email"  required="required" value="<?php echo($email); ?>"  />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="username" class="control-label col-lg-2">Special No <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input readonly class="form-control " id="special_no" name="special_no" type="text" value="<?php echo($special_no); ?>" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="Diagnosis" class="control-label col-lg-2">Specializations <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="specialization" name="specialization" type="text"  required="required" value="<?php echo($specialization); ?>"  />
                      </div>
                    </div>
                   
                    <div class="form-group ">
                      <label for="Admission" class="control-label col-lg-2">Appointment </label>
                      <div class="col-lg-10">
                        <select class="form-control " id="appointment" name="appointment">
                            <option><?php echo($appointment); ?></option>
                            <option>Full-Time</option>
                            <option>Part-Time</option>
                            <option>Freelance</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="Next_of_Kin" class="control-label col-lg-2">Medical License</label>
                      <div class="col-lg-10">
                        <input class="form-control " id="med_licen" name="medi_licen" type="text"  required="required"  value="<?php echo($med_licen); ?>" />
                      </div>
                    </div>
                    
                    <div class="form-group ">
                      <label for="address" class="control-label col-lg-4">Admin's Consent <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="admin_cons" name="admin_cons" type="text"  required="required" value="<?php echo($admin_cons); ?>" />
                      </div>
                    </div>
                    
                    </div>
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input class="btn btn-primary" type="submit" value="Save" name="subbtn">
                        <a href="managenurse.php" class="btn btn-default">Back</a>
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


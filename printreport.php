<?php include_once "./includes/header.php" ?>


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
                    <div class="col-md-12 col-12 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Record Printing</h3>
                        
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
              <header class="panel-heading text-center">
                Print Report

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
                          $doctor_consent = $_POST['doctor_consent'];
                          
                          $sql ="INSERT INTO patients(date, name, email, nhis_no, diagnosis, treatment, admission, next_of_kin, next_of_kin_phone_number, patient_consent, doctor_consent)  VALUES(CURDATE(),'$fname', '$email', '$nhis_no', '$diagnosis', '$treatment', '$admission', '$next_of_kin', '$next_of_kin_phone_number', '$patient_consent', '$doctor_consent')";
                        
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
                  
                    <div class="table-responsive">
                                <table class="table v-middle" id="myTable">
                                    <thead>
                                        <tr class="bg-light" >
                                          <th class="border-top-0" style="text-align: center;">S/N</th>
                                            <th class="border-top-0" style="text-align: center;">Date_Added</th>
                                            <th class="border-top-0" style="text-align: center;">Name</th>
                                            <th class="border-top-0" style="text-align: center;">Email</th>
                                            <th class="border-top-0" style="text-align: center;">NHIS_No</th>
                                            <th class="border-top-0" style="text-align: center;">Diagnosis</th>
                                            <th class="border-top-0" style="text-align: center;">Treatment</th>
                                            <th class="border-top-0" style="text-align: center;">Admission</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $nos = 1;
                                            $sql="SELECT * FROM patients";
                                            $result = $db->query($sql);

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    $idd = $row['id'];
                                                    ?>
                                        <tr>
                                            <td><?php  echo $nos++; ?></td>
                                            <td><?php echo $row['date'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['nhis_no'] ?></td>
                                            <td>
                                                <label class="label label-danger"><?php echo $row['diagnosis'] ?></label>
                                            </td>
                                            <td><?php echo $row['treatment'] ?></td>
                                            <td><?php echo $row['admission'] ?></td>
                                            
                                            
                                        </tr>
                                        <?php
                                            }
                                        }
                                     ?>
                                        
                                    </tbody>
                                </table>
                            </div>

                            <a onclick="window.print()" class="btn btn-primary pull-right" style="color: white !important;">Print Now</a>
                            <a href="index.php" class="btn btn-default pull-right">Back</a>

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

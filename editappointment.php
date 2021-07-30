<?php include_once "./includes/header.php" ?>
<?php include_once "./includes/sidebar.php" ?>

<?php
  if(isset($_GET['ide'])){
 $coode = $_GET['ide'];
}


             
                   // mysqli select query
                    $products = $db->query("SELECT title, description, pdate FROM appointment WHERE id='$coode'");
                       while($row = $products->fetch_assoc()){
                        $title = $row["title"];
                        $description = $row["description"];
                        $pdate = $row["pdate"];
                        
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
                    <div class="col-md-12 col-8 align-self-center">
                        <h3 class="text-themecolor m-b-0 m-t-0">Edit Appointment</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Appointment</li>
                            <li class="breadcrumb-item active"><a href="viewappointment.php">View Appointment</a></li>
                            <li class="breadcrumb-item active">View/Edit Appointment</li>
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
                Update Appointment Details

                <?php
                  if(isset($_POST['subbtn'])){
                      //the values in the boxes
                          $title = $_POST['ptitle'];
                          $description = $_POST['pdescription'];  
                          $pdate = $_POST['aadate'];  
                          


                  $sql = "UPDATE appointment SET title='$title', description='$description', pdate='$pdate' WHERE id='$coode'";

                if($db->query($sql)== TRUE){
                    ?><div class="container"  id="validatn">
                                                <div class="alert alert-success alert-dismissible">
                                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                  <strong>Success!</strong> Appointment Updated Successfully.
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
                      <label for="title" class="control-label col-lg-2">Title <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class=" form-control" id="title" name="ptitle" type="text" required="required" value="<?php echo($title); ?>" />
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="description" class="control-label col-lg-2">Description <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <textarea class="form-control " id="description" name="pdescription" rows="6" required="required"><?php echo($description); ?></textarea> 
                      </div>
                    </div>
                    <div class="form-group ">
                      <label for="date" class="control-label col-lg-2">Appointment Date <span class="required">*</span></label>
                      <div class="col-lg-10">
                        <input class="form-control " id="ddate"  type="date" value="<?php echo($pdate); ?>" name="aadate" required="required"/>
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10">
                        <input class="btn btn-primary" type="submit" value="Save" name="subbtn">
                        <a href="managedoctors.php" class="btn btn-default">Back</a>
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


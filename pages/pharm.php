<?php include_once "./includes/header.php" ?>
<?php include_once "./includes/sidebar.php" ?>

<?php
$randomid = (rand(100000000,999999999));
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
                        <h3 class="text-themecolor m-b-0 m-t-0">Pharmacy</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Pharmacy</li>
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
                Prescribe a Drug
                <?php

                if(isset($_POST['subbtn']))
                     {
                          //the values in the boxes
                         
                          $pname = $_POST['pname'];  
                          $pdes = $_POST['pdes'];
                          $pdate = date('d-m-Y');  
                          
                          $sql ="INSERT INTO pharm(orderid, pname, dnames, pdate)  VALUES('$randomid','$pname', '$pdes', '$pdate')";
                        
                          if($db->query($sql)== TRUE){
                            $_SESSION['pname'] = $pname;
                            $_SESSION['pdes'] = $pdes;
                            $_SESSION['pdate'] = $pdate;
                            $_SESSION['orderid'] = $randomid; 
                                           ?><div class="container"  id="validatn">
                                                <div class="alert alert-success alert-dismissible">
                                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                  <strong>Success!</strong> Order Recorded Successfully.
                                                  <meta http-equiv="refresh" content="2;url=pharmprint.php" />>
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
                      <label for="date" class="control-label col-lg-12">Order #id : <?php echo($randomid);?><span class="required">*</span></label>
                    </div>
                    <div class="form-group ">
                      <label for="title" class="control-label col-lg-12">Patient Name <span class="required">*</span>
                        <input style="border-radius: .2em; border:1px solid #d9d9d9; padding: 8px;" id="pname" name="pname" type="text" required="required" />
                      </label>
                    </div>
                    <div class="form-group ">
                      <label for="Description" class="control-label col-lg-6">Drug Names/Descriptions <span class="required">*</span></label>
                        <div class="col-sm-6">
                          <textarea class="form-control" name="pdes" rows="1" required="required" ></textarea>           
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <div class="col-lg-offset-2 col-lg-10 m-auto">
                        <input class="btn btn-primary" type="submit" value="Save and Print" name="subbtn">
                        <input class="btn btn-primary" type="submit" value="Send to Pharm" name="subbtn2">
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
          <!-- container section end -->
  <!-- javascripts -->
  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

  <!-- jquery ui -->
  <script src="js/jquery-ui-1.9.2.custom.min.js"></script>

  <!--custom checkbox & radio-->
  <script type="text/javascript" src="js/ga.js"></script>
  <!--custom switch-->
  <script src="js/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="js/jquery.tagsinput.js"></script>

  <!-- colorpicker -->

  <!-- bootstrap-wysiwyg -->
  <script src="js/jquery.hotkeys.js"></script>
  <script src="js/bootstrap-wysiwyg.js"></script>
  <script src="js/bootstrap-wysiwyg-custom.js"></script>
  <script src="js/moment.js"></script>
  <script src="js/bootstrap-colorpicker.js"></script>
  <script src="js/daterangepicker.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <!-- ck editor -->
  <script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>
  <!-- custom form component script for this page-->
  <script src="js/form-component.js"></script>
  <!-- custome script for all page -->
  <script src="js/scripts.js"></script>

         
<?php include_once './includes/footer.php';?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->


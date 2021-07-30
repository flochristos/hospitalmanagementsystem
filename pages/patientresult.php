<?php
$db_hostname = 'localhost';
$db_username = 'root';
$db_password = '';
$db_database = 'hms';

// Database Connection String
$con = mysql_connect($db_hostname,$db_username,$db_password);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db($db_database, $con);
?>

<?php
  if(isset($_GET['search'])){
 $coode = $_GET['search'];
}
?>
<?php include_once "./includes/header.php" ?>
<?php include_once './includes/sidebar.php';
?>

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
                        <h3 class="text-themecolor m-b-0 m-t-0"> Manage Patient </h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Patients</li>
                            <li class="breadcrumb-item active">Manage Patient </li>
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
                                    
                      
            <!-- column -->
           
                <div class="">
                    <div class="card-body" style="padding: 5px;">
                        <!-- title -->
                        <div class="d-md-flex align-items-center">
                            <div>
                                <h5 class="card-title">Filter Patient Name </h5><hr>
                                <h5 class="card-subtitle"><!-- Search form -->
              <form class="form-inline md-form form-sm">
                <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Filter" aria-label="Search" onkeyup="myFunction()" id="myInput">
                <i class="mdi mdi-filter" aria-hidden="true"></i>
              </form>
            </h5>
                            </div>
                                 <?php
                                  if (isset($_GET['deleteid'])){
                                    // get the id to deleteid
                                    $deleteid = $_GET['deleteid'];
                                    
                                    $sql = "DELETE FROM patients WHERE id='$deleteid'";

                                                if ($db->query($sql) === TRUE) {
                                                    ?><div class="container"  id="validatn">
                                                        <div class="alert alert-success alert-dismissible">
                                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                          <strong>Success!</strong> Deleted Successfully!
                                                        </div> 
                                                      </div>
                                                      <meta http-equiv="refresh" content="1;url=managepatient.php" />
                                                      <?php
                                                } else {
                                                     ?><div class="container"  id="validatn">
                                                        <div class="alert alert-danger alert-dismissible">
                                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                          <strong>Error!</strong> Patient Not Deleted!
                                                        </div> 
                                                      </div>
                                                      <?php
                                                }
                                    
                                        }
                                ?>

                                <div class="col-md-6 text-center">
                                  
                                </div>
                            <div class="ml-auto">
                                <div class="dl">
                                    <h5 class="card-title">Search Patient Name </h5><hr>
                                <h5 class="card-subtitle"><!-- Search form -->
                                    <form class="form-inline md-form form-sm" action="patientresult.php" method="get">
                                              <span><input class="form-control form-control-sm mr-3 w-75" type="text"   id="search" name="search"></span>
                                              <span><input type="submit" value="Search" class="btn btn-primary" style="padding: 2px;color: white !important;" ></span><br>
                                            </form>
                                </h5>
                                </div>
                            </div>
                        </div>
                        <!-- title -->
                    </div>
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
                                    <th class="border-top-0" style="text-align: center;">Manage_Patient</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                  <?php $nos = 1; ?>
                                  <?php
                              if (!empty($_REQUEST['search'])) {

                              $coode = mysql_real_escape_string($_REQUEST['search']);     

                              $sql = "SELECT * FROM patients WHERE name LIKE '%".$coode."%'"; 
                              $r_query = mysql_query($sql); 

                              while ($row = mysql_fetch_array($r_query)){  
                               
                              $sname = $row['name']; 
                              $idd = $row['id'];  


                              ?>
                              
                                  <td> <?php echo $nos++; ?></td>
                                    <td><?php echo $row['date'] ?></td>
                                    <td><?php echo $sname; ?></td>
                                    <td><?php echo $row['email'] ?></td>
                                    <td><?php echo $row['nhis_no'] ?></td>
                                    <td>
                                        <label class="label label-danger"><?php echo $row['diagnosis'] ?></label>
                                    </td>
                                    <td><?php echo $row['treatment'] ?></td>
                                    <td><?php echo $row['admission'] ?></td>
                                    
                                    <td><a href="viewpatient.php?ide=<?php echo ($idd);?>" class="btn btn-primary " style="padding: 5px;color: white !important;" >View</a> <a href="managepatient.php?deleteid=<?php echo ($idd);?>" class="btn btn-danger"  style="padding: 5px;color: white !important;" >Delete</a>
                                    </td>
                                </tr>
                                <?php 
                                   }  

                                }
                              ?>
                          <div class="col-md-12 text-center"><big>Your Search Results: <?php echo ($nos-1)?></big></div>
                            </tbody>
                        </table>
                    </div>
                                                    <!--    -------------bootstrap navigation classes-----------------  -->
                         <hr>
                                                </div>
                                                
                                        <!-- ============================================================== -->
                                        <!-- Table -->




                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- ============================================================== -->
                                        <!-- End PAge Content -->
                                        <!-- ============================================================== -->
                                    </div>     
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[2];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>

    <?php include_once './includes/footer.php';?>
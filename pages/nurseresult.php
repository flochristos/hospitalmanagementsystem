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
                        <h3 class="text-themecolor m-b-0 m-t-0"> Manage Nurse </h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Nurses</li>
                            <li class="breadcrumb-item active">Manage Nurse </li>
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
                                <h5 class="card-title">Filter Nurse Name </h5><hr>
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
                                    
                                    $sql = "DELETE FROM nurses WHERE id='$deleteid'";

                                                if ($db->query($sql) === TRUE) {
                                                    ?><div class="container"  id="validatn">
                                                        <div class="alert alert-success alert-dismissible">
                                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                          <strong>Success!</strong> Deleted Successfully!
                                                        </div> 
                                                      </div>
                                                      <meta http-equiv="refresh" content="1;url=managenurse.php" />
                                                      <?php
                                                      
                                                } else {
                                                     ?><div class="container"  id="validatn">
                                                        <div class="alert alert-danger alert-dismissible">
                                                          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                          <strong>Error!</strong> Nurse Not Deleted!
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
                                    <h5 class="card-title">Search Nurse Name </h5><hr>
                                <h5 class="card-subtitle"><!-- Search form -->
                                    <form class="form-inline md-form form-sm" action="nurseresult.php" method="get">
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
                                            <th class="border-top-0" style="text-align: center;">Special_No</th>
                                            <th class="border-top-0" style="text-align: center;">Specialization</th>
                                            <th class="border-top-0" style="text-align: center;">Appointment</th>
                                            <th class="border-top-0" style="text-align: center;">Medical_License</th>
                                            <th class="border-top-0" style="text-align: center;">Manage_Nurse</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                          <?php $nos = 1; ?>
                                  <?php
                                          if (!empty($_REQUEST['search'])) {

                                          $coode = mysql_real_escape_string($_REQUEST['search']);     

                                          $sql = "SELECT * FROM nurses WHERE name LIKE '%".$coode."%'"; 
                                          $r_query = mysql_query($sql); 

                                          while ($row = mysql_fetch_array($r_query)){  
                                           
                                          $sname = $row['name']; 
                                          $idd = $row['id'];  


                                          ?>
                                        <tr>
                                          <td><?php echo $nos++; ?> </td>
                                            <td><?php echo $row['date'] ?></td>
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['email'] ?></td>
                                            <td><?php echo $row['special_no'] ?></td>
                                            <td>
                                                <label class="label label-info"><?php echo $row['specialization'] ?></label>
                                            </td>
                                            <td><?php echo $row['appointment'] ?></td>
                                            <td><?php echo $row['medi_licen'] ?></td>
                                            
                                            <td><a href="viewnurses.php?ide=<?php echo ($idd); ?>" class="btn btn-primary " style="padding: 5px;color: white !important;" >View</a> 
                                            <a href="nurseresult.php?deleteid=<?php echo ($idd); ?>" class="btn btn-danger"  style="padding: 5px;color: white !important;" >Delete</a>
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
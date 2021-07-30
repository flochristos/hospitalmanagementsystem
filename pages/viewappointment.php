<?php include_once './includes/header.php';
include_once './includes/sidebar.php';
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
                        <h3 class="text-themecolor m-b-0 m-t-0"> View Appointment </h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Appointment</li>
                            <li class="breadcrumb-item active">View Appointment</li>
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
                                        <h5 class="card-title">Filter Appointment </h5><hr>
                                        <h5 class="card-subtitle"><!-- Search form -->
                      <form class="form-inline md-form form-sm">
                        <input class="form-control form-control-sm mr-3 w-75" type="text" placeholder="Search" aria-label="Search"onkeyup="myFunction()" id="myInput" >
                        <i class="mdi mdi-filter" aria-hidden="true"></i>
                      </form>
                    </h5>
                                    </div>
                                    <?php
                                          if (isset($_GET['deleteid'])){
                                            // get the id to deleteid
                                            $deleteid = $_GET['deleteid'];
                                            
                                            $sql = "DELETE FROM appointment WHERE id='$deleteid'";

                                                        if ($db->query($sql) === TRUE) {
                                                            ?><div class="container"  id="validatn">
                                                                <div class="alert alert-success alert-dismissible">
                                                                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                                                  <strong>Success!</strong> Deleted Successfully!
                                                                </div> 
                                                              </div>
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
                                    
                                </div>
                                <!-- title -->
                            </div>
                            <div class="table-responsive">
                                <table class="table v-middle" id="myTable">
                                    <thead>
                                        <tr class="bg-light" >
                                          <th class="border-top-0" style="text-align: center;">S/N</th>
                                            <th class="border-top-0" style="text-align: center;">Title</th>
                                            <th class="border-top-0" style="text-align: center;">Description</th>
                                            <th class="border-top-0" style="text-align: center;">Date</th>
                                            <th class="border-top-0" style="text-align: center;">Manage_Appointment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $nos = 1;
                                            $sql="SELECT * FROM appointment ORDER BY id DESC";
                                            $result = $db->query($sql);

                                            if ($result->num_rows > 0) {
                                                // output data of each row
                                                while($row = $result->fetch_assoc()) {
                                                    $idd = $row['id'];
                                                    ?>
                                        <tr>
                                          <td><?php echo $nos++; ?> </td>
                                            <td style="text-align: center;"><?php echo $row['title'] ?></td>
                                            <td style="text-align: center;"><?php echo $row['description'] ?></td>
                                            <td style="text-align: center;"><?php echo $row['pdate'] ?></td>
                                            
                                            <td  style="text-align: center;"><a href="editappointment.php?ide=<?php echo ($idd); ?>" class="btn btn-primary " style="padding: 5px;color: white !important;" >View</a> 
                                            <a href="viewappointment.php?deleteid=<?php echo ($idd); ?>" class="btn btn-danger"  style="padding: 5px;color: white !important;" >Delete</a>
                                            </td>
                                        </tr>
                                        
                                        <?php
                                            }
                                        }
                                     ?>
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
 <script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[1];
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
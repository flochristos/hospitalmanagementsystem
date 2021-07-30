<?php include_once "./includes/header.php" ?>
<?php include_once "./includes/sidebar.php" ?>

<?php

require './includes/dbconfig2.php';
/*************************************************************/

$recordperpage = 5;
if(isset($_GET['page']) & !empty($_GET['page'])){

$currentpage = $_GET['page'];
}else{

$currentpage = 1;
}
$recordSkip = ($currentpage * $recordperpage) - $recordperpage;
$query1 = "SELECT * FROM `nurses`";
$totalpageCounted = mysqli_query($conn, $query1);
$totalresult = mysqli_num_rows($totalpageCounted);

$lastpage = ceil($totalresult/$recordperpage);
$recordSkippage = 1; $nextpage = $currentpage + 1;
$previouspage = $currentpage - 1;
//It will select only required pages from database
$query2 = "SELECT * FROM `nurses` LIMIT $recordSkip, $recordperpage";
$res = mysqli_query($conn, $query2);
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
                        <h3 class="text-themecolor m-b-0 m-t-0"> Manage nurses </h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Nurses</li>
                            <li class="breadcrumb-item active">Manage Nurses </li>
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

                                                        if ($conn->query($sql) === TRUE) {
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
                                        <?php

                                             if ( $currentpage === 1 ) {
                                                    // On page 1 start at 1
                                                    $nos = 1;
                                                    } elseif ( $currentpage === 2 ) {
                                                    // On page 2 start on the post per page + 1
                                                    $nos = $recordperpage + 1;
                                                    } else {
                                                    // On other pages.
                                                    // For example on page 2 with 5 posts per page we want the counter to start on 6
                                                    // So page * posts per page - posts on the last page + 1 to get to this page = 6
                                                    $nos = ( $currentpage * $recordperpage - $recordperpage + 1 );
                                                    } 
                                            

                                                while($r = mysqli_fetch_assoc($res)){
                                                $idd = $r['id'];
                                             ?>
                                        <tr>
                                            <td><?php echo $nos++; ?> </td>
                                            <td><?php echo $r['date'] ?></td>
                                            <td><?php echo $r['name'] ?></td>
                                            <td><?php echo $r['email'] ?></td>
                                            <td><?php echo $r['special_no'] ?></td>
                                            <td>
                                                <label class="label label-info"><?php echo $r['specialization'] ?></label>
                                            </td>
                                            <td><?php echo $r['appointment'] ?></td>
                                            <td><?php echo $r['medi_licen'] ?></td>
                                            
                                            <td><a href="viewnurses.php?ide=<?php echo ($idd); ?>" class="btn btn-primary " style="padding: 5px;color: white !important;" >View</a> 
                                            <a href="managenurse.php?deleteid=<?php echo ($idd); ?>" class="btn btn-danger"  style="padding: 5px;color: white !important;" >Delete</a>
                                            </td>
                                        </tr>
                                        
                                        <?php
                                            }
                                        
                                     ?>
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                        </div>
                <nav aria-label="Page navigation">
  <ul class="pagination justify-content-end">
   <?php if($currentpage != $recordSkippage){ ?>     <li class="page-item">
      <a class="page-link" href="?page=<?php echo $recordSkippage ?>" tabindex="-1" aria-label="Previous">
        <span aria-hidden="true">&laquo; First</span>
        <span class="sr-only">First</span>
      </a>
    </li>
    <?php } ?>
    <?php if($currentpage >= 3){ ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
    <?php } ?>
    <li class="page-item active"><a class="page-link" href="?page=<?php echo $currentpage ?>"><?php echo $currentpage ?></a></li>
    <?php if($currentpage != $lastpage){ ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $lastpage ?>" aria-label="Next">
        <span aria-hidden="true"> Last &raquo;</span>
        <span class="sr-only">Last</span>
      </a>
     </li>
     <?php } ?>
    </ul>
   </nav>
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
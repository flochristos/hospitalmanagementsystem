 <?php

//Enter your host configuration here in my case it is root

$conn = mysqli_connect('localhost', 'root', '');

if (!$conn){

    die("Database conn Failed" . mysqli_error($conn));

}

//Enter yoour database name here in my case i am using pagination.

$select_db = mysqli_select_db($conn, 'hms');

if (!$select_db){
    die("Database Selection Failed" . mysqli_error($conn));

}
/*************************************************************/

$recordperpage = 2;
if(isset($_GET['page']) & !empty($_GET['page'])){

$currentpage = $_GET['page'];
}else{

$currentpage = 1;
}
$recordSkip = ($currentpage * $recordperpage) - $recordperpage;
$query1 = "SELECT * FROM `patients`";
$totalpageCounted = mysqli_query($conn, $query1);
$totalresult = mysqli_num_rows($totalpageCounted);

$lastpage = ceil($totalresult/$recordperpage);
$recordSkippage = 1; $nextpage = $currentpage + 1;
$previouspage = $currentpage - 1;
//It will select only required pages from database
$query2 = "SELECT * FROM `patients` LIMIT $recordSkip, $recordperpage";
$res = mysqli_query($conn, $query2);
?>

<!DOCTYPE html>
<html>
 <head><title>Simple-pagination in php</title>


 <!--  --------------bootstrap css cdn-------------------  -->
<link rel="stylesheet"
href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

 </head>
 <body>
 <div class="container">


 <div class="row">
 <h1>PHP PAGINATION</h1>
 <table class="table ">
 <thead>
 <tr>
   <th>Id</th>
   <th>Car Name</th>
   <th>Make</th>
   <th>Model</th>
   <th>Accessories</th>
   <th>Update Records</th>
 </tr>

 </thead>
 <tbody>

 <?php

    while($r = mysqli_fetch_assoc($res)){

 ?>
    <tr>
     <th scope="row"><?php echo $r['id']; ?></th>

     <td><?php echo $r['name']; ?></td>

    <td
><?php echo $r['date']; ?></td>

     <td><?php echo $r['email']; ?></td>

     <td><?php echo $r['accessories']; ?></td>

     <td>

     <a href="delete.php?id=<?php echo $r['id']; ?>"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>

    </td>

  </tr>

    <?php } ?>

   </tbody>

  </table>

 </div> <!--    -------------bootstrap navigation classes-----------------  -->
 <nav aria-label="Page navigation">
  <ul class="pagination">
   <?php if($currentpage != $recordSkippage){ ?>     <li class="page-item">
      <a class="page-link" href="?page=<?php echo $recordSkippage ?>" tabindex="-1" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">First</span>
      </a>
    </li>
    <?php } ?>
    <?php if($currentpage >= 5){ ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $previouspage ?>"><?php echo $previouspage ?></a></li>
    <?php } ?>
    <li class="page-item active"><a class="page-link" href="?page=<?php echo $currentpage ?>"><?php echo $currentpage ?></a></li>
    <?php if($currentpage != $lastpage){ ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $nextpage ?>"><?php echo $nextpage ?></a></li>
    <li class="page-item">
      <a class="page-link" href="?page=<?php echo $lastpage ?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Last</span>
      </a>
     </li>
     <?php } ?>
    </ul>
   </nav>
  </div>
  </body>
 </html>
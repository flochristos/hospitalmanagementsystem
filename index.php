<?php include_once "./includes/header.php" ?>
<?php include_once "./includes/sidebar.php" ?>

<?php $pcount = mysqli_num_rows(mysqli_query($db, "SELECT * FROM patients")); ?>
<?php $dcount = mysqli_num_rows(mysqli_query($db, "SELECT * FROM doctors")); ?>
<?php $ncount = mysqli_num_rows(mysqli_query($db, "SELECT * FROM nurses")); ?>

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
                    <div class="col-md-10 col-10 align-self-center">
                        <h3 class="text-themecolor">Dashboard</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                <div style="float:right">
                    <canvas id="canvas" width="50" height="50" 
                    style="background-color:#333;border-radius:50%;">
                    </canvas>
                </div>
                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->

        <div class="container-fluid">
        
          <div class="row">
          
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <a href="managepatient.php">
                <div class="info-box blue-bg">
                  <i class="fa fa-users"></i>
                  <div class="count"><?php echo ($pcount); ?></div>
                  <div class="title">Patients Admitted</div>
                </div>
              </a>
              <!--/.info-box-->
              </div>
          
          <!--/.col-->

            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <a href="managedoctors.php">
              <div class="info-box brown-bg">
                <i class="mdi mdi-account-box" style="color: white"></i>
                <div class="count"><?php echo ($dcount); ?></div>
                <div class="title">Doctors</div>
              </div>
            </a>
              <!--/.info-box-->
            </div>
          
          <!--/.col-->

          
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <a href="managenurse.php"><div class="info-box dark-bg">
                <i class="mdi mdi-account-box-outline" style="color: white"></i>
                <div class="count"><?php echo ($ncount); ?></div>
                <div class="title">Nurses</div>
                  </div>
                </a>
              <!--/.info-box-->
            </div>
           


           <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
           <div class="info-box green-bg">
              <i class="mdi mdi-folder" style="color: white"></i>
              <div class="count">4</div>
              <div class="title">Discharge</div>
            </div>
         </div>
       
          <!--/.col-->
  

                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-5">
                        <!-- Column -->
                        
                        <!-- Column -->
                        <div class="card">
                            <div class="card-block bg-info">
                                <h4 class="text-white card-title">Appointments Reminder</h4>
                                <h6 class="card-subtitle text-white m-b-0 op-5">Checkout Scheduled Appointments Here</h6>
                            </div>
                            <div class="card-block">
                                <div class="message-box contact-box">
                                    <h2 class="add-ct-btn"><a href="appointment.php" class="btn btn-circle btn-lg btn-success waves-effect waves-dark">+</a></h2>
                                    <div class="message-widget contact-widget">
                                        <!-- Message -->

                                            <?php
                                              // mysqli select query
                                                $appoint = $db->query("SELECT * FROM appointment ORDER BY id DESC LIMIT 5");
                                                   while($row = $appoint->fetch_assoc()){
                                                    $atitle = $row["title"];
                                                    $adescription = $row["description"];
                                                    $adate = $row["pdate"];
                                                    
                                                  
                                            ?>
                                        <a>
                                            <div class="mail-contnet" data-toggle="tooltip" title="<?php echo ($adescription);?>">
                                                <h5><?php echo ($atitle); ?></h5> <span class="mail-desc" >Date: <?php echo ($adate); ?></span></div>
                                        </a>
                                        <?php
                                            }
                                        ?>
                                        <!-- Message -->
                                        <a href="viewappointment.php" class="btn btn-default">See More...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xlg-6 col-md-5">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab">CMD</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a> </li>
                                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a> </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="home" role="tabpanel">
                                    <div class="card-block">
                                        <div class="profiletimeline">
                                            View Chief Managing Director's Details in profile tab
                                        </div>
                                    </div>
                                </div>
                                <!--second tab-->
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="card-block">
                                        <div class="row">
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted">Johnathan Deo</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Mobile</strong>
                                                <br>
                                                <p class="text-muted">(+234) 813 5220 653</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"> <strong>Email</strong>
                                                <br>
                                                <p class="text-muted">cmd@admin.com</p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"> <strong>Location</strong>
                                                <br>
                                                <p class="text-muted">Ibadan</p>
                                            </div>
                                        </div>
                                        <hr>
                                        
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-block">
                                        <form class="form-horizontal form-material">
                                            
                                            
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <a href="mailto:myemail@gmail.com" class="btn btn-success m-auto" >Mail CMD</a>
                                                    <a href="tel:+2348135220653" class="btn btn-success m-auto" >Call CMD</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


<!--- side bar for payment -->
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div style="background-color: white; height: 300px; padding: 20px">
           <div style="background-color: #ebf2f6; border-radius: .2em">
              <h5 style="text-align:center;">Sales</h5>
           </div>
          <p>NGN500.00</p>
          <p>NGN500.00</p>
          <p>NGN500.00</p>
          <p>NGN500.00</p>
          <p>NGN500.00</p>
          <hr>
          <p>Total: NGN500.00</p>
         </div>
          </div>
          <!--/.col-->
    
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        </div>
    

        
    </div>
    <script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}


var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}


var d = new Date();
document.getElementById("date").innerHTML = d;

      
</script>
     <?php include_once './includes/footer.php';?>
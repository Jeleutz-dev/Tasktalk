<?php

    session_start();
    require '../includes/dbh.inc.php';

    function strip_bad_chars( $input ){
        $output = preg_replace( "/[^a-zA-Z0-9_-]/", "", $input);
        return $output;
    }

    if (strlen($_SESSION['userUid'])==0) {
        header('location:../includes/logout.inc.php');
      } 
  
      else{
?>  
<!doctype html>
<html lang="en" dir="ltr">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="icon" href="simple-logo2.ico" type="image/x-icon"/>

<title>Welcome to TaskTalk</title>

<!--Notification using PHP Ajax Bootstrap-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />

<link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
<link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">

<!-- Plugins css -->
<link rel="stylesheet" href="assets/plugins/charts-c3/c3.min.css"/>

<!-- Core css -->
<link rel="stylesheet" href="assets/css/main.css"/>
<link rel="stylesheet" href="assets/css/main1.css"/>
<link rel="stylesheet" href="assets/css/theme1.css"/>
<link href="../assets/css/style.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){

    $("#course").change(function(){
        var deptid = $(this).val();

        $.ajax({
            url: '../getSection.php',
            type: 'post',
            data: {depart:deptid},
            dataType: 'json',
            success:function(response){

            var len = response.length;

            $("#section").empty();
                for( var i = 0; i<len; i++){
                    var idSection = response[i]['idSection'];
                    var section = response[i]['section'];

                    $("#section").append("<option value='"+idSection+"'>"+section+"</option>");
                    
                }
            }
        });
    });
});
</script>


</head>

<body class="font-montserrat sidebar_dark iconcolor gradient">
    
<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
    </div>
</div>

<div id="main_content">

    <div id="header_top" class="header_top dark">
        <div class="container">
           <div class="hleft">
                <a class="header-brand" href="dashboard.php" ><img src="assets/images/simple-logo2.png"></a>  
                <a href="javascript:void(0)" class="nav-link user_btn"><?php echo'<img id="userDp1" class="avatar" alt="" data-toggle="tooltip" data-placement="right" title="User Menu" src=../uploads/'.$_SESSION["userImg"].'>'?></a>

            </div>
            <div class="hright">
                <div class="dropdown">
                    <a href="../p-index.php" class="nav-link icon"><img src="assets/images/home_30px.png"></a>
                    <a href="javascript:void(0)" class="nav-link icon menu_toggle"><img src="assets/images/leftarrow_30px.png"></a>
                </div>            
            </div>
        </div>
    </div>

    <div id="rightsidebar" class="right_sidebar">
        <a href="javascript:void(0)" class="p-3 settingbar float-right"><i class="fa fa-close"></i></a>
        <div class="p-4">
            <div class="mb-4">
                <h6 class="font-14 font-weight-bold text-muted">Font Style</h6>
                <div class="custom-controls-stacked font_setting">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="font" value="font-opensans">
                        <span class="custom-control-label">Open Sans Font</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="font" value="font-montserrat" checked="">
                        <span class="custom-control-label">Montserrat Google Font</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="font" value="font-roboto">
                        <span class="custom-control-label">Robot Google Font</span>
                    </label>
                </div>
            </div>
            <hr>
            <div class="mb-4">
                <h6 class="font-14 font-weight-bold text-muted">Dropdown Menu Icon</h6>
                <div class="custom-controls-stacked arrow_option">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="marrow" value="arrow-a">
                        <span class="custom-control-label">A</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="marrow" value="arrow-b">
                        <span class="custom-control-label">B</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="marrow" value="arrow-c" checked="">
                        <span class="custom-control-label">C</span>
                    </label>
                </div>
                <h6 class="font-14 font-weight-bold mt-4 text-muted">SubMenu List Icon</h6>
                <div class="custom-controls-stacked list_option">
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="listicon" value="list-a" checked="">
                        <span class="custom-control-label">A</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="listicon" value="list-b">
                        <span class="custom-control-label">B</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" class="custom-control-input" name="listicon" value="list-c">
                        <span class="custom-control-label">C</span>
                    </label>
                </div>
            </div>
            <hr>
            <div>
                <h6 class="font-14 font-weight-bold mt-4 text-muted">General Settings</h6>
                <ul class="setting-list list-unstyled mt-1 setting_switch">
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Night Mode</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-darkmode" checked="">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Fix Navbar top</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-fixnavbar">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Header Dark</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-pageheader" checked="">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Min Sidebar Dark</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-min_sidebar">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Sidebar Dark</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-sidebar">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Icon Color</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-iconcolor">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Gradient Color</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-gradient">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Box Shadow</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-boxshadow">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">RTL Support</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-rtl">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                    <li>
                        <label class="custom-switch">
                            <span class="custom-switch-description">Box Layout</span>
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-boxlayout">
                            <span class="custom-switch-indicator"></span>
                        </label>
                    </li>
                </ul>
            </div>
            <hr>
            <div class="form-group">
                <label class="d-block">Storage <span class="float-right">77%</span></label>
                <div class="progress progress-sm">
                    <div class="progress-bar" role="progressbar" aria-valuenow="77" aria-valuemin="0" aria-valuemax="100" style="width: 77%;"></div>
                </div>
                <button type="button" class="btn btn-primary btn-block mt-3">Upgrade Storage</button>
            </div>
        </div>
    </div>

    <div class="user_div">
        <h5 class="brand-name mb-4">TASKTALK<a href="javascript:void(0)" class="user_btn"><img src="assets/images/sidebtn.png"></a></h5>
        <div class="card-body">
            <a href="page-profile.php"><?php echo'<img id="userDp" class="card-profile-img" alt="" src=../uploads/'.$_SESSION["userImg"].'>'?></a>
            <h6 class="mb-0"><?php echo strtoupper($_SESSION['f_name']) . " " . strtoupper($_SESSION['l_name']); ?></h6>
            <span><?php echo ($_SESSION['emailUsers']); ?></span>
            <div class="d-flex align-items-baseline mt-3">
                <h3 class="mb-0 mr-2">9.8</h3>
                <p class="mb-0"><span class="text-success">1.6% <i class="fa fa-arrow-up"></i></span></p>
            </div>
            <div class="progress progress-xs">
                <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-orange" role="progressbar" style="width: 5%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                <div class="progress-bar bg-indigo" role="progressbar" style="width: 13%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h6 class="text-uppercase font-10 mt-1">Performance Score</h6>
            <hr>
            <p>Activity</p>
            <ul class="new_timeline">
                <li>
                    <div class="bullet pink"></div>
                    <div class="time">11:00am</div>
                    <div class="desc">
                        <h3>Attendance</h3>
                        <h4>Computer Class</h4>
                    </div>
                </li>
                <li>
                    <div class="bullet pink"></div>
                    <div class="time">11:30am</div>
                    <div class="desc">
                        <h3>Added an interest</h3>
                        <h4>“Volunteer Activities”</h4>
                    </div>
                </li>
                <li>
                    <div class="bullet green"></div>
                    <div class="time">12:00pm</div>
                    <div class="desc">
                        <h3>Developer Team</h3>
                        <h4>Hangouts</h4>
                        <ul class="list-unstyled team-info margin-0 p-t-5">                                            
                            <li><img src="assets/images/xs/Aldous.jpg" alt="Avatar"></li>
                            <li><img src="assets/images/xs/cosmok.png" alt="Avatar"></li>
                            <li><img src="assets/images/xs/joey.png" alt="Avatar"></li>
                            <li><img src="assets/images/xs/jose.png" alt="Avatar"></li>                                            
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="bullet green"></div>
                    <div class="time">2:00pm</div>
                    <div class="desc">
                        <h3>Responded to need</h3>
                        <a href="javascript:void(0)">“In-Kind Opportunity”</a>
                    </div>
                </li>
                <li>
                    <div class="bullet orange"></div>
                    <div class="time">1:30pm</div>
                    <div class="desc">
                        <h3>Lunch Break</h3>
                    </div>
                </li>
                <li>
                    <div class="bullet green"></div>
                    <div class="time">2:38pm</div>
                    <div class="desc">
                        <h3>Finish</h3>
                        <h4>Go to Home</h4>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <div id="left-sidebar" class="sidebar-dark">
        <h5 class="brand-name">TASKTALK</h5>
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul class="metismenu">
                <li class="g_heading">Project</li>
                <li class="active"><a href="dashboard.php"><i ></i><img src="assets/images/dashboard.png"><span>  Dashboard</span></a></li>
                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left:30px;"><img src="assets/images/features_25px.png"> Features</a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="addup.php">Add Up</a>
                            <a class="dropdown-item" href="subjects.php">Subjects</a>
                            <a class="dropdown-item" href="sections.php">Sections</a>
                            <a class="dropdown-item" href="projects.php">Projects</a>
                            <a class="dropdown-item" href="groups.php">Groups</a>
                            <a class="dropdown-item" href="tasks.php">Tasks</a>
                    </div>
                    
                </div>

                <div class="dropdown">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-left:30px;"><img src="assets/images/users_25px.png">  Users</a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="admin.php">Admin</a>
                            <a class="dropdown-item" href="faculty.php">Faculty</a>
                            <a class="dropdown-item" href="students.php">Students</a>
                    </div>
                    
                </div>
                <li><a href="audit-trail.php"><i ></i><img src="assets/images/audit_25px.png"><span>  Audit Trail</span></a></li> 
                
                
                <li class="g_heading">App</li>
                <li><a href="app-calendar.php"><i></i><img src="assets/images/calendar.png"><span> My Calendar</span></a></li>
                <li><a href="app-chat.php"><i></i><img src="assets/images/messages.png"><span> Chat Room</span></a></li>
            </ul>
        </nav>        
    </div>


    <!-----page--------------------------------------------------=========================================================== ====------------->


    <div class="page">
        <div id="page_top" class="section-body top_dark">
            <div class="container-fluid">
                <div class="page-header">
                    <div class="left">
                        <a href="javascript:void(0)" class="icon menu_toggle mr-3"><img src="assets/images/burgir.png"></a>
                        <h1 class="page-title"></h1>                        
                    </div>
                    <div class="right">
                        <div class="input-icon xs-hide mr-4">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-icon-addon"></span>
                        </div>
                        
                        <div class="notification d-flex">
                            <div class="dropdown d-flex">
                                <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2" data-toggle="dropdown"><img src="assets/images/task_30px.png"></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="project-list.php">Project List</a>
                                    <a class="dropdown-item" href="app-calendar.php">My Calender</a>
                                </div> 
                            </div>
                            <div class="dropdown d-flex">
                                <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2" data-toggle="dropdown"><img src="assets/images/message_30px.png"><span class="badge badge-success nav-unread"></span></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <ul class="right_chat list-unstyled w350 p-0">
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object" src="assets/images/xs/jose.png" alt="">
                                                <div class="media-body">
                                                    <span class="name">Jose Enrico Leuterio</span>
                                                    <div class="message">Nagawa mo na ba task mo?</div>
                                                    <small>11 mins ago</small>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/ron.png" alt="">
                                                <div class="media-body">
                                                    <span class="name">Ronron pog</span>
                                                    <div class="message">Gawin mo na yung binigay sayong task tangek</div>
                                                    <small>18 mins ago</small>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>                            
                                        </li>
                                        <li class="offline">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/cosmok.png" alt="">
                                                <div class="media-body">
                                                    <span class="name">Guian Cosmok</span>
                                                    <div class="message">Ikikick na talaga kita pag di mo yan ginawa.</div>
                                                    <small>27 mins ago</small>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>                            
                                        </li>
                                        <li class="online">
                                            <a href="javascript:void(0);" class="media">
                                                <img class="media-object " src="assets/images/xs/bucs.png" alt="">
                                                <div class="media-body">
                                                    <span class="name">Vincent Bucao</span>
                                                    <div class="message">Pre. Patulong naman ako sa task ko.</div>
                                                    <small>33 mins ago</small>
                                                    <span class="badge badge-outline status"></span>
                                                </div>
                                            </a>                            
                                        </li>                        
                                    </ul>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item text-center text-muted-dark readall">Mark all as read</a>
                                </div>
                            </div>
                            <div class="dropdown d-flex">
                                <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2" data-toggle="dropdown"><img src="assets/images/notif_30px.png"></a><span class="badge badge-primary nav-unread"></span>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <ul class="list-unstyled feeds_widget">
                                        <li>
                                            <div class="feeds-left"></div>
                                            <div class="feeds-body">
                                            <h4 class="title">Task Completed <small class="float-right text-muted"></small></h4>
                                                <small>IT elective 2 (Team Infante)</small>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="feeds-left"></div>
                                            <div class="feeds-body">
                                                <h4 class="title">Project Added Successfully <small class="float-right text-muted"></small></h4>
                                                <small>Database Admin</small>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="feeds-left"></div>
                                            <div class="feeds-body">
                                                <h4 class="title">A Leader updated a description <small class="float-right text-muted"></small></h4>
                                                <small>Principles of Management</small>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="feeds-left"></div>
                                            <div class="feeds-body">
                                                <h4 class="title">You Have an Unfinished Project <small class="float-right text-muted"></small></h4>
                                                <small></small>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="feeds-left"></div>
                                            <div class="feeds-body">
                                                <h4 class="title">Warning<small class="float-right text-muted">1 </small></h4>
                                                <small>Please verify your email</small>
                                            </div>
                                        </li>                                   
                                    </ul>
                                    <div class="dropdown-divider"></div>
                                    <a href="javascript:void(0)" class="dropdown-item text-center text-muted-dark readall">Mark all as read</a>
                                </div>
                            </div>
                            <div class="dropdown d-flex">
                                <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2" data-toggle="dropdown"><img src="assets/images/signout_30px.png"></a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="../Students/page-profile.php"> Profile</a>
                                    <form method="post" action="../includes/p-logout.php" id="logout-form">
                                            <input type="submit" class="dropdown-item" name="logout-submit" value="Sign Out" style="padding-right: 100px;">
                                            <input type="hidden" id="name" name="uid" value="<?php echo $_SESSION['userUid'];?>">
                                            <input type="hidden" id="action" name="action" value="Logout" readonly>
                                    </form>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- main page =============================================================================================================================================-->
        <!-- ======= Hero Section ======= -->
        
        <div class="section mt-3">
            <div class="section">
                <div class="container-fluid">
                <section id="dheader" class="dheader">
                        <div class="row clearfix row-deck">
                            <div class="col-xl-8 col-lg-14 col-md-14">
                                <div class="container" data-aos="fade-up">
                                    <div class="row justify-content-left" data-aos="fade-up" data-aos-delay="150">
                                        <a href="page-profile.php"><?php echo'<img id="userDp" class="card-profile-img" alt="" src=../uploads/'.$_SESSION["userImg"].'>'?></a>
                                        <div class="section-title col-xl-6 col-lg-8">
                                            <h1>WELCOME<span>!</span></h1>
                                            <h2><?php echo ($_SESSION['f_name']. " " .$_SESSION['l_name']) ?></h2>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-4 col-lg-14 col-md-14">
                                <div class="container" data-aos="fade-up">
                                    <div class="row text-center">
                                        <div class="col-4 border-right pb-4 pt-4">
                                            <label class="mb-0 font-13">Total Project</label>
                                            <?php
                                                $sql = mysqli_query($conn,"SELECT * FROM groups WHERE leader = '".$_SESSION['userUid']."'");
                                                $query = mysqli_num_rows($sql);
                                            ?>
                                            <h4 class="font-30 font-weight-bold text-col-blue counter"><?php echo $query;?></h4>
                                        </div>
                                        <div class="col-4 border-right pb-4 pt-4">
                                            <label class="mb-0 font-13">On Going</label>
                                            <?php
                                                $sql1 = mysqli_query($conn,"SELECT * FROM projects WHERE leader RLIKE '[[:<:]]".$_SESSION['userUid']."[[:>:]]' and projstat = 'On-Going'");
                                                $query1 = mysqli_num_rows($sql1);
                                                $sql3 = mysqli_query($conn,"SELECT * FROM projsubmit WHERE leader = '".$_SESSION['userUid']."' OR members RLIKE '[[:<:]]".$_SESSION['userUid']."[[:>:]]'");
                                                $query3 = mysqli_num_rows($sql3);

                                                $finalq = $query1 - $query3;
                                            ?>
                                            <h4 class="font-30 font-weight-bold text-col-blue counter"><?php echo $finalq;?></h4>
                                        </div>
                                        <div class="col-4 pb-4 pt-4">
                                            <?php
                                                $sql2 = mysqli_query($conn,"SELECT * FROM projsubmit WHERE leader = '".$_SESSION['userUid']."' OR members RLIKE '[[:<:]]".$_SESSION['userUid']."[[:>:]]'");
                                                $query2 = mysqli_num_rows($sql2);
                                            ?>
                                            <label class="mb-0 font-13">Completed</label>
                                            <h4 class="font-30 font-weight-bold text-col-blue counter"><?php echo $query2;?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section><!--End Hero -->
      
                    <div class="row clearfix row-deck">
                        <div class="col-xl-6 col-lg-14 col-md-14">
                            <section id="project-stud" class="project-stud overflow-auto">
                                <div class="container" data-aos="fade-up">

                                    <div class="section-title">
                                        <h2>Team</h2>
                                        <p>Projects</p>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-lg-4 col-md-6 ">
                                            <div class="member" data-aos="fade-up" data-aos-delay="100">
                                            <div class="member-img">
                                                <img src="assets/images/proj-icon.png" class="img-fluid" alt="">
                                            </div>
                                            <div class="member-info">
                                                <h4>Project Leader</h4>
                                                <?php
                                                    $plead = mysqli_query($conn,"SELECT * FROM projects WHERE leader RLIKE '[[:<:]]".$_SESSION['userUid']."[[:>:]]' ");
                                                    $leadp = mysqli_num_rows($plead);
                                                ?>
                                                <span><?php echo $leadp;?> Projects Available</span>
                                            </div>
                                                <button type="button" class="button-block" onclick="location.href='project-leader.php'">View All</button>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 ">
                                            <div class="member1" data-aos="fade-up" data-aos-delay="200">
                                            <div class="member-img">
                                                <img src="assets/images/proj-icon.png" class="img-fluid" alt="">
                                            </div>
                                            <div class="member-info">
                                                <h4>Project Member</h4>
                                                <?php
                                                    $smem = mysqli_query($conn,"SELECT * FROM projects WHERE leader RLIKE '[[:<:]]".$_SESSION['userUid']."[[:>:]]' ");
                                                    $mems = mysqli_num_rows($smem);
                                                ?>
                                                <span><?php echo $mems;?> Projects Available</span>
                                            </div>
                                                <button type="button" class="button-block" onclick="location.href='project-member.php'">View All</button>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-6 ">
                                            <div class="member2" data-aos="fade-up" data-aos-delay="300">
                                            <div class="member-img">
                                                <img src="assets/images/proj-icon.png" class="img-fluid" alt="">
                                            </div>
                                            <div class="member-info">
                                                <h4>Overall Tasks</h4>
                                                <?php
                                                    $tsover = mysqli_query($conn,"SELECT * FROM tasks WHERE taskmember = '".$_SESSION['userUid']."'");
                                                    $ts = mysqli_num_rows($tsover);
                                                    $tsover1 = mysqli_query($conn,"SELECT * FROM subtasks WHERE taskmember = '".$_SESSION['userUid']."'");
                                                    $ts1 = mysqli_num_rows($tsover1);

                                                    $total = $ts1 + $ts;
                                                ?>
                                                <span><?php echo $total;?> Tasks Available</span>
                                            </div>
                                                <button type="button" class="button-block" onclick="location.href='taskboard.php'">View All</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div> 
                       

                        <div class="col-xl-6 col-lg-8 col-md-8">
                            <div class="tab-pane fade show active" id="todo-list" role="tabpanel">
                                <div class="card-body">
                                    <section id="project" class="project">
                                        <div class="container" data-aos="fade-up">
                                            <div class="section-title">
                                                <h2>Task</h2>
                                                <p>Recent</p>
                                            </div>

                                            <?php

                                                                // run query
                                                $query = mysqli_query($conn, "SELECT * FROM tasks order by id DESC LIMIT 2");

                                                // set array
                                                $array = array();

                                                // look through query
                                                while($row = mysqli_fetch_assoc($query)){

                                                // add each row returned into an array
                                                    $array[] = $row;

                                                    // OR just echo the data:// etc

                                            ?>
                                            
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="table-responsive todo_list">
                                                        <table class="table table-hover table-striped table-vcenter mb-0 text-nowrap"> 
                                                            <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th class="w150 text-right">Due</th>
                                                                <th class="w100">Priority</th>
                                                                <th class="w80">User</th>
                                                            </tr>
                                                            </thead>
                                                            <tr>
                                                                <td>
                                                                    
                                                                    <h3 class="card-title"><?php echo $row['taskname'];?></h3>
                                                                </td>
                                                                <td class="text-right"><?php echo $row['tend'];?></td>
                                                                <td><span class="tag tag-danger ml-0 mr-0"><?php echo $row['taskstat'];?></span></td>
                                                                <td>
                                                                        <?php
                                                                            $qry1 = mysqli_query($conn, "SELECT * FROM user WHERE userType='student' AND uidUsers = '".$row['taskmember']."'");
                                                                            $que = mysqli_fetch_assoc($qry1);
                                                                        ?>

                                                                            <?php echo'<img title="'.($que['f_name']. " " .$que['l_name']).'" alt="Avatar" class="avatar avatar-pink"  data-placement="top"  data-toggle="tooltip" src=../uploads/'.$que['userImg'].'>'?>
                                                                            <span"></span>
                                                                    
                                                                    <!-- <span class="avatar avatar-pink"  data-toggle="tooltip" data-placement="top" title="<?php echo ($que['f_name']. " " .$que['l_name']);?>" data-original-title="<?php echo ($que['f_name']. " " .$que['l_name']);?>"><img src="../uploads/<?php echo $que['userImg'];?>" alt=""></span> -->
                                                                </td>
                                                            </tr>
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                                <label class="form-check-label" for="defaultCheck1">
                                                                    New
                                                                </label>
                                                            </div>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>       
            <div class="section">
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 col-sm-12 text-md-right">
                                <ul class="list-inline mb-0">
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</div>

<!-- Add Project-->
<form action="../includes/p-projects.inc.php" method='post' id="contact-form" enctype="multipart/form-data">
<div class="modal fade" id="addproject" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="title" id="defaultModalLabel1">Add New Project</h6>
            </div>
            <div class="modal-body">
                <div class="row clearfix">

                    <div class="col-12">
                        <div class="form-group">                                    
                            <input type="text" class="form-control" id="projn" name="projn" placeholder="Project Name">
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control" id="projd" name="projd" placeholder="Project Description"></textarea>
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-group">                            
                            <select id="subject" name="subject" class="form-control" required>
                                <?php
                                    $query = mysqli_query($conn, "SELECT * FROM subject");
                                    $array = array();

                                    while($data = mysqli_fetch_assoc($query)){
                                        $array[] = $data;
                                ?>
                                
                                <option selected hidden value="">Select Subject</option>
                                <option value="<?php echo $data['subject_title']; ?>"><?php echo $data['subject_title']; ?></option>
                                <?php
                                    }
                                ?>
                            </select> 
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">                                    
                            <select id="course" name="course" class="form-control">
                            <option selected hidden value="">Course</option>
                                <?php
                                // Fetch Department
                                    $sql_course = "SELECT * FROM course";
                                    $course_data = mysqli_query($conn,$sql_course);
                            
                                    while($row = mysqli_fetch_assoc($course_data) ){
                                        $departid = $row['idCourse'];
                                        $depart_name = $row['depart_name'];
                                                        
                                        // Option
                                        echo "<option value='".$departid."' >".$depart_name."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-group">                                    
                            <select id="section" name="section" class="form-control">
                                <option selected hidden value="" >Choose a course first</option>
                            </select>
                        </div>
                    </div>

                    <!-- <div class="col-12">
                        <div class="form-group">
                            <input type="number" class="form-control" id="grpno" name="grpno" placeholder="Number of Groups"> 
                        </div>
                    </div> -->

                    <div class="col-12">
                        <div class="form-group">   
                            <script>
                                $(document).ready(function() {
                                var i=0; 
                                $('#add').click(function() {
                                i++;
                                        $('#dynamic_field').append('<div id="row'+i+'"><label" for="Leader_'+ i +'">Leader for Group '+ i +'</label><?php
                                        $query = mysqli_query($conn, "SELECT * FROM user WHERE userType='student'");
                                        $array = array();

                                        while($row = mysqli_fetch_assoc($query)){
                                        $array[] = $row;
                                        ?><div class="form-group"><select id="leader[]" name="leader[]" class="form-control" required><?php
                                            $query = mysqli_query($conn, "SELECT * FROM user WHERE userType='student'");
                                            $array = array();

                                            while($data = mysqli_fetch_assoc($query)){
                                            $array[] = $data;
                                        ?>
                                        <option selected hidden value="">Select a Leader</option><option value="<?php echo ($data['f_name']) . " " . ($data['l_name']); ?>"><?php echo ($data['f_name']) . " " . ($data['l_name']); ?></option><?php }?> </select></div><?php }?> </div>')

                                                                    
                                    });
                               });
                            </script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                            <div id="dynamic_field"></div><button type="button" class="btn btn-default"name="add" id="add">Add Leaders</button>     
                        </div>
                    </div>
                    
                    <div class="col-12">
                        <h7>Due : </h7>
                        <div class="form-group">                                 
                             <input type="date" id="due" name="due" class="form-control" required>
                        </div>

                        <div class="form-group">                                    
                            <input type="hidden" class="form-control" id="createdby" name="createdby" value="<?php echo ($_SESSION['f_name']). " " .($_SESSION['l_name']); ?>" readonly>
                        </div>
                    </div>
                      
                </div>

                <div class="modal-footer">
                    <input type="submit"  class="btn btn-primary"  name="Add-Button" value="Add Project">
                    <input type="hidden" id="uid" name="uid" value="<?php echo ($_SESSION['userUid']);?>">
                    <input type="hidden" id="action" name="action" value="Add Project" readonly>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>



<script src="assets/bundles/lib.vendor.bundle.js"></script>
<script src="assets/bundles/apexcharts.bundle.js"></script>
<script src="assets/bundles/counterup.bundle.js"></script>
<script src="assets/bundles/knobjs.bundle.js"></script>
<script src="assets/bundles/c3.bundle.js"></script>
<script src="assets/js/core.js"></script>
<script src="assets/js/page/project-index.js"></script>

<!-- Vendor JS Files -->
<script src="../assets/vendor/aos/aos.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../assets/vendor/php-email-form/validate.js"></script>
<script src="../assets/vendor/purecounter/purecounter.js"></script>
<script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

<!-- Template Main JS File -->
<script src="../assets/js/main1.js"></script>

</body>
</html>

<?php
      }
?>
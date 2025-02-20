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

<title>Page Profile</title>

<!-- Bootstrap Core and vandor -->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css" />


<link rel="stylesheet" href="assets/plugins/summernote/dist/summernote.css"/>
<link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">

<!-- Core css -->
<link rel="stylesheet" href="assets/css/main.css"/>
<link rel="stylesheet" href="assets/css/theme1.css"/>
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
                <a class="header-brand" href="index-2.php" ><img src="assets/images/simple-logo2.png"></a>   
                <a href="javascript:void(0)" class="nav-link user_btn"><?php echo'<img id="userDp" class="avatar" alt="" data-toggle="tooltip" data-placement="zright" title="User Menu" src=../uploads/'.$_SESSION["userImg"].'>'?></a>

            </div>
            <div class="hright">
                <div class="dropdown">
                    <a href="../s-index.php" class="nav-link icon"><img src="assets/images/home_30px.png"></a>
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
                            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input btn-darkmode">
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

    <div class="theme_div">
        <div class="card">
            <div class="card-body">
                <ul class="list-group list-unstyled">
                    <li class="list-group-item mb-2">
                        <p>Default Theme</p>
                        <a href="index-2.php"><img src="assets/images/themes/default.png" class="img-fluid" /></a>
                    </li>
                    <li class="list-group-item mb-2">
                        <p>Night Mode Theme</p>
                        <a href="project-dark/index.php"><img src="assets/images/themes/dark.png" class="img-fluid" /></a>
                    </li>                    
                    <li class="list-group-item mb-2">
                        <p>RTL Version</p>
                        <a href="project-rtl/index.php"><img src="assets/images/themes/rtl.png" class="img-fluid" /></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="user_div">
        <h5 class="brand-name mb-4">TASKTALK<a href="javascript:void(0)" class="user_btn"><img src="assets/images/sidebtn.png"></a></h5>
        <div class="card-body">
            <a href="page-profile.php"><?php echo'<img id="userDp" class="card-profile-img" alt="" src=../uploads/'.$_SESSION["userImg"].'>'?></a>
            <h6 class="mb-0"><?php echo strtoupper($_SESSION['f_name']) . " " . strtoupper($_SESSION['l_name']); ?></h6>
            <span><?php echo ($_SESSION['emailUsers']); ?></span>
            <?php

                $sql1 = "SELECT AVG(total) AS avg FROM peer_grading WHERE member = '".$_SESSION['userUid']."'";
                $average = mysqli_query($conn, $sql1);

                while ($row = mysqli_fetch_assoc($average)){
                    $output = $row['avg'];
                }

                $sql2 = "SELECT SUM(total) AS sum FROM peer_grading WHERE member = '".$_SESSION['userUid']."'";
                $current = mysqli_query($conn, $sql2);

                while ($row1 = mysqli_fetch_assoc($current)){
                    $output1 = $row1['sum'];
                }

                $percent = $output;
                                    
            ?>
            <div class="d-flex align-items-baseline mt-3">
                <h1 class="mb-0 mr-2"><?php echo $percent;?></h1>
                <p class="mb-0"><span class="text-success"><?php echo round($output,2);?>%<i class="fa fa-arrow-up"></i></span></p>
            </div>
            <div class="progress progress-xs">
                <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percent?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <h6 class="text-uppercase font-10 mt-1">Performance Score</h6>
            <hr>
            <p>Activity</p>
            <ul class="new_timeline">
            <?php
                $sql3 = mysqli_query($conn,"SELECT * FROM tasks WHERE (taskmember = '".$_SESSION['userUid']."' OR leader = '".$_SESSION['userUid']."') AND taskstat = 'On-Going' ORDER BY id DESC LIMIT 2");
                while($task = mysqli_fetch_assoc($sql3)){
            ?>
                <li>
                    <div class="bullet pink"></div>
                    <div class="time"><?php echo $task['tend']?></div>
                    <div class="desc">
                        <h3><?php echo $task['taskname']?></h3>
                        <h4><?php echo substr($task['taskdesc'],0,10) . '...'?></h4>
                    </div>
                </li>
            <?php
                }
            ?>
            <?php
                $sql4 = mysqli_query($conn,"SELECT * FROM projects WHERE (leader  RLIKE '".$_SESSION['userUid']."') AND projstat = 'On-Going' ORDER BY id DESC LIMIT 2");
                while($proj = mysqli_fetch_assoc($sql4)){
            ?>
                <li>
                    <div class="bullet pink"></div>
                    <div class="time"><?php echo $proj['duedate']?></div>
                    <div class="desc">
                        <h3><?php echo $proj['projname']?></h3>
                        <h4><?php echo substr($proj['projdesc'],0,10) . '...'?></h4>
                    </div>
                </li>
            <?php
                }
            ?>
            </ul>
        </div>
    </div>

    <div id="left-sidebar" class="sidebar-dark">
        <div id="tasktalk"><h3>TASKTALK</h3></div>
         <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul class="metismenu">
            <li class="g_heading">Project</li>
                <li ><a href="dashboard.php"><i ></i><img src="assets/images/dashboard.png"><span style="margin-left:5px;">  Dashboard</span></a></li>                        
                <li><a href="project-list.php"><i ></i><img src="assets/images/subjects.png"><span style="margin-left:5px;"> Project List</span></a></li>
                <li><a href="taskboard.php"><i ></i><img src="assets/images/task-icon.png"><span style="margin-left:10px;"> Taskboard</span></a></li>
                <li><a href="gradebook.php"><i ></i><img src="assets/images/grade-book.png"><span style="margin-left:6px;"> Grade Book</span></a></li>
                <li><a href="associates.php"><i ></i><img src="assets/images/associates.png"><span style="margin-left:5px;"> Associates</span></a></li> 
                
                <li class="g_heading">App</li>
                <li><a href="app-calendar.php"><i></i><img src="assets/images/calendar.png"><span style="margin-left:5px;"> My Calendar</span></a></li>
                <li><a href="chat/app-chat.php"><i></i><img src="assets/images/messages.png"><span style="margin-left:5px;"> Chat Room</span></a></li>
                <a><img src="assets/images/hi.gif" class="img-fluid" ></i></a>
            </ul>
        </nav>        
    </div>
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
                            <!-- <div class="dropdown d-flex">
                                <a class="nav-link icon d-none d-md-flex btn btn-default btn-icon ml-2" data-toggle="dropdown"><img src="assets/images/message-cln.png"><span class="badge badge-success nav-unread"></span></a>
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
                            </div> -->
                            <!-- Notification button  -->
                           <?php
                                include("functions.php");

                            ?>
                            <div class="dropdown d-flex">
                                <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/notif_30px.png"> 
                                        <?php
                                        $query = "SELECT * from `notifications` where 
                                        (`uidUsers` != '".$_SESSION['userUid']."' AND `leader` = '".$_SESSION['userUid']."' AND `members` = '')
                                        AND `status` = 'unread' OR
                                        (`uidUsers` != '".$_SESSION['userUid']."' AND `members` = '".$_SESSION['userUid']."' OR ( `uidUsers` != '".$_SESSION['userUid']."' AND `members` = '' AND `action` = 'Post Comment'))

                                        AND `status` = 'unread'
                                        order by `date` DESC";


                                        
                                        if(count(fetchAll($query))>0){
                                        ?>
                                        <span class="badge badge-primary nav-unread"></span>
                                        <?php
                                            }
                                                ?>
                                        </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow" aria-labelledby="dropdown01">
                                                <?php
                                                $query = "SELECT * from `notifications` 
                                                WHERE 
                                                (`uidUsers` != '".$_SESSION['userUid']."' AND `leader` = '".$_SESSION['userUid']."' AND `members` = '')

                                                OR
                                                (`uidUsers` != '".$_SESSION['userUid']."' AND `members` = '".$_SESSION['userUid']."' OR ( `uidUsers` != '".$_SESSION['userUid']."' AND `members` = '' AND `action` = 'Post Comment'))
                                                

                                                
                                                order by `date` DESC";
                                                if(count(fetchAll($query))>0){
                                                foreach(fetchAll($query) as $i){

                                                $query = mysqli_query($conn, "SELECT * FROM projects WHERE id='".$i['projid']."' ");
                                                $row = mysqli_fetch_assoc($query);
                                                    
                                                ?>
                                                <a style ="
                                                        <?php
                                                            if($i['status']=='unread'){
                                                                echo "font-weight:bold;";
                                                            }
                                                        ?>
                                                        " class="dropdown-item" href="view.php?course=<?php echo $i['course']; ?>&section=<?php echo $i['section']; ?>&subject=<?php echo $i['subject']; ?>&id=<?php echo $i['projid']; ?>&projname=<?php echo $row['projname']; ?>&grpno=<?php echo $i['grpno']; ?>&grpid=<?php echo $i['grpid']; ?>&leader=<?php echo $i['leader']; ?>&idn=<?php echo $i['id'] ?>">
                                                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
                                                <?php 
                                                
                                                if($i['action']=='Post Comment'){
                                                    echo ucfirst($i['uidUsers']). " commented on a post in " .$row['projname'].".";
                                                }
                                                else if($i['action']=='Add Project'){
                                                    echo ucfirst($i['uidUsers'])." added you as a group leader in " .$row['projname'].".";
                                                }
                                                else if($i['action']=='Add Group Member'){
                                                    echo ucfirst($i['uidUsers'])." added you as a group member in "  .$row['projname'].".";
                                                }
                                                // else if($i['action']=='Add Group Members'){.$row1['projname']."."
                                                //     echo ucfirst($i['uidUsers'])." added you as a group member in " .$row['projname'].".";
                                                // }
                                                else if($i['action']=='Post Announcement'){
                                                    echo ucfirst($i['uidUsers'])." posted an announcement in " .$row['projname'].".";
                                                }
                                                ?>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <?php
                                            }
                                        }else{
                                            echo "No notification yet.";
                                        }
                                            ?>
                                    </div>
                                </li>
                                </ul>
                            </div>
                            <!-- notification button  -->
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

            <br><br>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12">
                        <div class="card">
                            <?php echo'<img class="card-img-top" alt="Card image cap" src=../uploads/'.$_SESSION["userImg"].'>'?>
                            <!-- <img class="card-img-top" src="../assets/img/cardbg.jpg" alt="Card image cap"> -->
                            <div class="card-body">
                                <h1 class="card-title" style="font-weight: 900; text-align:center; font-size: 150%;"><?php echo strtoupper($_SESSION['f_name']) . " " . strtoupper($_SESSION['l_name']); ?></h1>
                                <h5><b>Intro</b></h5>
                                <p class="card-text">
                                <?php echo ($_SESSION['headline']); ?></p>
                                <div class="row">
                                    <div class="col-4">
                                         <?php
                                            $sq = mysqli_query($conn,"SELECT * FROM tasks WHERE taskmember = '".$_SESSION['userUid']."'");
                                            $qry = mysqli_num_rows($sq);
                                            $sql_ = mysqli_query($conn,"SELECT * FROM subtasks WHERE taskmember = '".$_SESSION['userUid']."'");
                                            $qry1 = mysqli_num_rows($sql_);

                                            $count = $qry + $qry1;
                                        ?>
                                        <h6><strong><?php echo $count?></strong></h6>
                                        <span>Tasks</span>
                                    </div>
                                    <div class="col-4">
                                            <?php
                                                $sql = mysqli_query($conn,"SELECT * FROM groups WHERE leader = '".$_SESSION['userUid']."'");
                                                $query = mysqli_num_rows($sql);
                                                $sql1 = mysqli_query($conn,"SELECT * FROM groups WHERE members RLIKE '".$_SESSION['userUid']."'");
                                                $query1 = mysqli_num_rows($sql1);

                                                $count = $query + $query1;
                                            ?>
                                        <h6><strong><?php echo $count;?></strong></h6>
                                        <span>Projects</span>
                                    </div>
                                    <div class="col-4">
                                             <?php
                                                $sql2 = mysqli_query($conn,"SELECT * FROM groups WHERE members RLIKE '".$_SESSION['userUid']."'");
                                                $query2 = mysqli_num_rows($sql2);
                                                
                                            ?>
                                        <h6><strong><?php echo $query2;?></strong></h6>
                                        <span>Groups</span>
                                    </div>
                                </div>
                                <br>
                                <p class="card-text"><?php echo ($_SESSION['bio']); ?></p>
                                <p class="card-text"><?php echo ($_SESSION['emailUsers']); ?></p>
                                <?php
                                    $course = mysqli_query($conn, "SELECT * FROM course where idCourse='".$_SESSION['course']."'");
                                    $co = mysqli_fetch_assoc($course);

                                    $sect = mysqli_query($conn, "SELECT * FROM section where idSection='".$_SESSION['section']."'");
                                    $sec = mysqli_fetch_assoc($sect);
                                ?>
                                <p class="card-text"><?php echo $co['depart_name'];?></p>
                                <p class="card-text"><?php echo $sec['section'];?></p>
                            </div>
                        </div>
                       
                    </div>
                    <div class="col-lg-8 col-md-12">
                        <div class="row">
                            
                        </div>
                        <ul class="nav nav-tabs mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-blog-tab" data-toggle="pill" href="#pills-blog" role="tab" aria-controls="pills-blog" aria-selected="true">What's Up?</a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Edit Profile</h3>
                                        <div class="card-options">
                                        <a href="#" class="card-options-fullscreen" data-toggle="card-fullscreen"><img src="assets/images/maximize.png"></img></a>
                                            <!-- <a href="#" class="card-options-remove" data-toggle="card-remove"><i class="fe fe-x"></i></a> -->
                                            <div class="item-action dropdown ml-2">
                                                <!-- <a href="javascript:void(0)" data-toggle="dropdown"><i class="fe fe-more-vertical"></i></a> -->
                                                <div class="dropdown-menu dropdown-menu-right">
                                            
                                        </div>
                                            </div>
                                        </div>
                                    </div>

                                    <?php
                                        $userName = '';
                                        $email = '';
                                    
                                        if(isset($_GET['error']))
                                        {
                                            if($_GET['error'] == 'emptyemail')
                                            {
                                                echo '<p class="closed">*Profile email cannot be empty</p>';
                                                $email = $_GET['mail'];
                                            }
                                            else if ($_GET['error'] == 'invalidmail')
                                            {
                                                echo '<p class="closed">*Please enter a valid email</p>';
                                            }
                                            else if ($_GET['error'] == 'emptyoldpwd')
                                            {
                                                echo '<p class="closed">*You must enter the current password to change it</p>';
                                            }
                                            else if ($_GET['error'] == 'emptynewpwd')
                                            {
                                                echo '<p class="closed">*Please enter the new password</p>';
                                            }
                                            else if ($_GET['error'] == 'emptyreppwd')
                                            {
                                                echo '<p class="closed">*Please confirm new password</p>';
                                            }
                                            else if ($_GET['error'] == 'wrongpwd')
                                            {
                                                echo '<p class="closed">*Current password is wrong</p>';
                                            }
                                            else if ($_GET['error'] == 'samepwd')
                                            {
                                                echo '<p class="closed">*New password cannot be same as old password</p>';
                                            }
                                            else if ($_GET['error'] == 'passwordcheck')
                                            {
                                                echo '<p class="closed">*Confirmation password is not the same as the new password</p>';
                                            }
                                        }
                                        else if (isset($_GET['edit']) == 'success')
                                        {
                                            echo '<p class="open">*Profile Updated Successfully</p>';
                                        }
                                    ?>

                                    <form action="../includes/s-edit.php" method='post' id="contact-form" enctype="multipart/form-data">
                                    <div class="card-body">
                                    <div class="row clearfix">
                                            <div class="col-sm-6 col-md-2">
                                                <?php echo'<img id="userDp" class="card-profile-img" alt="" src=../uploads/'.$_SESSION["userImg"].'>'?>
                                            </div>
                                            <div class="col-sm-8 col-md-4">
                                                <label class="form-label">Upload New Picture</label>
                                                <input type="file" name='dp' value=<?php echo $_SESSION['userImg']; ?>>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">First Name</label>
                                                    <input type="text" class="form-control" id="f-name" name="f-name" value="<?php echo ($_SESSION['f_name']) ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-3">
                                                <div class="form-group">
                                                    <label class="form-label">Last Name</label>
                                                    <input type="text" class="form-control" id="l-name" name="l-name" value="<?php echo ($_SESSION['l_name']); ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Username</label>
                                                    <input type="text" class="form-control" id="uid" name="uid" value="<?php echo ($_SESSION['userUid']) ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Email address</label>
                                                    <input type="email" class="form-control" id="email" name="email" value="<?php echo ($_SESSION['emailUsers']) ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label" >Gender</label>
                                                    <select id="gender" name="gender" class="form-control">
                                                        <option selected hidden value="<?php echo ($_SESSION['gender']); ?>"><?php echo ($_SESSION['gender']); ?></option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Current Password</label>
                                                    <input type="password" class="form-control" id="old-pwd" name="old-pwd" placeholder="Current Password"><br>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">New Password</label>
                                                    <input type="password" class="form-control" placeholder="New Password" id="pwd" name="pwd">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Repeat New Password</label>
                                                    <input type="password" class="form-control" placeholder="Repeat New Password" id="pwd-repeat" name="pwd-repeat">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">Profile Headline</label>
                                                    <input type="text" class="form-control" placeholder="Username" id="headline" name="headline" value="<?php echo ($_SESSION['headline']) ?>">
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-12">
                                                <div class="form-group">
                                                    <label class="form-label">About Me</label>
                                                    <input type="text" class="form-control" placeholder="Tell us about yourself" id="bio" name="bio" value="<?php echo ($_SESSION['bio']); ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button type="submit" class="btn btn-primary" name="update-profile">Update Profile</button>
                                    </div>
                                </form>
                                </div>
                            </div>      
                        
<!---------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
                        <div class="tab-pane fade show active" id="pills-blog" role="tabpanel" aria-labelledby="pills-blog-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Class Performance</h3>
                                        <div class="card-options">
                                            
                                            <div class="item-action dropdown ml-2">
                                                
                                                <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end" style="position: absolute; transform: translate3d(-174px, 25px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-eye"></i> View Details </a>
                                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-share-alt"></i> Share </a>
                                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-cloud-download"></i> Download</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-copy"></i> Copy to</a>
                                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-folder"></i> Move to</a>
                                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-edit"></i> Rename</a>
                                                    <a href="javascript:void(0)" class="dropdown-item"><i class="dropdown-icon fa fa-trash"></i> Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                            <?php

                                                $sql1 = "SELECT AVG(total) AS avg FROM peer_grading WHERE member = '".$_SESSION['userUid']."'";
                                                $average = mysqli_query($conn, $sql1);

                                                while ($row = mysqli_fetch_assoc($average)){
                                                    $output = $row['avg'];
                                                }

                                                $sql2 = "SELECT SUM(total) AS sum FROM peer_grading WHERE member = '".$_SESSION['userUid']."'";
                                                $current = mysqli_query($conn, $sql2);

                                                while ($row1 = mysqli_fetch_assoc($current)){
                                                    $output1 = $row1['sum'];
                                                }

                                                $percent = $output;
                                                                  
                                            ?>
                                        <div class="d-flex align-items-baseline">
                                            <h1 class="mb-0 mr-2"><?php echo $percent;?></h1>
                                            <p class="mb-0"><span class="text-success"><?php echo round($output,2);?>%<i class="fa fa-arrow-up"></i></span></p>
                                        </div>
                                        <h6 class="text-uppercase font-10">Performance Percentage</h6>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $percent?>%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Project Summary</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-striped text-nowrap table-vcenter mb-0">
                                                <thead>
                                                    <tr>
                                                    <th></th>
                                                    <th>Project</th>
                                                    <th>Due Date</th>
                                                    <th>Leader</th>
                                                    <th>Project Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $query = mysqli_query($conn, "SELECT * FROM groups where leader = '".$_SESSION['userUid']."'");
                                                        $array = array();
                                                        $x=0;

                                                        while($row = mysqli_fetch_assoc($query)){
                                                            $x++;
                                                            $q1 = mysqli_query($conn, "SELECT * FROM projects where id = '".$row['projid']."'");
                                                            $proj = mysqli_fetch_assoc($q1);

                                                    ?>
                                                    <tr>
                                                        <td><?php echo $x;?></td>
                                                        <td>
                                                            <h6 class="mb-0"><?php echo $proj['projname'];?></h6>
                                                        </td>
                                                        <td>
                                                            <span><?php echo $proj['duedate'];?></span>
                                                        </td>
                                                        <td>
                                                            <div><?php echo $_SESSION['f_name']. " ".$_SESSION['l_name'];?></div>
                                                        </td>
                                                        <td>
                                                        <span class="tag tag-danger ml-0 mr-0"><?php echo $row['projstat']?></span>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                    <?php
                                                        $query = mysqli_query($conn, "SELECT * FROM groups where members RLIKE '".$_SESSION['userUid']."'");
                                                        $array = array();
                                                        $y=0;
                                                        $num = $x + $y;

                                                        while($row = mysqli_fetch_assoc($query)){
                                                            $num++;
                                                            $q1 = mysqli_query($conn, "SELECT * FROM projects where id = '".$row['projid']."'");
                                                            $proj = mysqli_fetch_assoc($q1);

                                                    ?>
                                                    <tr>
                                                        <td><?php echo $num;?></td>
                                                        <td>
                                                            <h6 class="mb-0"><?php echo $proj['projname'];?></h6>
                                                        </td>
                                                        <td>
                                                            <span><?php echo $proj['duedate'];?></span>
                                                        </td>
                                                        <td>
                                                            <?php
                                                                $q2 = mysqli_query($conn, "SELECT * FROM user where userType= 'student' AND uidUsers = '".$row['leader']."'");
                                                                $name = mysqli_fetch_assoc($q2);
                                                            ?>
                                                            <div><?php echo $name['f_name']. " ".$name['l_name'];?></div>
                                                        </td>
                                                        <td>
                                                        <span class="tag tag-danger ml-0 mr-0"><?php echo $row['projstat']?></span>
                                                        </td>
                                                    </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>                    
                        </div>
                    </div>
                </div>
            </div>
        
        
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        
                    
                    </div>
                </div>
            </footer>
        
    </div>
</div>

<script src="assets/bundles/lib.vendor.bundle.js"></script>

<script src="assets/bundles/fullcalendar.bundle.js"></script>
<script src="assets/bundles/knobjs.bundle.js"></script>

<script src="assets/js/core.js"></script>
<script src="assets/js/page/calendar.js"></script>
<script src="assets/js/chart/knobjs.js"></script>
</body>

</html>

<?php
      }
    ?>
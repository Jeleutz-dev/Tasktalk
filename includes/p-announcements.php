<?php

if (isset($_POST['post-announcement']))
{
    
    require 'dbh.inc.php';
    
    $title = $_POST['title'];
    $announcements = $_POST['announcements'];
    $action = 'Post Announcement';
    $course = $_POST['course'];
    $section = $_POST['section'];
    $subject = $_POST['subject'];
    $projid = $_POST['projid'];
    $projname = $_POST['projname'];
    $createdby = $_POST['createdby'];
    $leader = $_POST['leader'];
    $members = $_POST['members'];
    $datetime = $_POST['datetime'];
    $grpno = $_POST['grpno'];
    $grpid = $_POST['grpid'];
    $userName = $_POST['uid'];
    $status = 'unread';
    
    if (empty($announcements))
    {
        header("Location: ../Professors/collaboration-board.php?projname=?error=emptyfields&uid=");
        exit();
    }
    
    else
    {           
        $sql = "insert into announcements(course, section, subject, projid, grpid, grpno, createdby, leader, title, text, user)" 
                . "values (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../Professors/project-board.php?error=sqlerror");
            exit();
        }
        else
        {
            
            mysqli_stmt_bind_param($stmt, "sssssssssss", $course, $section, $subject, $projid, $grpid, $grpno, $createdby,
                    $leader, $title, $announcements, $userName);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            // ------------------------------------------------------------------------------            
            $sql = "insert into notifications(uidUsers, course, section, subject, projid, grpid, grpno, leader, action, status)" . "values (?,?,?,?,?,?,?,?,?,?)";
            $que = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Professors/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&error=sqlerror");
                exit();
            }
            else
            {
            
            mysqli_stmt_bind_param($que, "ssssssssss", $userName, $course, $section, $subject, $projid, $grpid, $grpno, $leader, $action, $status);
            mysqli_stmt_execute($que);
            mysqli_stmt_store_result($que);
            } 
// ------------------------------------------------------------------------------

// ------------------------------------------------------------------------------       
            $values  = explode(",", $members);   
              
            foreach($values as $memb) {
                $sql = "INSERT INTO notifications(uidUsers, course, section, subject, projid, grpid, grpno, leader, members, action, status) 
                VALUES ('$userName', '$course', '$section', '$subject', '$projid', '$grpid', '$grpno', '$leader', '$memb', '$action', '$status')";
                mysqli_query($conn,$sql);
                

            }
            
// ------------------------------------------------------------------------------

            $sql = "insert into activity_log(uidUsers, action)"
            . "values (?,?)";
            $que = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Professors/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&error=sqlerror");
                exit();
            }
            else
            {
            
            mysqli_stmt_bind_param($que, "ss", $userName, $action);
            mysqli_stmt_execute($que);
            mysqli_stmt_store_result($que);
            header("Location: ../Professors/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader&post=success");
            exit();
            }

        } 
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else
{
    header("Location: ../Professors/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grrpno=$grpno&grpid=$grpid&leader=$leader");
    exit();
}
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
    $user = $_POST['uid'];
    $leader = $_POST['leader'];
    $datetime = $_POST['datetime'];
    $grpno = $_POST['grpno'];
    $grpid = $_POST['grpid'];
    $userName = $_POST['uid'];
    
    if (empty($announcements))
    {
        header("Location: ../Professors/collaboration-board.php?projname=?error=emptyfields&uid=");
        exit();
    }
    
    else
    {           
        $sql = "insert into announcements(course, section, subject, title, text, user)" 
                . "values (?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql))
        {
            header("Location: ../Professors/projects.php?error=sqlerror");
            exit();
        }
        else
        {
            
            mysqli_stmt_bind_param($stmt, "ssssss", $course, $section, $subject,  $title, $announcements, $user);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);

            $sql = "insert into activity_log(uidUsers, action)"
            . "values (?,?)";
            $que = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Professors/projects.php?course=$course&section=$section&subject=$subject&error=sqlerror");
                exit();
            }
            else
            {
            
            mysqli_stmt_bind_param($que, "ss", $userName, $action);
            mysqli_stmt_execute($que);
            mysqli_stmt_store_result($que);
            header("Location: ../Professors/projects.php?course=$course&section=$section&subject=$subject&post=success");
            exit();
            }

        } 
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}

else
{
    header("Location: ../Professors/projects.php?course=$course&section=$section&subject=$subject");
    exit();
}
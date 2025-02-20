<?php

if (isset($_POST['Delete-Sec']))
{
    
    require 'dbh.inc.php';
    
    
    $id = $_POST['del'];
    $action = $_POST['action'];
    $actions = $_POST['actions'];
    $userName = $_POST['uid'];
    $user = $_POST['user'];
    
    if (empty($id))
    {
        header("Location: ../Sections/404.html");
        exit();
    }
    
    else
    {
        // sql to delete a record
        $sql = "DELETE FROM section where idSection = '".$id."'";

        if (!mysqli_query($conn, $sql)) {
            header("Location: ../Admin/sections.php?error=sqlerror");
            exit();
        }
        else{
            $sql = "insert into activity_log(uidUsers, action)"
            . "values (?,?)";
            $que = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($que, $sql))
            {
                header("Location: ../Admin/sections.php?error=sqlerror");
                exit();
            }
            else
            {
            
            mysqli_stmt_bind_param($que, "ss", $user, $actions);
            mysqli_stmt_execute($que);
            mysqli_stmt_store_result($que);
            header("Location: ../Admin/sections.php?&delete_audit=success");
            exit();
            }

        }
            
        
    }

    mysqli_stmt_close($sql);
    mysqli_close($conn);
    
}

else
{
    header("Location: ../Students/collaboration-board.php?course=$course&section=$section&subject=$subject&id=$projid&projname=$projname&grpno=$grpno&grpid=$grpid&leader=$leader");
    exit();
}
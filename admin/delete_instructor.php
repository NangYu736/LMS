<?php

include_once __DIR__.'/../controller/instructorController.php';

$id=$_POST['id'];

$inst_con=new InstructorController();
$result=$inst_con->deleteInstructor($id);

if($result)
{
    echo "success";
}
else
{
    echo "Can't delete with child data";
}
?>
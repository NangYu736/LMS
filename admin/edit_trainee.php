<?php

include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/traineeController.php';

$id=$_GET['id'];

$trainee_con=new TraineeController();
$trainee=$trainee_con->getTraineeId($id);

if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $city=$_POST['city'];
    $education=$_POST['education'];
    $remark=$_POST['remark'];
   

    $status=$trainee_con->editTrainee($id,$name,$email,$phone,$city,$education,$remark);

    if($status)
    {
        $message=2;
        echo '<script>location.href="trainee.php?status=' .$message. '" </script>';
    }
}
?>

            <main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New Trainee</strong></h1>

                    <div class="row">
                        <div class="col-md-3">
                            <form action="" method="post">
                                <div>
                                    <label for="" class="form-label">Trainee Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $trainee['name'];?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $trainee['email'];?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo $trainee['phone'];?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">City</label>
                                    <input type="text" name="city" class="form-control" value="<?php echo $trainee['city'];?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Education</label>
                                    <input type="text" name="education" class="form-control" value="<?php echo $trainee['education'];?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Education</label>
                                    <input type="text" name="remark" class="form-control" value="<?php echo $trainee['remark'];?>">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-dark" name="update">Update</button>
                                </div>

                            </form>
                           
                        </div>
                    </div>

                								
				</div>
			</main>
<?php
include_once __DIR__.'/../layouts/app_footer.php';
?>
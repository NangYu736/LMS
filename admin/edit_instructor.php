<?php

include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/instructorController.php';

$id=$_GET['id'];

$inst_con=new InstructorController();
$instructor=$inst_con->getInstructorId($id);

if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];

    $status=$inst_con->editInstructor($id,$name,$email,$phone,$address);

    if($status)
    {
        $message=2;
        echo '<script>location.href="instructor.php?status=' .$message. '" </script>';
    }
}

?>

            <main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New Instructor</strong></h1>

                    <div class="row">
                        <div class="col-md-3">
                            <form action="" method="post">
                                <div>
                                    <label for="" class="form-label">Instructor Name</label>
                                    <input type="text" name="name" class="form-control" value="<?php echo $instructor['name'];?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" value="<?php echo $instructor['email'];?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="<?php echo $instructor['phone'];?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" value="<?php echo $instructor['address'];?>">
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
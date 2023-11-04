<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/instructorController.php';
// b_start();

$inst_controller=new InstructorController();
// $categories=$cat_controller->getCategories();
if(isset($_POST['add']))
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];//---->go controller

    $status=$inst_controller->addInstructor($name,$email,$phone,$address);

    if($status)
    {
        echo '<script> location.href="instructor.php?status= '.$status.' "</script>';//url
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
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control">
                                </div>
                                <div>
                                    <label for="" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control">
                                </div>
                                <div class="mt-3">
                                    <button class="btn btn-dark" name="add">Add</button>
                                </div>

                            </form>
                           
                        </div>
                    </div>

                								
				</div>
			</main>
<?php
include_once __DIR__.'/../layouts/app_footer.php';
?>
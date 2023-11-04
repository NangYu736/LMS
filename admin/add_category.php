<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/categoryController.php';
// b_start();

$cat_controller=new CategoryController();

// $categories=$cat_controller->getCategories();

if(isset($_POST['add']))
{
    $name=$_POST['name'];//--->go controller

    $status=$cat_controller->addCategory($name);//<------from controller

    if($status)//insert page
    {
        echo '<script> location.href="category.php?status= '.$status.' "</script>';//url
    }

}
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New Category</strong></h1>

                    <div class="row">
                        <div class="col-md-3">
                            <form action="" method="post">
                                <div>
                                    <label for="" class="form-label">Category Name</label>
                                    <input type="text" name="name" class="form-control">
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
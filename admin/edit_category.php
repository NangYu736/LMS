<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/categoryController.php';
// b_start();

$id=$_GET['id'];//take id from url

$cat_con=new CategoryController();
$category=$cat_con->getCategoryId($id);//put id into value

if(isset($_POST['update']))
{
    $name=$_POST['name'];

    $status=$cat_con->editCategory($id,$name);//<---update

    if($status)
    {
        $message=2;
        echo '<script>location.href="category.php?status='.$message.'"</script>';
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
                                    <input type="text" name="name" id="" class="form-control" value="<?php echo $category['name']; ?>">
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
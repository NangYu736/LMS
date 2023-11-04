<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/categoryController.php';
include_once __DIR__.'/../controller/courseController.php';
// b_start();

$cat_controller=new CategoryController();
$categories=$cat_controller->getCategories();

$course_con=new CourseController();

if(isset($_POST['add']))
{
    $name=$_POST['name'];
    $cat_id=$_POST['category'];
    $outline=$_POST['outline'];
    $image=$_FILES['image'];
    // var_dump($image);
        
    $status=$course_con->addCourses($name,$cat_id,$outline,$image);

    if($status)
    {
        echo "<script>location.href='course.php'</script>";
    }

}
?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Add New Course</strong></h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class='my-3'>
                                    <label for="" class="form-label">Course Name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Course Category Name</label>
                                    <select name="category" class="form-select">
                                        <?php
                                            foreach($categories as $category)
                                            {
                                                echo "<option value=" .$category['id'] ." > ".$category['name'] . "</option>";
                                            }
                                        ?>
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Course Outline</label>
                                    <textarea name="outline" id="" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class='my-3'>
                                    <label for="" class="form-label">Course Feature Image</label>
                                    <input type="file" name="image" class="form-control">
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
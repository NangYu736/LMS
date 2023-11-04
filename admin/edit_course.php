<?php
include_once __DIR__.'/../layouts/sidebar.php';
include_once __DIR__.'/../controller/courseController.php';
include_once __DIR__.'/../controller/categoryController.php';
// b_start();

$id=$_GET['id'];//take id from url

$cat_con=new CategoryController();
$categories=$cat_con->getCategories();

$course_con=new CourseController();
$course=$course_con->getCourseId($id);//put id into value

if(isset($_POST['update']))
{
    $name=$_POST['name'];
    $category=$_POST['category'];
    $outline=$_POST['outline'];

    $status=$course_con->editCourse($id,$name,$category,$outline);//<---update

    if($status)
    {
        $message=2;
        echo '<script>location.href="course.php?status='.$message.'"</script>';
   }
}



?>

			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Edit Course</strong></h1>

                    <div class="row">
                        <div class="col-md-12">
                            <form action="" method="post">
                                <div>
                                    <label for="" class="form-label">Course Name</label>
                                    <input type="text" name="name" id="" class="form-control" value="<?php echo $course['name']; ?>">
                                </div>
                                <div>
                                    <label for="" class="form-label">Course Category Name</label>
                                    <select name="category" id="" class="form-select">
                                        <?php
                                            foreach($categories as $category)
                                            {
                                                if($category['id']==$course['cat_id'])
                                                 
                                                echo "<option value=" .$category['id']." selected>" .$category['name'] ."</option>";
                                                else

                                                echo "<option value=" .$category['id']. ">" .$category['name'] ."</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="" class="form-label">Course outline</label>
                                    <textarea  name="outline" id="" cols="30" rows="10" class="form-control"><?php echo $course['outline']; ?></textarea>
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
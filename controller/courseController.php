<?php
include_once __DIR__.'/../model/course.php';

class CourseController extends Course
{
    public function getCourses()
    {
       return $this->getCoursesList();
    }

    public function addCourses($name,$cat_id,$outline,$image)
    {
        if($image['error']==0)
        {
            $filename=$image['name'];
            $extension=explode('.',$filename);
            $filetype=end($extension);
            $filesize=$image['size'];
            $allowed_types=['jpg','jpeg','svg','png'];
            $temp_file=$image['tmp_name'];
            if(in_array($filetype,$allowed_types))
            {
                if($filesize <= 2000000)
                {
                    $timestamp=time();
                    // die(var_dump(($timestamp)));
                    $filename=$timestamp.$filename;
                    if(move_uploaded_file($temp_file,'../uploads/' . $filename))
                    return $this->createCourse($name,$cat_id,$outline,$filename);
                }            
            }
        }
    }

    public function getTotalCourse()
    {
        return $this->getNumCourse();
    }

    public function getCourseId($id)
    {
        return $this->getCourseInfo($id);
    }

    public function editCourse($id,$name,$category,$outline)
    {
        return $this->updateCourse($id,$name,$category,$outline);
    }

}


?>
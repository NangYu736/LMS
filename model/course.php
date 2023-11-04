<?php
include_once __DIR__.'/../vendor/db/db.php';

class Course
{
    public function getCoursesList()
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.write sql
        $sql="SELECT course.id as id,course.name as cname,category.name as catname,course.outline as coutline
        from course join category
        on course.cat_id=category.id";

        $statement=$con->prepare($sql);

        //3.sql excute
        if($statement->execute())
        {
             //4.result
             //data fetch()=>one row, fetchAll()=>multiple rows
             $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function createCourse($name,$cat_id,$outline,$filename)
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.write sql
        $sql="INSERT INTO course(name,cat_id,outline,image) values(:name,:category,:outline,:image)";
        $statement=$con->prepare($sql);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':category',$cat_id);
        $statement->bindParam(':outline',$outline);
        $statement->bindParam(':image',$filename);

        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getNumCourse()
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.write sql
        $sql="SELECT category.name as name, COUNT(course.cat_id) as total
        FROM course JOIN category
        ON course.cat_id=category.id
        GROUP by course.cat_id";

        $statement=$con->prepare($sql);

        //3.sql excute
        if($statement->execute())
        {
             //4.result
             //data fetch()=>one row, fetchAll()=>multiple rows
             $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;     
    }

    public function getCourseInfo($id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.write sql
        $sql="select * from course where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);

        //3.sql excute
        if($statement->execute())
        {
           $result=$statement->fetch(PDO::FETCH_ASSOC);
           return $result;
        }
    }

    public function updateCourse($id,$name,$category,$outline)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.write sql
        $sql="UPDATE course set name=:name,cat_id=:category,outline=:outline where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':category',$category);
        $statement->bindParam(':outline',$outline);
        

        //3.sql excute
        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}

?>
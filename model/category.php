<?php
include_once __DIR__.'/../vendor/db/db.php';

class Category{

    public function getCategoriesList()
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.write sql
        $sql="SELECT * from category";
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

    public function createCategory($name)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.write sql
        $sql="INSERT INTO category(name) values(:name)";  //value=>varaiable 
        $statement=$con->prepare($sql);
        $statement->bindParam(':name',$name);
        
        if($statement->execute())
        {
            return true;
        }
        else
        {
            return false;
        }
        

    }

    public function getCategoryInfo($id)
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.write sql
        $sql="SELECT * from category 
        where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);

        //3.sql excute
        if($statement->execute())
        {
             //4.result
             //data fetch()=>one row, fetchAll()=>multiple rows
             $result=$statement->fetch(PDO::FETCH_ASSOC);
             return $result;
        } 
    }

    public function updateCategory($id,$name)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.write sql
        $sql="UPDATE category set name=:name where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':id',$id);

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

    public function deleteCategoryInfo($id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.write sql
        $sql="DELETE from category where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':id',$id);

        try
        {
            $statement->execute();
            return true;
        }
        catch(PDOException $e)
        {
            return false;
        }
    }
    



}
?>
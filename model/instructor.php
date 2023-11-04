<?php
include_once __DIR__.'/../vendor/db/db.php';

class Instructor
{
    public function getInstructorList()
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT * from instructor";
        $statement=$con->prepare($sql);

        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function createInstructor($name,$email,$phone,$address)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.write sql

        $vals = array(
            ':name'    => $name,
            ':email'   => $email,
            ':phone'   => $phone,
            ':address' => $address,            
         );
                                     //column name
        $sql="INSERT INTO instructor(name,email,phone,address) values (:name,:email,:phone,:address)";
        $statement=$con->prepare($sql);
        $statement->bindParam(':name',$name,':email',$email,':phone',$phone,':address',$address);
        
        if($statement->execute($vals))
        {
            return true;
        }
        else
        {
            return false;
        }

        // $result=$statement->execute(array(':name'    => $name,
        // ':email'   => $email,
        // ':phone'   => $phone,
        // ':address' => $address,    ));

        // if($result)
        // {
        //     return true;
        // }
        // else
        // {
        //     return false;
        // }
    }

    public function getInstructorInfo($id)
    {
        //1.db connection
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.write sql
        $sql="SELECT * from instructor
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

    public function updateInstructor($id,$name,$email,$phone,$address)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.write sql
        $sql="UPDATE instructor set name=:name,email=:email,phone=:phone,address=:address where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':email',$email);
        $statement->bindParam(':phone',$phone);
        $statement->bindParam(':address',$address);
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

    public function deleteInstructorInfo($id)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.write sql
        $sql="DELETE from instructor where id=:id";
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
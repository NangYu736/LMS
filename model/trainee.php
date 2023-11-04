<?php
include_once __DIR__.'/../vendor/db/db.php';

class Trainee
{
    public function getTraineeList()
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        $sql="SELECT * from trainee";
        $statement=$con->prepare($sql);

        if($statement->execute())
        {
            $result=$statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $result;
    }

    public function createTrainee($name,$email,$phone,$city,$education,$remark)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.write sql

        $vals = array(
            ':name'    => $name,
            ':email'   => $email,
            ':phone'   => $phone,
            ':city'    => $city, 
            ':education'=>$education,
            ':remark'  =>$remark,        
         );
                                     //column name
        $sql="INSERT INTO trainee(name,email,phone,city,education,remark) values(:name,:email,:phone,:city,:education,:remark)";
        $statement=$con->prepare($sql);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':email',$email);
        $statement->bindParam(':phone',$phone);
        $statement->bindParam(':city',$city);
        $statement->bindParam(':education',$education);
        $statement->bindParam(':remark',$remark);
        
        if($statement->execute($vals))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getTraineeInfo($id)
    {
         //1.db connection
         $con=Database::connect();
         $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
 
         //2.write sql
         $sql="SELECT * from trainee
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

    public function updateTrainee($id,$name,$email,$phone,$city,$education,$remark)
    {
        $con=Database::connect();
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        //2.write sql
        $sql="UPDATE trainee set name=:name,email=:email,phone=:phone,city=:city,education=:education,remark=:remark where id=:id";
        $statement=$con->prepare($sql);
        $statement->bindParam(':name',$name);
        $statement->bindParam(':email',$email);
        $statement->bindParam(':phone',$phone);
        $statement->bindParam(':city',$city);
        $statement->bindParam(':education',$education);
        $statement->bindParam(':remark',$remark);
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
    
}


?>
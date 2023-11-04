<?php

include_once __DIR__.'/../model/trainee.php';

class TraineeController extends Trainee
{
    public function getTrainees()
    {
        return $this->getTraineeList();   
    }

    public function addTrainee($name,$email,$phone,$city,$education,$remark)
    {
        return $this->createTrainee($name,$email,$phone,$city,$education,$remark);
    }

    public function getTraineeId($id)
    {
        return $this->getTraineeInfo($id);
    }

    public function editTrainee($id,$name,$email,$phone,$city,$education,$remark)
    {
        return $this->updateTrainee($id,$name,$email,$phone,$city,$education,$remark);
    }
}



?>
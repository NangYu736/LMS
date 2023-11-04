<?php
include_once __DIR__.'/../model/category.php';

class CategoryController extends Category
{
    public function getCategories()
    {
       return $this->getCategoriesList();
    }
    
    public function addCategory($name)// name from form
    {
        return $this->createCategory($name);//--->go model
    }

    public function getCategoryId($id)
    {
        return $this->getCategoryInfo($id);
    }

    public function editCategory($id,$name)
    {
        return $this->updateCategory($id,$name);
    }
    
    public function deleteCategory($id)
    {
        return $this->deleteCategoryInfo($id);
    }


}


?>
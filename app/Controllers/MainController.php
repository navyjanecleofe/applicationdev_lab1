<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MainModel;
#use App\Models\MainModel2;
class MainController extends BaseController
{
    public function delete($Id){
        $main=new MainModel();
        $main->delete($Id);
        return redirect()->to('/test');
    }
   /* public function updates(){
  
        $data =[
            'student_Id' => $this->request->getPost('student_Id'),
            'full_name' => $this->request->getPost('full_name'),
            'year_level' => $this->request->getPost('year_level'),
            'program' => $this->request->getPost('program'),
        ];
        $main = new MainModel();
        $main->set($data)->where('Id', $Id)->update();
        return redirect()->to('/test');
    }*/
    public function update($Id)
    {
        $main = new MainModel();
        
        $data = [ 
           // 'd'=> $main->where('Id', $Id)->first(),
            'main' => $main -> findAll(),
            'd'=> $main->find($Id),
            //'tt' => 'update'
        ];
        return view('main', $data);
    }
    
    /*public function update($Id)
    {
        $main = new MainModel();
        $data = [ 
            'main'=> $main->where('Id', $Id)->first(),
            'main'=> $main -> FindAll(),
        ];
        return view('main', $data);
    }
    public function update($Id)
    {
    $mainModel = new MainModel();

    // Fetch the record with the given Id
    $main = $mainModel->where('Id', $Id)->first();

    if ($main) {
        // Perform the update logic here if needed

        // Retrieve all records (assuming 'FindAll' returns all records)
        $main = $mainModel->FindAll();

        // Pass the updated record and all records to the view
        $data = [
            'main' => $main,
            'main' => $main,
        ];

        return view('main', $data);
    } else {
        // Handle the case where the record with the given Id was not found
        // You can redirect or display an error message
    }
    }*/

    
    public function Save()
    {
        $id=$this->request->getPost('id');
        $data=[
           // 'StudentID' => $this->request->getPost('StudentID'),
            'StudName' => $this->request->getPost('StudName'),
            'StudGender' => $this->request->getPost('StudGender'),
            'StudCourse' => $this->request->getPost('StudCourse'),
            'StudSection' => $this->request->getPost('StudSection'),
            'StudYear' => $this->request->getPost('StudYear'),
        ];
        $main=new MainModel();
        if(!empty($id)){
            $main->update($id,$data);
        }else{
            $main->Save($data);
        }
        //$main->Save($data);
        return redirect()->to('/test');
    }
    public function test()
    {
        $main = new MainModel();
        $data['main'] = $main->findAll();
        //var_dump($data);
        return view('main',$data);
    }
   
}

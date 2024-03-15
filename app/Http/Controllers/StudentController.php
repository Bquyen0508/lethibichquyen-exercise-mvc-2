<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class StudentController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getStudents(){
        $studentModel = new Student();
        $students = $studentModel->getRows();
        echo json_encode($students);
    }

    public function showStudents()
    {
        $studentModel = new Student();
        $students = $studentModel->getRows();
        return view('Students', compact('students'));
    }

    public function getStudentsById($id)
    {
        $studentModel = new Student();
        $rows = $studentModel->getRows();

        if (isset($rows[$id])) {
            echo json_encode($rows[$id]);
        } else {
            echo 'Student not found';
        }
    
    } 
}

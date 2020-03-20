<?php

namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $students;

    public function __construct()
    {
        /*    $this->students = [
            [
                'img' => 'https://www.topolino.it/wp-content/uploads/2019/12/pippointera.png',
                'name' => 'Pippo',
                'age' => 30,
                'company' => 'Disney',
                'description' => 'lorem ipsum',
                'role' => 'Web Developer',
                'gender' => 'm',
                'slug' => 'pippo'
            ],
            [
                'img' => 'https://www.cartonionline.com/immagini/topolino/topolino.jpg',
                'name' => 'Topolino',
                'age' => 50,
                'company' => 'Disney',
                'description' => 'lorem ipsum',
                'role' => 'Backend Developer',
                'gender' => 'm',
                'slug' => 'topolino'
            ],
            [
                'img' => 'https://wips.plug.it/cips/supereva/cms/2019/07/104750479_l.jpg?w=850&a=r',
                'name' => 'Minnie',
                'age' => 50,
                'company' => 'Disney',
                'description' => 'lorem ipsum',
                'role' => 'Frontend Developer',
                'gender' => 'f',
                'slug' => 'minnie'
            ]
        ];*/
        //select * from students
        $this->students = Student::all();
        dd($this->students);
    }

    public function index() 
    {
        //$students = $this->students;
        $data = [
            'students' => $this->students,
            'genders' => ['m', 'f'],
            'title' => 'Carriere'
        ];

        return view('students.index', $data);

    }

    public function getStudents() {
        return $this->students;
    }
}

// $newStudent = new StudentController;
// $newStudent->students;

// class StudentControllerFiglio extends StudentController
// {

    

//     public function index()
//     {
//         //$students = $this->students;
//         $pippo = $this->students;
//     }

    
// }

// $newStudent = new StudentControllerFiglio;
// $newStudent->students;
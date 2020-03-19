<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    private $students;

    public function __construct()
    {
        $this->students = [
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
                'img' => 'https://www.cartonionline.com/immagini/topolino/topolino.jpg',
                'name' => 'Topolino',
                'age' => 30,
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
        ];
    }

    public function all()
    {
        $students = $this->students;
        return response()->json($students);

    }

    public function getAge()
    {
        $students = $this->students;

        $studentsAge = [];

        foreach ($students as $student) {
            $thisName = $student['name'];

            $studentsAge[$thisName] = $student['age'];
        }

        // restituisco
        return response()->json($studentsFiltered);

    }

    public function getForAge($age)
    {
        $students = $this->students;

        $studentsFiltered = [];

        foreach ($students as $student) {
            if($student['age'] == $age) {
                $studentsFiltered[] = $student;
            }
        }

        // restituisco
        return response()->json($studentsFiltered);

    }

    public function getForName($name)
    {
        $students = $this->students;

        $studentsFiltered = [];

        foreach ($students as $student) {
            if($student['name'] == $name) {
                $studentsFiltered[] = $student;
            }
        }

        // restituisco
        return response()->json($studentsFiltered);

    }

    public function getForGender($gender)
    {
        $students = $this->students;

        $studentsFiltered = [];

        foreach ($students as $student) {
            if($student['gender'] == $gender) {
                $studentsFiltered[] = $student;
            }
        }

        // restituisco
        return response()->json($studentsFiltered);

    }

    public function filter(Request $request)
    {
        // $students = config('students.students');
        $students = $this->students;
        
        //tipi ammessi
        $tyeRequest = [
            'name',
            'age',
            'gender'
        ];

        //prendo tutti i request
        $data = $request->all();
        
        //elimino quelli non desiderati confrontandoli con i tipi ammessi
        foreach (array_keys($data) as $value) {
            if(!in_array($value, $tyeRequest)) {
                unset($data[$value]);
            }
        }

        //per ogni data chiamo funzione che filtra
        foreach ($data as $key => $value) {
            //se siamo al primo giro
            if($key == array_key_first($data)) {
                //filtro studenti
                $studentsFiltered = $this->getFor($key, $value, $students);;
            } else {
                //se sono ai successivi filtro con $filteredStudents
                $studentsFiltered = $this->getFor($key, $value, $studentsFiltered);
            }
        }

        // restituisco
        return response()->json($studentsFiltered);

    }

    /*public function filter(Request $request)
    {
        // $students = config('students.students');
        $students = $this->students;
        $data = $request->all();

        if(!empty($data['age'])) {
            $age = $data['age'];
        }
        if(!empty($data['name'])) {
            $name = $data['name'];
        }

       

        $studentsFiltered = [];

        //filtriamo su age
        if(!empty($age)) {
            foreach ($students as $student) {
                if ($student['age'] == $age) {
                    $studentsFiltered[] = $student;
                }
            }
        }
        
        // filtriamo su name
        if(count($studentsFiltered) > 0 && !empty($name)) {
            $studentsFilteredName = [];
            foreach ($studentsFiltered  as $student) {
                if ($student['name'] == $name) {
                    $studentsFilteredName[] = $student;
                }
            }
            $studentsFiltered = $studentsFilteredName;
        } elseif(count($studentsFiltered) == 0 && !empty($name)) {
            
            $studentsFilteredName = [];
            foreach ($students as $student) {
                if ($student['name'] == $name) {
                    $studentsFilteredName[] = $student;
                }
            }
            $studentsFiltered = $studentsFilteredName;
        }
        
        
        return response()->json($studentsFiltered);

    }*/

    //questa funzione possiamo usarla solo nella classe perché è privata
    private function getFor($type, $value, $array)
    {
    
        $arrayFiltered = [];

        foreach ($array as $element) {
            if ($element[$type] == $value) {
                $arrayFiltered[] = $element;
            }
        }

        return $arrayFiltered;
    }


}

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
        return response()->json($studentsAge);

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
    
    public function filter(Request $request) {
        $students = $this->students;

        // data ammnessi per filtare
        $typeRequest = [
            'age',
            'name',
            'gender'
        ];
        $data = $request->all();

        foreach ($data as $key => $value) {
            if(!in_array($key, $typeRequest)) {
                unset($data[$key]);
            }
        }

        //i data sono filtrati e quindi sono data ammessi

        foreach ($data as $key => $value) {
            //se siamo al primo giro uso students
            if(array_key_first($data) == $key) {
                $studentsFiltered = $this->filterFor($key, $value, $students);
            } 
            //in tutti gli altri casi uso studentsFiltered
            else {
                $studentsFiltered = $this->filterFor($key, $value, $studentsFiltered);
            }
        }


        return response()->json($studentsFiltered);
    }

    private function filterFor($type, $value, $array)
    {
        
        $filtered = [];
        foreach ($array as $element) {
            if ($element[$type] == $value) {
                $filtered[] = $element;
            }
        }
        return $filtered;
    }

}

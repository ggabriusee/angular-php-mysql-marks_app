<?php

namespace App\Service;

use App\Repository\StudentRepository;
use App\Entity\Student;

class StudentService
{
    /**
     * Transform student object to array of response fields
     *
     * @param Student student to transform
     *
     * @return array
     */
    public function transform(Student $student){
        $extractMarkValue = function($mark) {
            return $mark->getMark();
        };

        $result = [
            'Universitetas' => $student->getUniversity()->getName(),
            'Vardas Pavardė' => $student->getFirstName() . " " . $student->getLastName(),
        ];

        foreach($student->getSubjects() as $subject)
        {
            $marks = $subject->filterMarksByStudent($student)->map($extractMarkValue)->toArray();
            $result[$subject->getName()] = round(array_sum($marks)/count($marks), 1);
        }
        
        return $result;
    }
    
    /**
     * Transform every student object
     *
     * @param Student[] $array of students
     *
     * @return array
     */
    public function getMarkMeansData($students){
        $ret = [];

        foreach ($students as $s) {
            if($s->getUniversity()->getName() !== null)
                $ret[] = $this->transform($s);
        }

        return $ret;
    }
}
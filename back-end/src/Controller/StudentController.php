<?php
namespace App\Controller;

use App\Entity\Mark;
use App\Repository\StudentRepository;
use App\Service\StudentService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class StudentController extends ApiController
{
    /**
    * @Route("/students", methods="GET")
    */
    public function index(StudentRepository $studentRepository, StudentService $studentService)
    {
        $students = $studentRepository->getAllStudents();
        $responseData = $studentService->getMarkMeansData($students);
        return $this->respond($responseData);
    }

    /**
    * @Route("/students", methods="POST")
    */
    public function indexPost(Request $request, StudentRepository $studentRepository, StudentService $studentService)
    {
        $request = $this->transformJsonBody($request);
        return $this->index($studentRepository, $studentService);
    }

}
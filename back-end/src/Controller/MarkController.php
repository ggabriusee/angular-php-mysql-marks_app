<?php
namespace App\Controller;

use App\Entity\Mark;
use App\Repository\MarkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class MarkController extends ApiController
{
    /**
    * @Route("/marks", methods="GET")
    */
    public function index(MarkRepository $markRepository)
    {
        $marks = $markRepository->findAll();
        return $this->respond($marks);
    }

    /**
    * @Route("/marks/{id}/mark", methods="POST")
    */
    public function increaseMark($id, EntityManagerInterface $em, MarkRepository $markRepository)
    {
        $mark = $markRepository->find($id);

        if (! $mark) {
            return $this->respondNotFound();
        }

        $mark->setMark($mark->getMark() + 1);
        $em->persist($mark);
        $em->flush();

        return $this->respond([
            'mark' => $mark->getMark()
        ]);
    }

}
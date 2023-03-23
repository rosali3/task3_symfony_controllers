<?php

namespace App\Controller\Tree;
use App\Entity\Tree;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping as ORM;
class TreeDeleteController extends AbstractController
{
    public function __invoke(Tree\Tree $tree): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($tree);
        $entityManager->flush();

        return $this->json(null, 204);
    }
}

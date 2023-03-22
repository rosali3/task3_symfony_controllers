<?php

namespace App\Controller\TreeGetCollectionController;

use App\Entity\Tree;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class TreeGetCollectionController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager){
    }

    #[NoReturn] public function __invoke(Request $request)
    {
        dd(json_decode($request->getContent()));

        //$trees = $this->getDoctrine()->getRepository(Tree\Tree::class)->findAll();

        //return $this->json($trees);
    }
}

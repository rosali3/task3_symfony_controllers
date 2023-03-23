<?php

namespace App\Controller\Tree;
use App\Entity\Tree;
use Doctrine\ORM\EntityManagerInterface;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class TreeGetItemController extends AbstractController
{
    public function __construct(EntityManagerInterface $entityManager){
    }

    public function __invoke(Tree\Tree $tree,
                             Request   $request): \Symfony\Component\HttpFoundation\JsonResponse
    {

        // dd(json_decode($request->getContent()));
        return $this->json($tree);

        //$trees = $this->getDoctrine()->getRepository(Tree\Tree::class)->findAll();

        //return $this->json($trees);
    }
}

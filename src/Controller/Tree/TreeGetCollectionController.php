<?php

namespace App\Controller\Tree;

use App\Entity\Tree;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use JetBrains\PhpStorm\NoReturn;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

class TreeGetCollectionController extends AbstractController
{
    public function __construct(private ManagerRegistry $doctrine) {}

    public function __invoke(Request $request)
    {        $this->doctrine;


        dd(json_decode($request->getContent()));

        //$trees = $this->getDoctrine()->getRepository(Tree\Tree::class)->findAll();

        //return $this->json($trees);
    }
}

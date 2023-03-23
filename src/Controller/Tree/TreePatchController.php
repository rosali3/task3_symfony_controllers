<?php

namespace App\Controller\Tree;

use App\Entity\Tree;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping as ORM;

class TreePatchController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        // $this->doctrine;
        }
    public function __invoke(Request $request, Tree\Tree $tree, $entityManager): Response // JsonResponse
    {   //$data = json_decode($request->getContent(), true);

        if ($request->request->has('name')) {
            $tree->setTitle($request->request->get('title'));
        }
        // if (isset($data['name'])) {
        //            $user->setName($data['name']);

        if ($request->request->has('description')) {
            $tree->setDescription($request->request->get('description'));
        }

        $this->$entityManager->persist($tree);
        $this->$entityManager->flush();


        return $this->json([
            'message' => 'User updated successfully',
            'tree' => $tree,
            ]);
    }
}

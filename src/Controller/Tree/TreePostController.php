<?php

namespace App\Controller\Tree;

use App\Entity\Tree;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\ORM\Mapping as ORM;

class TreePostController extends AbstractController
{
    protected EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager){
        $this->entityManager = $entityManager;
    }

        public function __invoke(Request $request, Tree\Tree $tree): Response//JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $tree = new Tree\Tree();

        $tree->setTitle($request->request->get('title'));
        $tree->setDescription($request->request->get('description'));

        $entityManager = $this->entityManager;
        $entityManager->persist($tree);
        $entityManager->flush();
        return $this->json([
            'message' => 'User updated successfully',
            'tree' => $tree,
        ]);

        // Получаем ID пользователя для указания автора поста
        //$data['user_id'] = $_SESSION['user']['id'];
        // Создаем новый экземпляр сущности поста
        //$post = new PosterEntity($data);
        // Производим сохранение поста в БД
        //$post->save();
        // Проходимся по всем переданным файлам и создаем для них новую запись в БД
        //foreach ($filesData as $file) {
          //  self::createFileEntity($file, $post->getId());}
        //Сохраняем ID поста для перенаправления на только что созданный пост
        //$_SESSION['detail_post'] = $post->getId();
        //Перенаправляем на страницу с детальной информацией о посте
        //Router::redirect('/detail-post');
        //die();

    }
}

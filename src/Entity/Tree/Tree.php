<?php

namespace App\Entity\Tree;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\Patch;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Put;
use App\Controller\Tree\TreeDeleteController;
use App\Controller\Tree\TreeGetCollectionController;
use App\Controller\Tree\TreeGetItemController;
use App\Controller\Tree\TreePatchController;
use App\Controller\Tree\TreePostController;
use App\Controller\Tree\TreePutController;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource(
    operations:
        [
            new Post(
                uriTemplate:'tree.{_format}',
                controller: TreePostController::class,
                name:'CreateANewTree'),
            new Get(
                uriTemplate:'tree/{id}.{_format}', // /users/{id}/reset-password?hash=
                controller: TreeGetItemController::class,
                name:'GetInfoAboutOneTree'),
            new GetCollection(
                uriTemplate:'tree.{_format}',
                controller: TreeGetCollectionController::class,
                name:'GetCollectionOfTrees'),
            new Put(
                uriTemplate:'tree/{id}.{_format}',
                controller: TreePutController::class,
                name:'ReplaceATree'),
            new Patch(
                uriTemplate:'tree/{id}.{_format}',
                controller: TreePatchController::class,
                name:'UpdateATree'),
            new Delete(
                uriTemplate:'tree/{id}.{_format}',
                controller: TreeDeleteController::class,
                name:'DeleteATree')
        ])]

class Tree
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: "AUTO")]
    #[ORM\Column(type: "integer", nullable: true)]
    private ?int $Id = null;

    #[ORM\Column(type: "string",length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: "text")]
    private ?string $description = null;


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->Id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string // чтение
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void // изменение
    {
        $this->title = $title;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

}

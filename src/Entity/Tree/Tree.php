<?php

namespace App\Entity\Tree;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use ApiPlatform\Metadata\Post;
use App\Controller\TreeGetCollectionController\TreeGetCollectionController;
use App\Controller\TreeGetItemController\TreeGetItemController;
use App\Controller\TreePostController\TreePostController;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ApiResource(
    operations:
        [
            new Post(uriTemplate:'tree/post',
                controller: TreePostController::class,
                name:'CreateANewTree'
                ),
            new Get(uriTemplate:'tree/get',
                controller: TreeGetItemController::class,
                name:'GetInfoAboutOneTree'),

            new GetCollection(uriTemplate:'tree/get-collection',
                                controller: TreeGetCollectionController::class,
                                name:'GetCollectionOfTrees')
        ]

)]

class Tree
{   #[ORM\Id]
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
     * @param int|null $Id
     */
    public function setId(?int $Id): void
    {
        $this->Id = $Id;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
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

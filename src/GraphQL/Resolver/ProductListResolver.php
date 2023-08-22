<?php

namespace App\GraphQL\Resolver;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\QueryInterface;

class ProductListResolver implements  QueryInterface, AliasedInterface
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function resolve($category = null): array
    {
        if ($category === null) {
            return [
                'products' => $this->em->getRepository(Product::class)->findAll()
            ];
        }

        return [
            'products' => $this->em->getRepository(Product::class)->findBy(['category' => $category])
        ];
    }

    public static function getAliases(): array
    {
        return [
            'resolve' => 'ProductList'
        ];
    }
}
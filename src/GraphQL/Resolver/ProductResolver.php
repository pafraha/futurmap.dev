<?php

namespace App\GraphQL\Resolver;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\QueryInterface;

class ProductResolver implements QueryInterface, AliasedInterface
{
    /**
     * @var EntityManagerInterface
     */
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function resolve($id)
    {
        return $this->em->getRepository(Product::class)->find($id);
    }

    public static function getAliases(): array
    {
        return [
            'resolve' => 'Product'
        ];
    }
}
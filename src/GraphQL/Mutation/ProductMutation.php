<?php

namespace App\GraphQL\Mutation;

use App\Entity\Category;
use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Overblog\GraphQLBundle\Definition\Argument;
use Overblog\GraphQLBundle\Definition\Resolver\AliasedInterface;
use Overblog\GraphQLBundle\Definition\Resolver\MutationInterface;

class ProductMutation implements MutationInterface, AliasedInterface
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createProduct(Argument $args): Product
    {
        $product = new Product();

        $category = $this->em->getRepository(Category::class)->find($args['input']['category']);

        $product->setName($args['input']['name']);
        $product->setPrice($args['input']['price']);
        $product->setCategory($category);
        $product->setQuantity($args['input']['quantity']);

        $this->em->persist($product);
        $this->em->flush();

        return $product;
    }

    public static function getAliases(): array
    {
        return [
            'createProduct' => 'create_product'
        ];
    }
}
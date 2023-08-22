<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Overblog\GraphQLBundle\Annotation as GQL;

/**
 * @GQL\Type
 */

class ProductType
{
    /**
     * @GQL\Field(type="String!")
     */
    public $name;

    /**
     * @GQL\Field(type="Int!")
     */
    public $quantity;

    /**
     * @GQL\Field(type="Float!")
     */
    public $price;

    /**
     * @GQL\Field(type="CategoryType")
     */
    public $category;
}

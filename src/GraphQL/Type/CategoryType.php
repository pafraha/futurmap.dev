<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Overblog\GraphQLBundle\Annotation as GQL;

/**
 * @GQL\Type
 */
class CategoryType
{
    /**
     * @GQL\Field(type="String!")
     */
    public $name;
}

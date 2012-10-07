<?php
namespace Phpforce\Mapper\Mapping;

use Doctrine\Common\Annotations\Annotation;

/**
 * @Annotation
 */
class Field extends Annotation
{
    public $name;
}
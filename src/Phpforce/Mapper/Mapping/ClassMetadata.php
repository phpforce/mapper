<?php
namespace Phpforce\Mapper\Mapping;

use Doctrine\Common\Persistence\Mapping\ClassMetadata as ClassMetadataInterface;
use Doctrine\Common\Persistence\Mapping\ReflectionService;

class ClassMetadata implements ClassMetadataInterface
{
    /**
     * Class name
     *
     * @var string
     */
    public $name;

    /**
     * Salesforce object name
     *
     * @var string
     */
    public $objectName;

    public $fieldMappings = array();

    public function __construct($name)
    {
        $this->name = $name;

        //
    }

    public function getAssociationMappedByTargetField($assocName)
    {

    }

    public function getAssociationNames()
    {

    }

    public function getAssociationTargetClass($assocName)
    {

    }

    public function getFieldNames()
    {
        return array_keys($this->fieldMappings);
    }

    public function getIdentifier()
    {

    }

    public function getIdentifierFieldNames()
    {

    }

    public function getIdentifierValues($object)
    {

    }

    public function getName()
    {

    }

    public function getReflectionClass()
    {
        return $this->reflClass;
    }

    public function getTypeOfField($fieldName)
    {

    }

    public function hasAssociation($fieldName)
    {

    }

    public function hasField($fieldName)
    {

    }

    public function isAssociationInverseSide($assocName)
    {

    }

    public function isCollectionValuedAssociation($fieldName)
    {

    }

    public function isIdentifier($fieldName)
    {

    }

    public function isSingleValuedAssociation($fieldName)
    {

    }

    public function initializeReflection(ReflectionService $reflService)
    {
        $this->reflClass = $reflService->getClass($this->name);
//        $this->namespace = $reflService->getClassNamespace($this->name);
    }
}
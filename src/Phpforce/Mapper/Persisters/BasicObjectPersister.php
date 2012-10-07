<?php
namespace Phpforce\Mapper\Persisters;

use Phpforce\Mapper\ObjectManager;
use Phpforce\Mapper\Mapping\ClassMetadata;

class BasicObjectPersister
{
    protected $objectManager;
    protected $classMetadata;

    public function __construct(ObjectManager $objectManager, ClassMetadata $classMetadata)
    {
        $this->objectManager = $objectManager;
        $this->classMetadata = $classMetadata;
    }

    public function load(array $criteria)
    {
        $objectName = $this->classMetadata->objectName;

        $query = 'select ' . implode($this->classMetadata->getFieldNames())
        . ' from ' . $objectName
        . ' where ' .
        var_dump($this->classMetadata->getFieldNames());die;
    }

    protected function expandCriteria(array $criteria)
    {
        foreach ($criteria as $key => $value) {
            
        }
    }
}
<?php
namespace Phpforce\Mapper;

use Phpforce\Mapper\Persisters\BasicObjectPersister;

class UnitOfWork
{
    protected $om;
    protected $identityMap = array();

    public function __construct(ObjectManager $om)
    {
        $this->om = $om;
    }

    public function tryGetById($id, $className)
    {
        if (isset($this->identityMap[$className][$id])) {
            return $this->identityMap[$className][$id];
        }

        return false;
    }

    public function getEntityPersister($className)
    {
        return new BasicObjectPersister($this->om, $this->om->getClassMetadata($className));
    }

    public function registerManaged($record, $id, array $originalData)
    {
        $this->addToIdentityMap($record);
    }

    public function addToIdentityMap($record)
    {
        $class = $this->om->getClassMetadata(\get_class($record));
        $this->identityMap[$class->name][$record->getId()] = $record;
    }
}


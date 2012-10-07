<?php
namespace Phpforce\Mapper;

use Phpforce\SoapClient\ClientInterface;
use Doctrine\Common\Persistence\ObjectManager as ObjectManagerInterface;
use Phpforce\Mapper\Mapping\ClassMetadataFactory;

class ObjectManager implements ObjectManagerInterface
{
    protected $client;
    protected $unitOfWork;

    public function __construct(ClientInterface $client)
    {
        $this->client = $client;
        $this->metadataFactory = new ClassMetadataFactory();
        $this->metadataFactory->setEntityManager($this);

        $this->unitOfWork = new UnitOfWork($this);
    }

    public function getClient()
    {
        return $this->client;
    }

    public function clear($objectName = null)
    {

    }

    public function contains($object)
    {

    }

    public function detach($object)
    {

    }

    public function find($entityName, $id)
    {
        $class = $this->metadataFactory->getMetadataFor(ltrim($entityName, '\\'));

        $record = $this->unitOfWork->tryGetById($id, $class->name);
        if ($record) {
            return $record;
        }

        $persister = $this->unitOfWork->getEntityPersister($class->name);

        $record = $persister->load(array(
            'id' => $id
        ));
        if ($record) {
            $this->unitOfWork->registerManaged($record, $id);
        }

    }

    public function flush()
    {

    }

    public function getClassMetadata($className)
    {
        return $this->metadataFactory->getMetadataFor($className);
    }

    public function getMetadataFactory()
    {

    }

    public function getRepository($className)
    {

    }

    public function initializeObject($obj)
    {

    }

    public function merge($object)
    {

    }

    public function persist($object)
    {

    }

    public function refresh($object)
    {

    }

    public function remove($object)
    {

    }

    public function getUnitOfWork()
    {
        return $this->unitOfWork;
    }
}
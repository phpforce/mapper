<?php
namespace Phpforce\Mapper\Mapping;

use Doctrine\Common\Persistence\Mapping\AbstractClassMetadataFactory;
use Doctrine\Common\Annotations\AnnotationReader;
use Phpforce\Mapper\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Persistence\Mapping\ClassMetadata as BaseClassMetadata;
use Doctrine\Common\Persistence\Mapping\ReflectionService;

class ClassMetadataFactory extends AbstractClassMetadataFactory
{
    protected $driver;

    public function __construct()
    {
        $this->driver = new AnnotationDriver(new AnnotationReader());
    }

    public function setEntityManager($em)
    {
        $this->em = $em;
    }

    protected function doLoadMetadata($class, $parent, $rootEntityFound, array $nonSuperclassParents)
    {
        /* @var $class ClassMetadata */
        $this->driver->loadMetadataForClass($class->name, $class);
    }

    protected function getDriver()
    {
        return $this->driver;
    }

    protected function getFqcnFromAlias($namespaceAlias, $simpleClassName)
    {

    }

    protected function initialize()
    {

    }

    protected function initializeReflection(BaseClassMetadata $class, ReflectionService $reflService)
    {
        $class->initializeReflection($reflService);
    }

    protected function isEntity(\Doctrine\Common\Persistence\Mapping\ClassMetadata $class)
    {

    }

    protected function newClassMetadataInstance($className)
    {
        return new ClassMetadata($className);
    }

    protected function wakeupReflection(\Doctrine\Common\Persistence\Mapping\ClassMetadata $class, \Doctrine\Common\Persistence\Mapping\ReflectionService $reflService)
    {

    }
}



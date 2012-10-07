<?php
namespace Phpforce\Mapper\Mapping\Driver;

use Doctrine\Common\Persistence\Mapping\Driver\AnnotationDriver as AbstractAnnotationDriver;
use Doctrine\Common\Persistence\Mapping\ClassMetadata;

class AnnotationDriver extends AbstractAnnotationDriver
{
    public function loadMetadataForClass($className, ClassMetadata $metadata)
    {
        $class = $metadata->getReflectionClass();
        $metadata->objectName = $this->reader->getClassAnnotation(
            $class, 'Phpforce\Mapper\Mapping\Object'
        )->name;

        foreach ($class->getProperties() as $property) {
            $propertyAnnotation = $this->reader->getPropertyAnnotation(
                $property,
                'Phpforce\Mapper\Mapping\Field'
            );
            if (!$propertyAnnotation) {
                continue;
            }

            $metadata->fieldMappings[$propertyAnnotation->name] = $property->getName();
        }
    }
}
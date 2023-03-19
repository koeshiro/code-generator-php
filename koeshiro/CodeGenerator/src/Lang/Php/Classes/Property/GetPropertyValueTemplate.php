<?php

namespace CodeGenerator\Lang\Php\Classes\Property;

use CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\GetPropertyValueTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface;
use CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface;

/**
 * Description of GetTemplate
 *
 * @author rustamborhanov
 */
class GetPropertyValueTemplate implements GetPropertyValueTemplateInterface
{
    protected ClassTemplateInterface|VariableTemplateInterface|string|null $object = null;

    protected PropertyTemplateInterface|string|null $property = null;

    protected ?bool $staticMode = null;

    public function __toString()
    {
        if ($this->object instanceof ClassTemplateInterface) {
            $useObject = $this->object->getName();
        } else {
            $useObject = (string) $this->object;
        }
        $staticMode = false;
        if ($this->staticMode === true) {
            $staticMode = true;
        } elseif ($this->staticMode === false) {
            $staticMode = false;
        } elseif (
            $this->object instanceof ClassTemplateInterface &&
            gettype($this->property) === 'string'
        ) {
            $property = $this->object->getProperty($this->property);
            if ($property !== null) {
                $staticMode = $property->getStaticMode();
            } else {
                throw new \Exception("Property $this->property not exist on object ${$this->object->getName()}");
            }
        } elseif ($this->property instanceof PropertyTemplateInterface) {
            $staticMode = $this->property->getStaticMode();
        }
        $useFormat = $staticMode ? '::' : '->';
        $useProperty = $this->property instanceof PropertyTemplateInterface ? $this->property->getName() : $this->property;

        return $useObject.$useFormat.$useProperty.';';
    }

    public function setObject(ClassTemplateInterface|VariableTemplateInterface|string $Class): GetPropertyValueTemplateInterface
    {
        $this->object = $Class;

        return $this;
    }

    public function setProperty(PropertyTemplateInterface|string $property): GetPropertyValueTemplateInterface
    {
        $this->property = $property;

        return $this;
    }

    public function setUseStaticMode(bool $mode): GetPropertyValueTemplateInterface
    {
        $this->staticMode = $mode;

        return $this;
    }
}

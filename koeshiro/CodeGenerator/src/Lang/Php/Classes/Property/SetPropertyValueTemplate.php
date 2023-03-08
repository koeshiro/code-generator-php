<?php

namespace CodeGenerator\Lang\Php\Classes\Property;

use \CodeGenerator\Templates\Interfaces\Classes\Property\SetPropertyValueTemplateInterface;
use CodeGenerator\Templates\Interfaces\ValueTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface;
use CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface;

/**
 * Description of SetPropertyValueTemplate
 *
 * @author koesh
 */
class SetPropertyValueTemplate implements SetPropertyValueTemplateInterface {

    protected ClassTemplateInterface|ValueTemplateInterface|string|null $object = null;
    protected PropertyTemplateInterface|string|null $property = null;
    protected ?bool $staticMode = null;
    protected VariableTemplateInterface|string|null $value = null;

    public function __toString() {
        if ($this->object instanceof ClassTemplateInterface) {
            $useObject = $this->object->getName();
        } else {
            $useObject = (string)$this->object;
        }
        $staticMode = false;
        if ($this->staticMode === true) {
            $staticMode = true;
        } else if ($this->staticMode === false) {
            $staticMode = false;
        } else if (
            $this->object instanceof ClassTemplateInterface &&
            gettype($this->property) === "string"
        ) {
            $property = $this->object->getProperty($this->property);
            if($property !== null) {
                $staticMode= $property->getStaticMode();
            } else {
                throw new \Exception("Property $this->property not exist on object ${$this->object->getName()}");
            }
        } else if($this->property instanceof PropertyTemplateInterface) {
            $staticMode = $this->property->getStaticMode();
        }
        $useFormat = $staticMode ? "::" : "->";
        $useProperty = $this->property instanceof PropertyTemplateInterface ? $this->property->getName() : $this->property;
        return $useObject . $useFormat . $useProperty. '=' . ((string)$this->value) . ";";
    }

    public function setObject(ClassTemplateInterface|VariableTemplateInterface|string $Class): SetPropertyValueTemplateInterface {
        $this->object = $Class;
        return $this;
    }

    public function setProperty(PropertyTemplateInterface|string $property): SetPropertyValueTemplateInterface {
        $this->property = $property;
        return $this;
    }

    public function setUseStaticMode(bool $mode): SetPropertyValueTemplateInterface {
        $this->staticMode = $mode;
        return $this;
    }

    public function setValue(VariableTemplateInterface|string $value): SetPropertyValueTemplateInterface {
        $this->value = $value;
        return $this;
    }
}

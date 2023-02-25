<?php
namespace CodeGenerator\Templates\Interfaces\Classes\Property;
use CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface;
use CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface;

/**
 *
 * @author koesh
 */
interface SetPropertyValueTemplateInterface extends \Stringable {
    public function setObject(ClassTemplateInterface|VariableTemplateInterface|string $Class): self;
    public function setProperty(PropertyTemplateInterface|string $property): self;
    public function setValue(VariableTemplateInterface|string $value): self;
    public function setUseStaticMode(bool $mode): self;
}

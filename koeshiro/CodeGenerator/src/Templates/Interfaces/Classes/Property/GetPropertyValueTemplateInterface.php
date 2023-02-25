<?php
namespace CodeGenerator\Templates\Interfaces\Classes\Property;
use CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface;
use CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface;

/**
 * Возвращяет {class}::|->{propertyName}
 *
 * @author koesh
 */
interface GetPropertyValueTemplateInterface extends \Stringable
{
    public function setObject(ClassTemplateInterface|VariableTemplateInterface|string $Class): self;
    public function setProperty(PropertyTemplateInterface|string $property): self;
    public function setUseStaticMode(bool $mode): self;
}

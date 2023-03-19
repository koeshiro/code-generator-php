<?php

namespace CodeGenerator\Lang\Php\Classes;

use CodeGenerator\Lang\Php\Classes\Method\UseMethodTemplate;
use CodeGenerator\Lang\Php\Classes\Property\GetPropertyValueTemplate;
use CodeGenerator\Lang\Php\Classes\Property\SetPropertyValueTemplate;
use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\ClassesFabricInterface;
use CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\ImplementTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Method\UseMethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\GetPropertyValueTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\SetPropertyValueTemplateInterface;

/**
 * Description of ClassesFabric
 *
 * @author rustamborhanov
 */
class ClassesFabric implements ClassesFabricInterface
{
    // put your code here
    public function createArgument(): ArgumentTemplateInterface
    {
        return new \CodeGenerator\Lang\Php\ArgumentTemplate();
    }

    public function createImplement(): ImplementTemplateInterface
    {
        return new ImplementTemplate();
    }

    public function createMethod(): MethodTemplateInterface
    {
        return new Method\MethodTemplate();
    }

    public function createProperty(): PropertyTemplateInterface
    {
        return new Property\PropertyTemplate();
    }

    public function createClasses(): ClassTemplateInterface
    {
        return new \CodeGenerator\Lang\Php\Classes\ClassTemplate();
    }

    public function createUseMethod(): UseMethodTemplateInterface
    {
        return new UseMethodTemplate();
    }

    public function createGetPropertyValue(): GetPropertyValueTemplateInterface
    {
        return new GetPropertyValueTemplate();
    }

    public function createSetPropertyValue(): SetPropertyValueTemplateInterface
    {
        return new SetPropertyValueTemplate();
    }
}

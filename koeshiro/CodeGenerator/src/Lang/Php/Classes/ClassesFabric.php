<?php
namespace CodeGenerator\Lang\Php\Classes;
use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\ClassesFabricInterface;
use CodeGenerator\Templates\Interfaces\Classes\ImplementTemplateInterface;


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

    public function createClasses(): ClassTemplateInterface {
        return new \CodeGenerator\Lang\Php\Classes\ClassTemplate();
    }

}

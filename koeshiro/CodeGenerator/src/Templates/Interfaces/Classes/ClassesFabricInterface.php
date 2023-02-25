<?php
namespace CodeGenerator\Templates\Interfaces\Classes;
use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\ImplementTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface;
/**
 *
 * @author rustamborhanov
 */
interface ClassesFabricInterface
{

    public function createArgument(): ArgumentTemplateInterface;

    public function createMethod(): MethodTemplateInterface;

    public function createImplement(): ImplementTemplateInterface;

    public function createProperty(): PropertyTemplateInterface;

    public function createClasses(): ClassTemplateInterface;
}

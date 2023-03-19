<?php

namespace CodeGenerator\Templates\Interfaces\Classes;

use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Method\UseMethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\GetPropertyValueTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\SetPropertyValueTemplateInterface;

/**
 * @author rustamborhanov
 */
interface ClassesFabricInterface
{
    public function createArgument(): ArgumentTemplateInterface;

    public function createMethod(): MethodTemplateInterface;

    public function createImplement(): ImplementTemplateInterface;

    public function createProperty(): PropertyTemplateInterface;

    public function createClasses(): ClassTemplateInterface;

    public function createUseMethod(): UseMethodTemplateInterface;

    public function createGetPropertyValue(): GetPropertyValueTemplateInterface;

    public function createSetPropertyValue(): SetPropertyValueTemplateInterface;
}

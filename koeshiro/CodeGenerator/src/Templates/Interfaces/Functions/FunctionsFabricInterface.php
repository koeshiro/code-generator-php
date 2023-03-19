<?php

namespace CodeGenerator\Templates\Interfaces\Functions;

use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;

/**
 * @author rustamborhanov
 */
interface FunctionsFabricInterface
{
    public function createArgument(): ArgumentTemplateInterface;

    public function createFunction(): FunctionTemplateInterface;

    public function createUseFunction(): UseFunctionTemplateInterface;
}

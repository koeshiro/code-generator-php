<?php

namespace CodeGenerator\Lang\Php\Functions;

use CodeGenerator\Templates\Interfaces\Functions\FunctionsFabricInterface;

/**
 * Description of FunctionsFabricInterface
 *
 * @author rustamborhanov
 */
class FunctionsFabric implements FunctionsFabricInterface
{
    // put your code here
    public function createArgument(): \CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface
    {
        return new \CodeGenerator\Lang\Php\ArgumentTemplate();
    }

    public function createFunction(): \CodeGenerator\Templates\Interfaces\Functions\FunctionTemplateInterface
    {
        return new FunctionTemplate();
    }

    public function createUseFunction(): \CodeGenerator\Templates\Interfaces\Functions\UseFunctionTemplateInterface
    {
        return new UseFunctionTemplate();
    }
}

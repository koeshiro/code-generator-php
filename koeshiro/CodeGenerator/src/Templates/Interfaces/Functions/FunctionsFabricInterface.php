<?php
namespace CodeGenerator\Templates\Interfaces\Functions;

use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;
use CodeGenerator\Templates\Interfaces\Functions\FunctionTemplateInterface;
use CodeGenerator\Templates\Interfaces\Functions\UseFunctionTemplateInterface;

/**
 *
 * @author rustamborhanov
 */
interface FunctionsFabricInterface
{

    public function createArgument(): ArgumentTemplateInterface;

    public function createFunction(): FunctionTemplateInterface;

    public function createUseFunction(): UseFunctionTemplateInterface;
}

<?php
namespace CodeGenerator\Templates\Interfaces;

use CodeGenerator\Templates\Interfaces\Classes\ClassesFabricInterface;
use CodeGenerator\Templates\Interfaces\Functions\FunctionsFabricInterface;
use CodeGenerator\Templates\Interfaces\LoopsFabricInterface;
use CodeGenerator\Templates\Interfaces\Variable\VariablesFabricInterface;
use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;
use CodeGenerator\Templates\Interfaces\BlockTemplateInterface;
use CodeGenerator\Templates\Interfaces\InterfaceTemplateInterface;
use CodeGenerator\Templates\Interfaces\NamespaceTemplateInterface;
use CodeGenerator\Templates\Interfaces\ReturnTemplateInterface;
use CodeGenerator\Templates\Interfaces\ValueTemplateInterface;

/**
 *
 * @author rustamborhanov
 */
interface FabricInterface
{

    public function createClassesFabric(): ClassesFabricInterface;

    public function createFunctionsFabric(): FunctionsFabricInterface;

    public function createLoopsFabric(): LoopsFabricInterface;

    public function createVariablesFabric(): VariablesFabricInterface;

    public function createArgument(): ArgumentTemplateInterface;

    public function createBlock(): BlockTemplateInterface;

    public function createInterface(): InterfaceTemplateInterface;

    public function createNamespace(): NamespaceTemplateInterface;

    public function createReturn(): ReturnTemplateInterface;

    public function createValue(): ValueTemplateInterface;
}

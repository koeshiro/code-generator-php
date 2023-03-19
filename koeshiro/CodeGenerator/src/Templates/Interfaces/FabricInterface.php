<?php

namespace CodeGenerator\Templates\Interfaces;

use CodeGenerator\Templates\Interfaces\Classes\ClassesFabricInterface;
use CodeGenerator\Templates\Interfaces\Functions\FunctionsFabricInterface;
use CodeGenerator\Templates\Interfaces\Logic\LogicFabricInterface;
use CodeGenerator\Templates\Interfaces\Loops\LoopsFabricInterface;
use CodeGenerator\Templates\Interfaces\Variable\VariablesFabricInterface;

/**
 * @author rustamborhanov
 */
interface FabricInterface
{
    public function createClassesFabric(): ClassesFabricInterface;

    public function createFunctionsFabric(): FunctionsFabricInterface;

    public function createLoopsFabric(): LoopsFabricInterface;

    public function createLogicFabric(): LogicFabricInterface;

    public function createVariablesFabric(): VariablesFabricInterface;

    public function createArgument(): ArgumentTemplateInterface;

    public function createBlock(): BlockTemplateInterface;

    public function createInterface(): InterfaceTemplateInterface;

    public function createNamespace(): NamespaceTemplateInterface;

    public function createReturn(): ReturnTemplateInterface;

    public function createValue(): ValueTemplateInterface;

    public function createUse(): UseTemplateInterface;
}

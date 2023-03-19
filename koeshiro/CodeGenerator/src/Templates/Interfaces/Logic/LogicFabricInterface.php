<?php

namespace CodeGenerator\Templates\Interfaces\Logic;

use CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicBlockTemplateInterface;
use CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicTemplateInterface;

/**
 * @author koesh
 */
interface LogicFabricInterface
{
    public function createLogic(): LogicTemplateInterface;

    public function createLogicBlock(): LogicBlockTemplateInterface;

    public function createIfElse(): IfElseTemplateInterface;
}

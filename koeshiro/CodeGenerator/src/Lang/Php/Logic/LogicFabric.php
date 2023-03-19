<?php

namespace CodeGenerator\Lang\Php\Logic;

use CodeGenerator\Lang\Php\Logic\LogicBlock\LogicBlockTemplate;
use CodeGenerator\Lang\Php\Logic\LogicBlock\LogicTemplate;
use CodeGenerator\Templates\Interfaces\Logic\IfElseTemplateInterface;
use CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicBlockTemplateInterface;
use CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicTemplateInterface;
use CodeGenerator\Templates\Interfaces\Logic\LogicFabricInterface;

/**
 * Description of LogicFabric
 *
 * @author koesh
 */
class LogicFabric implements LogicFabricInterface
{
    public function createLogic(): LogicTemplateInterface
    {
        return new LogicTemplate();
    }

    public function createLogicBlock(): LogicBlockTemplateInterface
    {
        return new LogicBlockTemplate();
    }

    public function createIfElse(): IfElseTemplateInterface
    {
        return new IfElseTemplate();
    }
}

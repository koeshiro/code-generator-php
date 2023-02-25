<?php
namespace CodeGenerator\Lang\Php\Logic\LogicBlock;
use \CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicFabricInterface;
use \CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicTemplateInterface;
use \CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicBlockTemplateInterface;

/**
 * Description of LogicFabric
 *
 * @author koesh
 */
class LogicFabric implements LogicFabricInterface {
    public function createLogic(): LogicTemplateInterface {
        return new LogicTemplate();
    }
    
    public function createLogicBlock(): LogicBlockTemplateInterface {
        return new LogicBlockTemplate();
    }
}

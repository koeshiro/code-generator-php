<?php
namespace CodeGenerator\Templates\Interfaces\Logic\LogicBlock;

/**
 *
 * @author koesh
 */
interface LogicFabricInterface {
    public function createLogic(): LogicTemplateInterface;
    public function createLogicBlock(): LogicBlockTemplateInterface;
}

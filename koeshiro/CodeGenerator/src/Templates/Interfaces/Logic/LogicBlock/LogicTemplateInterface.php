<?php

namespace CodeGenerator\Templates\Interfaces\Logic\LogicBlock;

use \CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface;

/**
 *
 * @author koesh
 */
interface LogicTemplateInterface extends \Stringable {
    public function setLogic(string $type, \Stringable | VariableTemplateInterface $left, \Stringable | VariableTemplateInterface $right): self;
}

<?php

namespace CodeGenerator\Lang\Php\Logic\LogicBlock;

use CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicTemplateInterface;
use CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface;

/**
 * Description of LogicTemplate
 *
 * @author koesh
 */
class LogicTemplate implements LogicTemplateInterface
{
    protected ?string $type = null;

    protected \Stringable|VariableTemplateInterface|null $left = null;

    protected \Stringable|VariableTemplateInterface|null $right = null;

    public function setLogic(string $type, \Stringable|VariableTemplateInterface $left, \Stringable|VariableTemplateInterface $right): LogicTemplateInterface
    {
        $this->type = $type;
        $this->left = $left;
        $this->right = $right;

        return $this;
    }

    public function __toString()
    {
        return $this->left.' '.$this->type.' '.$this->right;
    }
}

<?php

namespace CodeGenerator\Lang\Php\Logic\LogicBlock;

use CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicBlockTemplateInterface;
use CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicTemplateInterface;

/**
 * Description of LogicBlockTemplate
 *
 * @author koesh
 */
class LogicBlockTemplate implements LogicBlockTemplateInterface
{
    protected string $logic = '';

    public function logic(LogicTemplateInterface|\Stringable $logic): self
    {
        $this->logic .= (string) $logic;

        return $this;
    }

    public function and(): self
    {
        $this->logic .= ' && ';

        return $this;
    }

    public function or(): self
    {
        $this->logic .= ' || ';

        return $this;
    }

    public function xor(): self
    {
        $this->logic .= ' xor ';

        return $this;
    }

    public function __toString(): string
    {
        return $this->logic;
    }
}

<?php

namespace CodeGenerator\Templates\Interfaces\Logic\LogicBlock;

/**
 * @author koesh
 */
interface LogicBlockTemplateInterface extends \Stringable
{
    public function logic(LogicTemplateInterface|\Stringable $logic): self;

    public function and(): self;

    public function or(): self;

    public function xor(): self;
}

<?php

namespace CodeGenerator\Templates\Interfaces;

/**
 * @author koesh
 */
interface ReturnTemplateInterface extends \Stringable
{
    public function setReturn(\Stringable $value): self;
}

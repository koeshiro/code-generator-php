<?php

namespace CodeGenerator\Templates\Interfaces\Variable;

use CodeGenerator\Templates\Interfaces\ValueTemplateInterface;

/**
 * @author rustamborhanov
 */
interface SetTemplateInterface extends \Stringable
{
    public function setVariable(VariableTemplateInterface $Variable): self;

    public function setValue(?ValueTemplateInterface $Value = null): self;
}

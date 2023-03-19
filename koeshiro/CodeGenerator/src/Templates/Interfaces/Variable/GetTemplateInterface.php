<?php

namespace CodeGenerator\Templates\Interfaces\Variable;

/**
 * @author koesh
 */
interface GetTemplateInterface extends \Stringable
{
    public function setVariable(VariableTemplateInterface $Variable): self;
}

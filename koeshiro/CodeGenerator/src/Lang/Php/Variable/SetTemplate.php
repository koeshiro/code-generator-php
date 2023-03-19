<?php

namespace CodeGenerator\Lang\Php\Variable;

use CodeGenerator\Templates\Interfaces\ValueTemplateInterface;
use CodeGenerator\Templates\Interfaces\Variable\SetTemplateInterface;
use CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface;

/**
 * Description of SetTemplate
 *
 * @author rustamborhanov
 */
class SetTemplate implements SetTemplateInterface
{
    protected ?ValueTemplateInterface $value = null;

    protected ?VariableTemplateInterface $variable = null;

    public function setValue(?ValueTemplateInterface $Value = null): SetTemplateInterface
    {
        $this->value = $Value;

        return $this;
    }

    public function setVariable(VariableTemplateInterface $Variable): SetTemplateInterface
    {
        $this->variable = $Variable;

        return $this;
    }

    public function __toString()
    {
        return '$'.$this->variable?->getName().' = '.(string) $this->value;
    }
}

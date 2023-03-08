<?php
namespace CodeGenerator\Lang\Php\Variable;

use CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface;
use CodeGenerator\Templates\Interfaces\ValueTemplateInterface;

/**
 * Description of VariableTemplate
 *
 * @author rustamborhanov
 */
class VariableTemplate implements VariableTemplateInterface
{
    protected string $name = '';
    protected ?ValueTemplateInterface $value = null;

    public function getValue(): ?ValueTemplateInterface {
        return $this->value;
    }

    public function getName():string {
        return $this->name;
    }

    public function setName(string $Name): VariableTemplateInterface {
        $this->name = $Name;
        return $this;
    }

    public function setValue(ValueTemplateInterface $Value = null): VariableTemplateInterface {
        $this->value = $Value;
        return $this;
    }

    public function __toString(): string {
        return '$' . $this->getName() . ((string)$this->getValue() ? ' = ' . $this->getValue() : '') . ';';
    }
}

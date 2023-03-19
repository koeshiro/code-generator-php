<?php

namespace CodeGenerator\Templates\Interfaces\Variable;

use CodeGenerator\Templates\Interfaces\ValueTemplateInterface;

/**
 * @author koesh
 */
interface VariableTemplateInterface extends \Stringable
{
    public function getName(): string;

    public function setName(string $Name): self;

    public function setValue(?ValueTemplateInterface $Value = null): self;

    public function getValue(): ValueTemplateInterface|null;
}

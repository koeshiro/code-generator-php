<?php

namespace CodeGenerator\Templates\Interfaces;

interface DecoratorTemplateInterface extends \Stringable
{
    public function setName(string $name): self;

    public function addArgumentValue(ValueTemplateInterface $argument): self;

    /**  @return array<ValueTemplateInterface> */
    public function getArgumentsValues(): array;
}

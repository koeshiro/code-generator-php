<?php

namespace CodeGenerator\Lang\Php;

use CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface;
use CodeGenerator\Templates\Interfaces\ValueTemplateInterface;

class DecoratorTemplate implements DecoratorTemplateInterface
{
    protected ?string $name = null;

    /** @var array<ValueTemplateInterface> */
    protected array $arguments = [];

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function addArgumentValue(ValueTemplateInterface $argument): self
    {
        $this->arguments[] = $argument;

        return $this;
    }

    /**  @return array<ValueTemplateInterface> */
    public function getArgumentsValues(): array
    {
        return $this->arguments;
    }

    public function __toString()
    {
        return '#['
            .$this->name
            .'('
            .(
                count($this->arguments)
                    ? implode("\n", array_map(fn ($a): string => (string) $a, $this->arguments))
                    : ''
            )
            .')]';
    }
}

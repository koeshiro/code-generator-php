<?php

namespace CodeGenerator\Lang\Php\Functions;

use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;
use CodeGenerator\Templates\Interfaces\BlockTemplateInterface;
use CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface;
use CodeGenerator\Templates\Interfaces\Functions\FunctionTemplateInterface;
use CodeGenerator\Templates\Interfaces\Functions\UseFunctionTemplateInterface;

/**
 * Description of FunctionTemplate
 *
 * @author rustamborhanov
 */
class FunctionTemplate implements FunctionTemplateInterface
{
    /** @var array<ArgumentTemplateInterface> */
    protected array $arguments = [];

    protected ?BlockTemplateInterface $block = null;

    protected string $name = '';

    protected string $returnType = '';

    /** @var array<\CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface> */
    protected array $decorators = [];

    public function addDecorator(DecoratorTemplateInterface $decorator): self
    {
        $this->decorators[] = $decorator;

        return $this;
    }

    /**
     * @return array<\CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface>
     */
    public function getDecorators(): array
    {
        return $this->decorators;
    }

    // put your code here
    public function __toString()
    {
        $arguments = count($this->arguments) ? implode(', ', array_map(function ($o) {
        return (string) $o;
        }, $this->arguments)) : '';
        $returnType = strlen($this->returnType) ? ': '.$this->returnType : '';
        $decorators = (
            count($this->decorators)
            ? implode(' ', array_map(fn ($p): string => (string) $p, $this->decorators)).' '
            : ''
        );

        return str_replace(
            '  ',
            ' ',
            $decorators
            .'function '
            .$this->name
            .'('
            .$arguments
            .')'
            .$returnType
            .$this->block
        );
    }

    public function addArgument(ArgumentTemplateInterface $Argument): FunctionTemplateInterface
    {
        $this->arguments[$Argument->getName()] = $Argument;

        return $this;
    }

    public function getArgument(string $Name): ArgumentTemplateInterface
    {
        return $this->arguments[$Name];
    }

    public function getArguments(): array
    {
        return $this->arguments;
    }

    public function getBlock(): ?BlockTemplateInterface
    {
        return $this->block;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setBlock(BlockTemplateInterface $Block): FunctionTemplateInterface
    {
        $this->block = $Block;

        return $this;
    }

    public function setName(string $Name): FunctionTemplateInterface
    {
        $this->name = $Name;

        return $this;
    }

    public function setReturnType(string $Type): FunctionTemplateInterface
    {
        $this->returnType = $Type;

        return $this;
    }

    public function useFunction(array $Arguments): UseFunctionTemplateInterface
    {
        $use = (new UseFunctionTemplate())->setArguments($Arguments)->setFunction($this);

        return $use;
    }
}

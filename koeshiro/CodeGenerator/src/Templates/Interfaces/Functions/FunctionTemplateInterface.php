<?php

namespace CodeGenerator\Templates\Interfaces\Functions;

use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;
use CodeGenerator\Templates\Interfaces\BlockTemplateInterface;
use CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface;

/**
 * Класс описывающий функцию
 *
 * @author koesh
 */
interface FunctionTemplateInterface extends \Stringable
{
    public function addDecorator(DecoratorTemplateInterface $decorator): self;

    /** @return array<int,DecoratorTemplateInterface> */
    public function getDecorators(): array;

    public function setName(string $Name): self;

    public function getName(): string;

    public function addArgument(ArgumentTemplateInterface $Argument): self;

    public function getArgument(string $Name): ArgumentTemplateInterface;

    /** @return array<int,ArgumentTemplateInterface> */
    public function getArguments(): array;

    public function setBlock(BlockTemplateInterface $Block): self;

    public function getBlock(): ?BlockTemplateInterface;

    public function setReturnType(string $Type): self;

    /**
     * @param  array<\Stringable|string>  $Arguments
     */
    public function useFunction(array $Arguments): UseFunctionTemplateInterface;
}

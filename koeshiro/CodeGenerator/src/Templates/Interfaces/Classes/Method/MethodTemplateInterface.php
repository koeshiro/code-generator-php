<?php

namespace CodeGenerator\Templates\Interfaces\Classes\Method;

use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;
use CodeGenerator\Templates\Interfaces\BlockTemplateInterface;
use CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface;

/**
 * @author koesh
 */
interface MethodTemplateInterface extends \Stringable
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

    public function getBlock(): BlockTemplateInterface|null;

    public function setReturnType(string $Type): self;

    public function getReturnType(): string;

    public function setScope(string $scope): self;

    public function getScope(): string;

    public function setStaticMode(bool $static): self;

    public function getStaticMode(): bool;
}

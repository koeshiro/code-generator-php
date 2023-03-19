<?php

namespace CodeGenerator\Templates\Interfaces\Classes\Property;

use CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface;
use CodeGenerator\Templates\Interfaces\ValueTemplateInterface;

/**
 * @author koesh
 */
interface PropertyTemplateInterface extends \Stringable
{
    public function addDecorator(DecoratorTemplateInterface $decorator): self;

    /** @return array<DecoratorTemplateInterface> */
    public function getDecorators(): array;

    public function setName(string $Name): self;

    public function getName(): string;

    public function setValue(?ValueTemplateInterface $Value = null): self;

    public function getValue(): ValueTemplateInterface|string|null;

    public function setType(string $Type): self;

    public function getType(): string;

    public function setScope(string $scope): self;

    public function getScope(): string|null;

    public function setStaticMode(bool $static): self;

    public function getStaticMode(): bool|null;
}

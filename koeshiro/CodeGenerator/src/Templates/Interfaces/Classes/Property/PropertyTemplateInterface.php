<?php
namespace CodeGenerator\Templates\Interfaces\Classes\Property;

use CodeGenerator\Templates\Interfaces\ValueTemplateInterface;
use CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface;

/**
 *
 * @author koesh
 */
interface PropertyTemplateInterface extends \Stringable
{
    public function addDecorator(DecoratorTemplateInterface $decorator): self;
    public function getDecorators(): array;
    public function setName(string $Name): self;

    public function getName();

    public function setValue(?ValueTemplateInterface $Value = null): self;

    public function getValue(): ValueTemplateInterface | string | null;

    public function setType(string $Type): self;

    public function getType();

    public function setScope(string $scope): self;

    public function getScope();

    public function setStaticMode(bool $static): self;

    public function getStaticMode();
}

<?php
namespace CodeGenerator\Templates\Interfaces;

/**
 * Класс описания аргементов функций и методов
 *
 * @author koesh
 */
interface ArgumentTemplateInterface extends \Stringable {
    public function addDecorator(DecoratorTemplateInterface $decorator): self;
    public function getDecorators(): array;

    public function setName(string $name): self;
    public function getName():string;

    public function setValue(?ValueTemplateInterface $value): self;
    public function getValue():?ValueTemplateInterface;

    public function setType(string $type = ''): self;
    public function getType():string;
}

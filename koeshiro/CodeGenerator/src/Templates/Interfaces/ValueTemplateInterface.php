<?php

namespace CodeGenerator\Templates\Interfaces;

/**
 * Класс вставляющий значение в генерируемый код
 *
 * @author koesh
 */
interface ValueTemplateInterface extends \Stringable
{
    public function setValue(mixed $Value): self;

    public function getValue(): \Stringable|string;
}

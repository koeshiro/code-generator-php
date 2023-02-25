<?php
namespace CodeGenerator\Templates\Interfaces;

/**
 * Класс вставляющий значение в генерируемый код
 *
 * @author koesh
 */
interface ValueTemplateInterface extends \Stringable
{

    public function setValue($Value): self;

    public function getValue();
}

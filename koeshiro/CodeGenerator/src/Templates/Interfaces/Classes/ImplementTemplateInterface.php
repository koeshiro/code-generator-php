<?php
namespace CodeGenerator\Templates\Interfaces\Classes;

use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;

/**
 * Класс описывающий создание реализации класса
 *
 * @author koesh
 */
interface ImplementTemplateInterface extends \Stringable
{
    public function setClass($Class): self;

    public function addArgument(ArgumentTemplateInterface $Argument): self;
}

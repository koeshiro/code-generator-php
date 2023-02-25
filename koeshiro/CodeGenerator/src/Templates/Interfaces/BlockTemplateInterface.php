<?php
namespace CodeGenerator\Templates\Interfaces;

/**
 * Блок принимающий исполняемый код / тело функций, методов,
 * лог.
 * вырожений циклов
 *
 * @author koesh
 */
interface BlockTemplateInterface extends \Stringable
{

    /**
     *
     * @param <\Stringable|string> $Line
     */
    public function addLine(\Stringable | string $Line): self;
}

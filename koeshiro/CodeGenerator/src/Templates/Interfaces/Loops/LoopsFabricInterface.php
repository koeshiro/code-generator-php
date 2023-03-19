<?php

namespace CodeGenerator\Templates\Interfaces\Loops;

/**
 * @author rustamborhanov
 */
interface LoopsFabricInterface
{
    public function createForeach(): ForeachTemplateInterface;

    public function createWhile(): WhileTemplateInterface;
}

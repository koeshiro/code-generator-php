<?php

namespace CodeGenerator\Lang\Php\Loops;

use CodeGenerator\Templates\Interfaces\Loops\ForeachTemplateInterface;
use CodeGenerator\Templates\Interfaces\Loops\LoopsFabricInterface;
use CodeGenerator\Templates\Interfaces\Loops\WhileTemplateInterface;

/**
 * Description of LoopsFabric
 *
 * @author rustamborhanov
 */
class LoopsFabric implements LoopsFabricInterface
{
    // put your code here
    public function createForeach(): ForeachTemplateInterface
    {
        return new ForeachTemplate();
    }

    public function createWhile(): WhileTemplateInterface
    {
        return new WhileTemplate();
    }
}

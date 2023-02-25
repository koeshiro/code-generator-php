<?php
namespace CodeGenerator\Templates\Interfaces\Loops;

use CodeGenerator\Templates\Interfaces\Loops\ForeachTemplateInterface;
use CodeGenerator\Templates\Interfaces\Loops\WhileTemplateInterface;

/**
 *
 * @author rustamborhanov
 */
interface LoopsFabricInterface
{

    public function createForeach(): ForeachTemplateInterface;

    public function createWhile(): WhileTemplateInterface;
}

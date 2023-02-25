<?php
namespace CodeGenerator\Templates\Interfaces\Loops;

use CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicBlockTemplateInterface;
use CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicTemplateInterface;
use CodeGenerator\Templates\Interfaces\BlockTemplateInterface;

/**
 *
 * @author koesh
 */
interface WhileTemplateInterface extends \Stringable {

    public function setLogic(LogicBlockTemplateInterface | LogicTemplateInterface $block): self;

    public function setBlock(BlockTemplateInterface $Line): self;
}

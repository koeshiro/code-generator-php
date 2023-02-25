<?php
namespace CodeGenerator\Templates\Interfaces\Logic;

use CodeGenerator\Templates\Interfaces\BlockTemplateInterface;

/**
 * Класс описывающий логический блок
 *
 * @author koesh
 */
interface IfElseTemplateInterface extends \Stringable
{

    public function setIf(LogicBlock\LogicBlockTemplateInterface $Logic, BlockTemplateInterface $Block): self;

    public function addIfElse(LogicBlock\LogicBlockTemplateInterface $Logic, BlockTemplateInterface $Block): self;

    public function setElse(BlockTemplateInterface $Block): self;
}

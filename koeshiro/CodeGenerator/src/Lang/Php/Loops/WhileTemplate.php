<?php
namespace CodeGenerator\Lang\Php\Loops;

use CodeGenerator\Templates\Interfaces\Loops\WhileTemplateInterface;
use CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicBlockTemplateInterface;
use CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicTemplateInterface;
use CodeGenerator\Templates\Interfaces\BlockTemplateInterface;

/**
 * Description of WhileTemplate
 *
 * @author rustamborhanov
 */
class WhileTemplate implements WhileTemplateInterface {
    
    protected ?BlockTemplateInterface $block = null;
    protected LogicTemplateInterface | LogicBlockTemplateInterface | null $logic = null;
    
    public function setBlock(BlockTemplateInterface $Block): WhileTemplateInterface {
        $this->block = $Block;
        return $this;
    }

    public function setLogic(LogicTemplateInterface | LogicBlockTemplateInterface $Logic): WhileTemplateInterface {
        $this->logic = $Logic;
        return $this;
    }
    
    public function __toString(): string {
        return 'while(' . $this->logic . ') ' . ((string)$this->block) . ' ';
    }
}

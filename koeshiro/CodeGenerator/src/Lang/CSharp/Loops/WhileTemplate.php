<?php

 class WhileTemplate implements CodeGenerator\Templates\Interfaces\Loops\WhileTemplateInterface
 {
     public function setLogic(CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicBlockTemplateInterface|CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicTemplateInterface $block): CodeGenerator\Templates\Interfaces\Loops\WhileTemplateInterface
     {
         $this->logic = $block;

         return $this;
     }

     public function setBlock(CodeGenerator\Templates\Interfaces\BlockTemplateInterface $Line): CodeGenerator\Templates\Interfaces\Loops\WhileTemplateInterface
     {
         $this->block = $Line;

         return $this;
     }

     public function __toString(): string
     {
     }
 }

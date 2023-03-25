<?php

 class IfElseTemplate implements CodeGenerator\Templates\Interfaces\Logic\IfElseTemplateInterface
 {
     public function setIf(CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicBlockTemplateInterface $Logic, CodeGenerator\Templates\Interfaces\BlockTemplateInterface $Block): CodeGenerator\Templates\Interfaces\Logic\IfElseTemplateInterface
     {
         $this->if = $Logic;

         return $this;
     }

     public function addIfElse(CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicBlockTemplateInterface $Logic, CodeGenerator\Templates\Interfaces\BlockTemplateInterface $Block): CodeGenerator\Templates\Interfaces\Logic\IfElseTemplateInterface
     {
         return $this;
     }

     public function setElse(CodeGenerator\Templates\Interfaces\BlockTemplateInterface $Block): CodeGenerator\Templates\Interfaces\Logic\IfElseTemplateInterface
     {
         $this->else = $Block;

         return $this;
     }

     public function __toString(): string
     {
     }
 }

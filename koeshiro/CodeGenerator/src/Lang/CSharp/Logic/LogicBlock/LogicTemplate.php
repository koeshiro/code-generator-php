<?php

 class LogicTemplate implements CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicTemplateInterface
 {
     public function setLogic(string $type, Stringable|CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface $left, Stringable|CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface $right): CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicTemplateInterface
     {
         $this->logic = $type;

         return $this;
     }

     public function __toString(): string
     {
     }
 }

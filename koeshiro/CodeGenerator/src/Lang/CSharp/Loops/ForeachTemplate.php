<?php

 class ForeachTemplate implements CodeGenerator\Templates\Interfaces\Loops\ForeachTemplateInterface
 {
     public function setArray(CodeGenerator\Lang\Php\Variable\VariableTemplate $Array): CodeGenerator\Templates\Interfaces\Loops\ForeachTemplateInterface
     {
         $this->array = $Array;

         return $this;
     }

     public function setKey(string $KeyName): CodeGenerator\Templates\Interfaces\Loops\ForeachTemplateInterface
     {
         $this->key = $KeyName;

         return $this;
     }

     public function setValue(string $ValueVariableName): CodeGenerator\Templates\Interfaces\Loops\ForeachTemplateInterface
     {
         $this->value = $ValueVariableName;

         return $this;
     }

     public function setBlock(CodeGenerator\Templates\Interfaces\BlockTemplateInterface $Line): CodeGenerator\Templates\Interfaces\Loops\ForeachTemplateInterface
     {
         $this->block = $Line;

         return $this;
     }

     public function __toString(): string
     {
     }
 }

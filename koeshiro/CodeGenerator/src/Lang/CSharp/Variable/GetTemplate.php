<?php

 class GetTemplate implements CodeGenerator\Templates\Interfaces\Variable\GetTemplateInterface
 {
    protected \CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface $variable;
     public function setVariable(CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface $Variable): CodeGenerator\Templates\Interfaces\Variable\GetTemplateInterface
     {
         $this->variable = $Variable;

         return $this;
     }

     public function __toString(): string
     {
        return $this->variable?->getName();
     }
 }

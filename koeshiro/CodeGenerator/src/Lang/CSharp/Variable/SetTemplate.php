<?php

 class SetTemplate implements CodeGenerator\Templates\Interfaces\Variable\SetTemplateInterface
 {
    protected \CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface $variable;
    protected ?CodeGenerator\Templates\Interfaces\ValueTemplateInterface $value;
     public function setVariable(CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface $Variable): CodeGenerator\Templates\Interfaces\Variable\SetTemplateInterface
     {
         $this->variable = $Variable;

         return $this;
     }

     public function setValue(?CodeGenerator\Templates\Interfaces\ValueTemplateInterface $Value): CodeGenerator\Templates\Interfaces\Variable\SetTemplateInterface
     {
         $this->value = $Value;

         return $this;
     }

     public function __toString(): string
     {
        return $this->variable?->getName().' = '.(string) $this->value;
     }
 }

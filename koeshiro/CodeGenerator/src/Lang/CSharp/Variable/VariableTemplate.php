<?php

 class VariableTemplate implements CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface
 {
     protected string $name;
     protected Stringable|string $type = '';

     protected ?CodeGenerator\Templates\Interfaces\ValueTemplateInterface $value = null;

     public function getName(): string
     {
         return $this->name;
     }

     public function setName(string $Name): CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface
     {
         $this->name = $Name;

         return $this;
     }

     public function setValue(?CodeGenerator\Templates\Interfaces\ValueTemplateInterface $Value): CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface
     {
         $this->value = $Value;

         return $this;
     }

     public function getValue(): ?CodeGenerator\Templates\Interfaces\ValueTemplateInterface
     {
         return $this->value;
     }

     public function setType(Stringable|string $type): CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface
     {
         $this->value = $type;

         return $this;
     }

     public function getType(): Stringable|string
     {
         return $this->type;
     }

     public function __toString(): string
     {
        return 
            (
                $this->type !== null
                ? $this->type
                : ' var '
            )
            .$this->name
            .(
                $this->value !== null
                ? ' = '. (string)$this->value.';'
                : ''
            );
     }
 }

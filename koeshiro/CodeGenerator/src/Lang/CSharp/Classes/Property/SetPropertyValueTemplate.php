<?php

 class SetPropertyValueTemplate implements CodeGenerator\Templates\Interfaces\Classes\Property\SetPropertyValueTemplateInterface
 {
     public function setObject(CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface|CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface|string $Class): CodeGenerator\Templates\Interfaces\Classes\Property\SetPropertyValueTemplateInterface
     {
         $this->object = $Class;

         return $this;
     }

     public function setProperty(CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface|string $property): CodeGenerator\Templates\Interfaces\Classes\Property\SetPropertyValueTemplateInterface
     {
         $this->property = $property;

         return $this;
     }

     public function setValue(CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface|string $value): CodeGenerator\Templates\Interfaces\Classes\Property\SetPropertyValueTemplateInterface
     {
         $this->value = $value;

         return $this;
     }

     public function setUseStaticMode(bool $mode): CodeGenerator\Templates\Interfaces\Classes\Property\SetPropertyValueTemplateInterface
     {
         $this->useStaticMode = $mode;

         return $this;
     }

     public function __toString(): string
     {
     }
 }

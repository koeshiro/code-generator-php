<?php

 class GetPropertyValueTemplate implements CodeGenerator\Templates\Interfaces\Classes\Property\GetPropertyValueTemplateInterface
 {
     public function setObject(CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface|CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface|string $Class): CodeGenerator\Templates\Interfaces\Classes\Property\GetPropertyValueTemplateInterface
     {
         $this->object = $Class;

         return $this;
     }

     public function setProperty(CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface|string $property): CodeGenerator\Templates\Interfaces\Classes\Property\GetPropertyValueTemplateInterface
     {
         $this->property = $property;

         return $this;
     }

     public function setUseStaticMode(bool $mode): CodeGenerator\Templates\Interfaces\Classes\Property\GetPropertyValueTemplateInterface
     {
         $this->useStaticMode = $mode;

         return $this;
     }

     public function __toString(): string
     {
     }
 }

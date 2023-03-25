<?php

 class ImplementTemplate implements CodeGenerator\Templates\Interfaces\Classes\ImplementTemplateInterface
 {
     public function setClass(CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface|string $Class): CodeGenerator\Templates\Interfaces\Classes\ImplementTemplateInterface
     {
         $this->class = $Class;

         return $this;
     }

     public function addArgument(CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface $Argument): CodeGenerator\Templates\Interfaces\Classes\ImplementTemplateInterface
     {
         return $this;
     }

     public function __toString(): string
     {
     }
 }

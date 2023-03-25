<?php

 class UseMethodTemplate implements CodeGenerator\Templates\Interfaces\Classes\Method\UseMethodTemplateInterface
 {
     public function setUseStaticMode(bool $mode): CodeGenerator\Templates\Interfaces\Classes\Method\UseMethodTemplateInterface
     {
         $this->useStaticMode = $mode;

         return $this;
     }

     public function setObject(CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface|CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface|string $Class): CodeGenerator\Templates\Interfaces\Classes\Method\UseMethodTemplateInterface
     {
         $this->object = $Class;

         return $this;
     }

     public function setMethod(CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface|string $Method): CodeGenerator\Templates\Interfaces\Classes\Method\UseMethodTemplateInterface
     {
         $this->method = $Method;

         return $this;
     }

     public function setArguments(array $arguments): CodeGenerator\Templates\Interfaces\Classes\Method\UseMethodTemplateInterface
     {
         $this->arguments = $arguments;

         return $this;
     }

     public function __toString(): string
     {
     }
 }

<?php

 class UseFunctionTemplate implements CodeGenerator\Templates\Interfaces\Functions\UseFunctionTemplateInterface
 {
     public function setFunction(CodeGenerator\Templates\Interfaces\Functions\FunctionTemplateInterface $Method): CodeGenerator\Templates\Interfaces\Functions\UseFunctionTemplateInterface
     {
         $this->function = $Method;

         return $this;
     }

     public function setArguments(array $arguments): CodeGenerator\Templates\Interfaces\Functions\UseFunctionTemplateInterface
     {
         $this->arguments = $arguments;

         return $this;
     }
 }

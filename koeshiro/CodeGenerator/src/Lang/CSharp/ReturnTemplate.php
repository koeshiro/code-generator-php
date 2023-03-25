<?php

 class ReturnTemplate implements CodeGenerator\Templates\Interfaces\ReturnTemplateInterface
 {
     public function setReturn(Stringable $value): CodeGenerator\Templates\Interfaces\ReturnTemplateInterface
     {
         $this->return = $value;

         return $this;
     }

     public function __toString(): string
     {
     }
 }

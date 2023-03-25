<?php

 class UseTemplate implements CodeGenerator\Templates\Interfaces\UseTemplateInterface
 {
     protected string $use;

     public function getUse(): string
     {
         return $this->use;
     }

     public function setUse(string $object): CodeGenerator\Templates\Interfaces\UseTemplateInterface
     {
         $this->use = $object;

         return $this;
     }

     public function __toString(): string
     {
        return 'use '.$this->object.';';
     }
 }

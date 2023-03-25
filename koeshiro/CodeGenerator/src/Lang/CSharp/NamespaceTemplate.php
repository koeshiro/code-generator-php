<?php

 class NamespaceTemplate implements CodeGenerator\Templates\Interfaces\NamespaceTemplateInterface
 {
     protected string $namespace;

     public function setNamespace(string $Namespace): CodeGenerator\Templates\Interfaces\NamespaceTemplateInterface
     {
         $this->namespace = $Namespace;

         return $this;
     }

     public function getNamespace(): string
     {
         return $this->namespace;
     }

     public function setBlock(CodeGenerator\Templates\Interfaces\BlockTemplateInterface $Block): CodeGenerator\Templates\Interfaces\NamespaceTemplateInterface
     {
         $this->block = $Block;

         return $this;
     }

     public function __toString(): string
     {
     }
 }

<?php

 class FunctionTemplate implements CodeGenerator\Templates\Interfaces\Functions\FunctionTemplateInterface
 {
     protected string $name;

     protected CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface $argument;

     protected ?CodeGenerator\Templates\Interfaces\BlockTemplateInterface $block;

     public function addDecorator(CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface $decorator): CodeGenerator\Templates\Interfaces\Functions\FunctionTemplateInterface
     {
         return $this;
     }

     public function getDecorators(): array
     {
     }

     public function setName(string $Name): CodeGenerator\Templates\Interfaces\Functions\FunctionTemplateInterface
     {
         $this->name = $Name;

         return $this;
     }

     public function getName(): string
     {
         return $this->name;
     }

     public function addArgument(CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface $Argument): CodeGenerator\Templates\Interfaces\Functions\FunctionTemplateInterface
     {
         return $this;
     }

     public function getArgument(string $Name): CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface
     {
         return $this->argument;
     }

     public function getArguments(): array
     {
     }

     public function setBlock(CodeGenerator\Templates\Interfaces\BlockTemplateInterface $Block): CodeGenerator\Templates\Interfaces\Functions\FunctionTemplateInterface
     {
         $this->block = $Block;

         return $this;
     }

     public function getBlock(): ?CodeGenerator\Templates\Interfaces\BlockTemplateInterface
     {
         return $this->block;
     }

     public function setReturnType(string $Type): CodeGenerator\Templates\Interfaces\Functions\FunctionTemplateInterface
     {
         $this->returnType = $Type;

         return $this;
     }

     public function useFunction(array $Arguments): CodeGenerator\Templates\Interfaces\Functions\UseFunctionTemplateInterface
     {
     }

     public function __toString(): string
     {
     }
 }

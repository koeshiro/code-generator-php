<?php

 class MethodTemplate implements CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface
 {
     protected string $name;

     protected CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface $argument;

     protected ?CodeGenerator\Templates\Interfaces\BlockTemplateInterface $block;

     protected string $returnType;

     protected string $scope;

     protected bool $staticMode;

     public function addDecorator(CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface $decorator): CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface
     {
         return $this;
     }

     public function getDecorators(): array
     {
     }

     public function setName(string $Name): CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface
     {
         $this->name = $Name;

         return $this;
     }

     public function getName(): string
     {
         return $this->name;
     }

     public function addArgument(CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface $Argument): CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface
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

     public function setBlock(CodeGenerator\Templates\Interfaces\BlockTemplateInterface $Block): CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface
     {
         $this->block = $Block;

         return $this;
     }

     public function getBlock(): ?CodeGenerator\Templates\Interfaces\BlockTemplateInterface
     {
         return $this->block;
     }

     public function setReturnType(string $Type): CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface
     {
         $this->returnType = $Type;

         return $this;
     }

     public function getReturnType(): string
     {
         return $this->returnType;
     }

     public function setScope(string $scope): CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface
     {
         $this->scope = $scope;

         return $this;
     }

     public function getScope(): string
     {
         return $this->scope;
     }

     public function setStaticMode(bool $static): CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface
     {
         $this->staticMode = $static;

         return $this;
     }

     public function getStaticMode(): bool
     {
         return $this->staticMode;
     }

     public function __toString(): string
     {
     }
 }

<?php

 class PropertyTemplate implements CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface
 {
     protected string $name;

     protected CodeGenerator\Templates\Interfaces\ValueTemplateInterface|string|null $value;

     protected string $type;

     protected ?string $scope;

     protected ?bool $staticMode;

     public function addDecorator(CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface $decorator): CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface
     {
         return $this;
     }

     public function getDecorators(): array
     {
     }

     public function setName(string $Name): CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface
     {
         $this->name = $Name;

         return $this;
     }

     public function getName(): string
     {
         return $this->name;
     }

     public function setValue(?CodeGenerator\Templates\Interfaces\ValueTemplateInterface $Value): CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface
     {
         $this->value = $Value;

         return $this;
     }

     public function getValue(): CodeGenerator\Templates\Interfaces\ValueTemplateInterface|string|null
     {
         return $this->value;
     }

     public function setType(string $Type): CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface
     {
         $this->type = $Type;

         return $this;
     }

     public function getType(): string
     {
         return $this->type;
     }

     public function setScope(string $scope): CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface
     {
         $this->scope = $scope;

         return $this;
     }

     public function getScope(): ?string
     {
         return $this->scope;
     }

     public function setStaticMode(bool $static): CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface
     {
         $this->staticMode = $static;

         return $this;
     }

     public function getStaticMode(): ?bool
     {
         return $this->staticMode;
     }

     public function __toString(): string
     {
     }
 }

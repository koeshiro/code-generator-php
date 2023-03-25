<?php

 class ClassTemplate implements CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface
 {
     protected string $name;

     protected string $modification;

     protected string $extends;

     protected ?CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface $method;

     protected ?CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface $property;

     public function addDecorator(CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface $decorator): CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface
     {
         return $this;
     }

     public function getDecorators(): array
     {
     }

     public function setName(string $Name): CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface
     {
         $this->name = $Name;

         return $this;
     }

     public function getName(): string
     {
         return $this->name;
     }

     public function setModification(string $Modification): CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface
     {
         $this->modification = $Modification;

         return $this;
     }

     public function getModification(): string
     {
         return $this->modification;
     }

     public function setExtends(string $Extends): CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface
     {
         $this->extends = $Extends;

         return $this;
     }

     public function getExtends(): string
     {
         return $this->extends;
     }

     public function addImplementInterface(string $Implement): CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface
     {
         return $this;
     }

     public function getImplementsInterface(): array
     {
     }

     public function addMethod(CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface $Method): CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface
     {
         return $this;
     }

     public function getMethod(string $Name): ?CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface
     {
         return $this->method;
     }

     public function useMethod(string $Name, array $Arguments): CodeGenerator\Templates\Interfaces\Classes\Method\UseMethodTemplateInterface
     {
     }

     public function getMethods(): array
     {
     }

     public function addProperty(CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface $property): CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface
     {
         return $this;
     }

     public function getProperty(string $Name): ?CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface
     {
         return $this->property;
     }

     public function getProperties(): array
     {
     }

     public function __toString(): string
     {
     }
 }

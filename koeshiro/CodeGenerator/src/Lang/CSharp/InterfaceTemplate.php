<?php

use CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface;
use CodeGenerator\Templates\Interfaces\InterfaceTemplateInterface;
 class InterfaceTemplateTemplate implements CodeGenerator\Templates\Interfaces\InterfaceTemplateInterface
 {
     protected string $name;

     protected string $extends;

     /**
      * @var array<int,\CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface>
      */
     protected array $methods;

     /**
      * @var array<int,\CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface>
      */
     protected array $propertes;

     public function setName(string $Name): CodeGenerator\Templates\Interfaces\InterfaceTemplateInterface
     {
         $this->name = $Name;

         return $this;
     }

     public function getName(): string
     {
         return $this->name;
     }

     public function setExtends(string $Extends): CodeGenerator\Templates\Interfaces\InterfaceTemplateInterface
     {
         $this->extends = $Extends;

         return $this;
     }

     public function getExtends(): string
     {
         return $this->extends;
     }

     public function addMethod(CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface $Method): CodeGenerator\Templates\Interfaces\InterfaceTemplateInterface
     {
        $this->methods[$Method->getName()] = $Method;
        return $this;
     }

     public function getMethod(string $Name): CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface
     {
         return $this->methods[$Name];
     }

     public function getMethods(): array
     {
        return $this->methods;
     }

     public function addProperty(CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface $property): CodeGenerator\Templates\Interfaces\InterfaceTemplateInterface
     {
        $this->propertes[$property->getName()] = $property;
        return $this;
     }

     public function getProperty(string $Name): CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface
     {
         return $this->propertes[$Name];
     }

     public function getProperties(): array
     {
        return $this->propertes;
     }

     public function __toString(): string
     {
        $extends = strlen($this->extends) ? $this->extends : '';
        $propertes = (
            count($this->propertes)
                ? implode('; ', array_map(function ($o) {
                    return (string) $o;
                }, $this->propertes))
                : ''
        );
        $methods = implode('; ', array_map(
            function (MethodTemplateInterface $o) {
                $arguments = (
                    count($o->getArguments())
                        ? implode("\n", array_map(function ($o) {
                            return (string)$o;
                        }, $this->propertes))
                        : ''
                );

                return
                    $o->getScope()
                    .' '
                    .(
                        $o->getStaticMode()
                            ? $o->getStaticMode()
                            : ''
                    )
                    .' function '
                    .$o->getName()
                    .'('
                    .$arguments
                    .')'
                    .strlen($o->getReturnType()) > 0 ? ': '.$o->getReturnType() : ''
                    .'';
            },
            $this->methods
        ));

        return "interfce ${$this->name} ${$extends} { $propertes $methods }";
     }
 }

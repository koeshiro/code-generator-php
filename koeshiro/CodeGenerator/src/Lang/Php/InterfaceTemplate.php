<?php
namespace CodeGenerator\Lang\Php;

use CodeGenerator\Templates\Interfaces\InterfaceTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface;

/**
 * Description of InterfaceTemplate
 *
 * @author rustamborhanov
 */
class InterfaceTemplate implements InterfaceTemplateInterface
{
    /** @var array<MethodTemplateInterface> */
    protected array $methods = [];
    /** @var array<PropertyTemplateInterface> */
    protected array $propertes = [];
    protected string $extends = "";
    protected string $name = "";

    public function __toString() {
        $extends = strlen($this->extends) ? $this->extends : '';
        $propertes = (
                count($this->propertes)
                    ? implode("; ", array_map(function($o){return (string)$o;}, $this->propertes))
                    : ''
        );
        $methods = implode("; ", array_map(
                function(MethodTemplateInterface $o){
                    $arguments = (
                        count($o->getArguments())
                            ? array_map(function($o){return "${(string)$o}, ";}, $this->propertes)
                            : ''
                    );
                    return 
                        $o->getScope()
                            + ' '
                            + (
                                $o->getStaticMode()
                                    ? $o->getStaticMode()
                                    : ''
                            )
                            + ' function '
                            + $o->getName()
                            + '('
                            + $arguments
                            + ')'
                            + strlen($o->getReturnType()) ? ": ${$o->getReturnType()}" : ''
                            + '';
                }, 
                $this->methods
        ));
        return "interfce ${$this->name} ${$extends} { $propertes $methods }";
    }

    public function addMethod(MethodTemplateInterface $Method): InterfaceTemplateInterface {
        $this->methods[$Method->getName()]=$Method;
        return $this;
    }

    public function addProperty(PropertyTemplateInterface $property): InterfaceTemplateInterface {
        $this->propertes[$property->getName()]=$property;
        return $this;
    }

    public function getExtends(): string
    {
        return $this->extends;
    }

    public function getMethod(string $Name)
    {
        return $this->methods[$Name];
    }

    public function getMethods()
    {
        return $this->methods;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getProperties()
    {
        return $this->propertes;
    }

    public function getProperty(string $Name)
    {
        return $this->propertes[$Name];
    }

    public function setExtends(string $Extends): InterfaceTemplateInterface {
        $this->extends = $Extends;
        return $this;
    }

    public function setName(string $Name): InterfaceTemplateInterface {
        $this->name = $Name;      
        return $this;  
    }
}

<?php

namespace CodeGenerator\Lang\Php\Classes;

use CodeGenerator\LangTemplateException;
use CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Method\UseMethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface;
use CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface;

/**
 * Description of ClassTemplate
 *
 * @author koesh
 */
class ClassTemplate implements ClassTemplateInterface {

    protected string $name = '';
    protected string $extends = '';
    protected string $modification = '';
    /** @var array<MethodTemplateInterface> */
    protected array $methods = [];
    /** @var array<PropertyTemplateInterface> */
    protected array $properties = [];
    /** @var array<string> */
    protected array $implements = [];
    /** @var array<PropertyTemplateInterface> */
    protected array $arguments = [];
    /** @var array<\CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface> */
    protected array $decorators = [];

    public function addDecorator(DecoratorTemplateInterface $decorator): ClassTemplateInterface {
        $this->decorators[] = $decorator;
        return $this;
    }
    /**
     * @return array<\CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface>
     */
    public function getDecorators(): array {
        return $this->decorators;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $Name): ClassTemplateInterface {
        $this->name = $Name;
        return $this;
    }

    public function addMethod(MethodTemplateInterface $Method): ClassTemplateInterface {
        if(array_key_exists($Method->getName(),$this->methods)) {
            throw new LangTemplateException("Method is exists","php");
        }
        $this->methods[$Method->getName()] = $Method;
        return $this;
    }

    public function getMethod(string $Name): MethodTemplateInterface | null {
        if (array_key_exists($Name, $this->methods)) {
            return $this->methods[$Name];
        } else {
            return null;
        }
    }

    public function getMethods(): array {
        return $this->methods;
    }

    public function useMethod(string $Name, array $Arguments): UseMethodTemplateInterface {
        $use = new Method\UseMethodTemplate();
        $use->setArguments($Arguments);
        $use->setMethod($this->getMethod($Name));
        $use->setObject($this);
        return $use;
    }

    public function addProperty(PropertyTemplateInterface $property): ClassTemplateInterface {
        $this->properties[$property->getName()] = $property;
        return $this;
    }

    public function getProperty(string $Name): PropertyTemplateInterface {
        return $this->properties[$Name];
    }

    public function getProperties(): array {
        return $this->properties;
    }

    public function setExtends(string $Extends): ClassTemplateInterface {
        $this->extends = $Extends;
        return $this;
    }

    public function getExtends(): string {
        return $this->extends;
    }

    public function getModification(): string {
        return $this->modification;
    }

    public function setModification(string $Modification): ClassTemplateInterface {
        $this->modification = $Modification;
        return $this;
    }

    public function addImplementInterface(string $Implement): ClassTemplateInterface {
        $this->implements[] = $Implement;
        return $this;
    }

    public function getImplementsInterface(): array {
        return $this->implements;
    }

    public function __toString() {
        $extends = ($this->getExtends() !== '' ? ' extends '.$this->getExtends().' ' : '');
        $implements = count($this->getImplementsInterface()) ? ' implements ' . implode(', ', $this->getImplementsInterface()) : '';
        $properties = count($this->getProperties()) ? implode("\n",array_map(fn($p): string => (string) $p, $this->getProperties())) : '';
        $methods = count($this->getMethods()) ? implode("\n",array_map(fn($p): string => (string) $p, $this->getMethods())) : '';
        return $this->getModification().' class '.$this->getName().' ' . $extends . $implements.'{'.$properties."\n".$methods.'}';
    }

}

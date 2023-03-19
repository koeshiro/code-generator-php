<?php

namespace CodeGenerator\Templates\Interfaces\Classes;

use CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Method\UseMethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface;
use CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface;

/**
 * @author koesh
 */
interface ClassTemplateInterface extends \Stringable
{
    public function addDecorator(DecoratorTemplateInterface $decorator): self;

    /** @return array<int,DecoratorTemplateInterface> */
    public function getDecorators(): array;

    public function setName(string $Name): self;

    public function getName(): string;

    public function setModification(string $Modification): self;

    public function getModification(): string;

    public function setExtends(string $Extends): self;

    public function getExtends(): string;

    public function addImplementInterface(string $Implement): self;

    /** @return array<int,string> */
    public function getImplementsInterface(): array;

    public function addMethod(MethodTemplateInterface $Method): self;

    public function getMethod(string $Name): ?MethodTemplateInterface;

    /**
     * @param  array<int,\Stringable|string>  $Arguments
     */
    public function useMethod(string $Name, array $Arguments): UseMethodTemplateInterface;

    /** @return array<int,MethodTemplateInterface> */
    public function getMethods(): array;

    public function addProperty(PropertyTemplateInterface $property): self;

    public function getProperty(string $Name): ?PropertyTemplateInterface;

    /** @return array<int,PropertyTemplateInterface> */
    public function getProperties(): array;
}

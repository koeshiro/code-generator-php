<?php
namespace CodeGenerator\Templates\Interfaces\Classes;

use CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Method\UseMethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface;
use CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface;

/**
 *
 * @author koesh
 */
interface ClassTemplateInterface extends \Stringable {
    public function addDecorator(DecoratorTemplateInterface $decorator): self;
    public function getDecorators(): array;

    public function setName(string $Name): self;

    public function getName(): string;

    public function setModification(string $Modification): self;

    public function getModification(): string;

    public function setExtends(string $Extends): self;

    public function getExtends(): string;

    public function addImplementInterface(string $Implement): self;

    public function getImplementsInterface(): array;

    public function addMethod(MethodTemplateInterface $Method): self;

    public function getMethod(string $Name): MethodTemplateInterface | null;

    /**
     *
     * @param string $Name
     * @param array<\Stringable|string> $Arguments
     */
    public function useMethod(string $Name, array $Arguments): UseMethodTemplateInterface;

    public function getMethods(): array;

    public function addProperty(PropertyTemplateInterface $property): self;

    public function getProperty(string $Name): PropertyTemplateInterface;

    public function getProperties(): array;
}

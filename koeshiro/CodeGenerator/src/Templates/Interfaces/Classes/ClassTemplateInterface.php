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

    public function getName();

    public function setModification(string $Modification): self;

    public function getModification();

    public function setExtends(string $Extends): self;

    public function getExtends();

    public function addImplementInterface(string $Implement): self;

    public function getImplementsInterface();

    public function addMethod(MethodTemplateInterface $Method): self;

    public function getMethod(string $Name): MethodTemplateInterface | null;

    /**
     *
     * @param string $Name
     * @param array<\Stringable|string> $Arguments
     */
    public function useMethod(string $Name, array $Arguments): UseMethodTemplateInterface;

    public function getMethods();

    public function addProperty(PropertyTemplateInterface $property);

    public function getProperty(string $Name);

    public function getProperties();
}

<?php
namespace CodeGenerator\Templates\Interfaces;

use CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface;

/**
 * Класс описывающий создание интерфейса
 *
 * @author koesh
 */
interface InterfaceTemplateInterface extends \Stringable
{

    public function setName(string $Name): self;

    public function getName();

    public function setExtends(string $Extends): self;

    public function getExtends(): string;

    public function addMethod(MethodTemplateInterface $Method): self;

    public function getMethod(string $Name);

    public function getMethods();

    public function addProperty(PropertyTemplateInterface $property): self;

    public function getProperty(string $Name);

    public function getProperties();
}

<?php
namespace CodeGenerator\Templates\Interfaces\Classes\Method;

use CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface;
use \CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface;

/**
 * Класс для умправлений методами объектов
 *
 * @author koesh
 */
interface UseMethodTemplateInterface extends \Stringable
{
    public function setUseStaticMode(bool $mode): self;

    public function setObject(ClassTemplateInterface|VariableTemplateInterface|string $Class): self;

    public function setMethod(MethodTemplateInterface|string $Method): self;

    /**
     *
     * @param array<\Stringable|string> $arguments
     */
    public function setArguments(\Stringable|string $argument): self;
}

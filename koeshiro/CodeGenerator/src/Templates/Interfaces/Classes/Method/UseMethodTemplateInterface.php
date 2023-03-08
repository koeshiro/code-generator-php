<?php
namespace CodeGenerator\Templates\Interfaces\Classes\Method;

use CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface;
use \CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface;
use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;

/**
 * @author koesh
 */
interface UseMethodTemplateInterface extends \Stringable
{
    public function setUseStaticMode(bool $mode): self;

    public function setObject(ClassTemplateInterface|VariableTemplateInterface|string $Class): self;

    public function setMethod(MethodTemplateInterface|string $Method): self;

    /**
     * @param array<int,\Stringable|string|ArgumentTemplateInterface> $arguments
     */
    public function setArguments(array $arguments): self;
}

<?php
namespace CodeGenerator\Templates\Interfaces\Functions;

use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;


/**
 *
 * @author koesh
 */
interface UseFunctionTemplateInterface
{

    public function setFunction(FunctionTemplateInterface $Method): self;

    /**
     *
     * @param array<\Stringable|string|ArgumentTemplateInterface> $arguments
     */
    public function setArguments(array $arguments): self;
}

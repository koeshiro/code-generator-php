<?php
namespace CodeGenerator\Templates\Interfaces\Functions;


/**
 *
 * @author koesh
 */
interface UseFunctionTemplateInterface
{

    public function setFunction(FunctionTemplateInterface $Method): self;

    /**
     *
     * @param array<\Stringable|string> $arguments
     */
    public function setArguments($arguments): self;
}

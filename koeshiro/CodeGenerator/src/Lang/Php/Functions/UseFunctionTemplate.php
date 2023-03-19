<?php

namespace CodeGenerator\Lang\Php\Functions;

use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;
use CodeGenerator\Templates\Interfaces\Functions\FunctionTemplateInterface;
use CodeGenerator\Templates\Interfaces\Functions\UseFunctionTemplateInterface;

/**
 * Description of UseFunctionTemplate
 *
 * @author rustamborhanov
 */
class UseFunctionTemplate implements UseFunctionTemplateInterface
{
    /** @var array<\Stringable|string|ArgumentTemplateInterface> */
    protected array $arguments = [];

    protected ?FunctionTemplateInterface $method = null;

    // put your code here
    /** @param  array<\Stringable|string|ArgumentTemplateInterface>  $arguments */
    public function setArguments(array $arguments): UseFunctionTemplateInterface
    {
        $this->arguments = $arguments;

        return $this;
    }

    public function setFunction(FunctionTemplateInterface $Method): UseFunctionTemplateInterface
    {
        $this->method = $Method;

        return $this;
    }
}

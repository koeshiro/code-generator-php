<?php
namespace CodeGenerator\Lang\Php\Functions;

use CodeGenerator\Templates\Interfaces\Functions\UseFunctionTemplateInterface;
use CodeGenerator\Templates\Interfaces\Functions\FunctionTemplateInterface; 
use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;

/**
 * Description of UseFunctionTemplate
 *
 * @author rustamborhanov
 */
class UseFunctionTemplate implements UseFunctionTemplateInterface
{
    /** @var array<ArgumentTemplateInterface> */
    protected array $arguments = [];
    protected ?FunctionTemplateInterface $method = null;
    // put your code here
    /** @var array<ArgumentTemplateInterface> */
    public function setArguments(array $arguments): UseFunctionTemplateInterface {
        $this->arguments = $arguments;
        return $this;
    }

    public function setFunction(FunctionTemplateInterface $Method): UseFunctionTemplateInterface {
        $this->method = $Method;
        return $this;
    }
}

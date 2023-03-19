<?php

namespace CodeGenerator\Lang\Php\Classes;

use CodeGenerator\LangTemplateException;
use CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\ImplementTemplateInterface;

/**
 * @author koesh
 */
class ImplementTemplate implements ImplementTemplateInterface
{
    /** @var array<\CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface> */
    protected array $arguments = [];

    protected ClassTemplateInterface|string|null  $class = null;

    public function __toString()
    {
        $arguments = implode(',', array_map(fn ($p): string => (string) $p, $this->arguments));
        if ($this->class === null) {
            throw new LangTemplateException('Class is not defined', 'php');
        }
        $className = is_string($this->class) ? $this->class : $this->class->getName();

        return "new {$className}($arguments)";
    }

    public function addArgument(\CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface $Argument): ImplementTemplateInterface
    {
        $this->arguments[] = $Argument;

        return $this;
    }

    public function setClass(string|ClassTemplateInterface $Class): ImplementTemplateInterface
    {
        $this->class = $Class;

        return $this;
    }
}

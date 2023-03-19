<?php

namespace CodeGenerator\Lang\Php\Classes\Method;

use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Method\UseMethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface;

/**
 * Description of UseMethod
 *
 * @author rustamborhanov
 */
class UseMethodTemplate implements UseMethodTemplateInterface
{
    /** @var array<\Stringable|string|ArgumentTemplateInterface> */
    protected array $arguments = [];

    protected MethodTemplateInterface|string|null $method = null;

    protected ClassTemplateInterface|VariableTemplateInterface|string|null $object = null;

    protected ?bool $staticMode = null;

    protected function argumentToString(\Stringable|string|ArgumentTemplateInterface $arg): string
    {
        if ($arg instanceof ArgumentTemplateInterface) {
            return $arg->getType().' '.$arg->getName().($arg->getValue() !== null ? '='.(string) $arg->getValue() : '');
        }

        return (string) $arg;
    }

    public function __toString()
    {
        $useObject = '';
        if ($this->object instanceof ClassTemplateInterface) {
            $useObject = $this->object->getName();
        } else {
            $useObject = (string) $this->object;
        }
        $staticMode = false;
        if ($this->staticMode === true) {
            $staticMode = true;
        } elseif ($this->staticMode === false) {
            $staticMode = false;
        } elseif (
            $this->object instanceof ClassTemplateInterface &&
            gettype($this->method) === 'string'
        ) {
            $method = $this->object->getMethod($this->method);
            if ($method !== null) {
                $staticMode = $method->getStaticMode();
            } else {
                throw new \BadMethodCallException("Method $this->method not exist on object ${$this->object->getName()}");
            }
        } elseif ($this->method instanceof MethodTemplateInterface) {
            $staticMode = $this->method->getName();
        }
        $useFormat = $staticMode ? '::' : '->';
        $useMethod = '';
        if ($this->method instanceof MethodTemplateInterface && count($this->arguments)) {
            $argumentsList = [];
            foreach ($this->arguments as $arg) {
                $argumentsList[] = $this->argumentToString($arg);
            }
            $arguments = implode(',', $argumentsList);
            $useMethod = $this->method->getName()."($arguments)";
        } elseif ($this->method instanceof MethodTemplateInterface) {
            $useMethod = (string) $this->method->getName().'()';
        } else {
            $useMethod = $this->method.'()';
        }

        return $useObject.$useFormat.$useMethod.';';
    }

    /**
     * @param  array<int,\Stringable|string|ArgumentTemplateInterface>  $arguments
     */
    public function setArguments(array $arguments): UseMethodTemplateInterface
    {
        $this->arguments = $arguments;

        return $this;
    }

    public function setMethod(MethodTemplateInterface|string $Method): UseMethodTemplateInterface
    {
        $this->method = $Method;

        return $this;
    }

    public function setObject(ClassTemplateInterface|VariableTemplateInterface|string $Class): UseMethodTemplateInterface
    {
        $this->object = $Class;

        return $this;
    }

    public function setUseStaticMode(bool $mode): UseMethodTemplateInterface
    {
        $this->staticMode = $mode;

        return $this;
    }
}

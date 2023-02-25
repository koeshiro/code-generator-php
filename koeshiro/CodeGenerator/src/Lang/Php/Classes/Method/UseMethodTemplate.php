<?php

namespace CodeGenerator\Lang\Php\Classes\Method;

use CodeGenerator\Templates\Interfaces\Classes\Method\UseMethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface;
use CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface;

/**
 * Description of UseMethod
 *
 * @author rustamborhanov
 */
class UseMethodTemplate implements UseMethodTemplateInterface {
    /** @var array<\Stringable|string> */
    protected array $arguments = [];
    protected MethodTemplateInterface|string|null $method = null;
    protected ClassTemplateInterface|VariableTemplateInterface|string|null $object = null;
    protected ?bool $staticMode = null;

    public function __toString() {
        $useObject = "";
        if ($this->object instanceof ClassTemplateInterface) {
            $useObject = $this->object->getName();
        } else {
            $useObject = (string)$this->object;
        }
        $staticMode = false;
        if ($this->staticMode === true) {
            $staticMode = true;
        } else if ($this->staticMode === false) {
            $staticMode = false;
        } else if (
            $this->object instanceof ClassTemplateInterface &&
            gettype($this->method) === "string"
        ) {
            $method = $this->object->getMethod($this->method);
            if($method!==null) {
                $staticMode= $method->getStaticMode();
            } else {
                throw new \BadMethodCallException("Method $this->method not exist on object ${$this->object->getName()}");
            }
        } else if($this->method instanceof MethodTemplateInterface) {
            $staticMode = $this->method->getName();
        }
        $useFormat = $staticMode ? "::" : "->";
        $useMethod = "";
        if ($this->method instanceof MethodTemplateInterface && count($this->arguments)) {
            $argumentsList = [];
            foreach ($this->arguments as $arg) {
                $argumentsList[] = $arg->getType() . " " . $arg->getName() . $arg->getValue() !== null ? "=" . (string) $arg->getValue() : "";
            }
            $arguments = implode(",", $argumentsList);
            $useMethod = $this->method->getName() . "($arguments)";
        } else if ($this->method instanceof MethodTemplateInterface) {
            $useMethod = (string) $this->method->getName() . "()";
        } else {
            $useMethod = $this->method . "()";
        }
        return $useObject . $useFormat . $useMethod . ";";
    }

    public function setArguments($argument) {
        $this->arguments[] = $argument;
    }

    public function setMethod(MethodTemplateInterface|string $Method) {
        $this->method = $Method;
    }

    public function setObject(ClassTemplateInterface|VariableTemplateInterface|string $Class) {
        $this->object = $Class;
    }

    public function setUseStaticMode(bool $mode) {
        $this->staticMode = $mode;
    }

}

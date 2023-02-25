<?php

namespace CodeGenerator\Lang\Php\Classes\Method;

use CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\BlockTemplateInterface;
use CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface;

/**
 * Description of MethodTemplate
 *
 * @author rustamborhanov
 */
class MethodTemplate implements MethodTemplateInterface {

    protected string $name = '';
    protected ?BlockTemplateInterface $block = null;
    protected string $returnType = '';
    protected string $scope = '';
    protected bool $staticMode = false;

    /** @var \CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface */
    protected $arguments = [];
    /** @var array<\CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface> */
    protected array $decorators = [];

    public function addDecorator(DecoratorTemplateInterface $decorator): self {
        $this->decorators[] = $decorator;
        return $this;
    }
    /**
     * @return array<\CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface>
     */
    public function getDecorators(): array {
        return $this->decorators;
    }

    // put your code here
    public function addArgument(\CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface $Argument): MethodTemplateInterface {
        $this->arguments[$Argument->getName()] = $Argument;
        return $this;
    }

    public function getArgument(string $Name) {
        return $this->arguments[$Name];
    }

    public function getArguments() {
        return $this->arguments;
    }

    public function getBlock() {
        return $this->block;
    }

    public function getName() {
        return $this->name;
    }

    public function setBlock(\CodeGenerator\Templates\Interfaces\BlockTemplateInterface $Block): MethodTemplateInterface {
        $this->block = $Block;
        return $this;
    }

    public function setName(string $Name): MethodTemplateInterface {
        $this->name = $Name;
        return $this;
    }

    public function setReturnType(string $Type): MethodTemplateInterface {
        $this->returnType = $Type;
        return $this;
    }

    public function getReturnType() {
        return $this->returnType;
    }

    public function getScope() {
        return $this->scope;
    }

    public function getStaticMode() {
        return $this->staticMode;
    }

    public function setScope(string $scope): MethodTemplateInterface {
        $this->scope = $scope;
        return $this;
    }

    public function setStaticMode(bool $static): MethodTemplateInterface {
        $this->staticMode = $static;
        return $this;
    }

    public function __toString() {
        $argumentsList = [];
        foreach ($this->arguments as $arg) {
            $argumentsList[] = (string)$arg;
        }
        $arguments = implode(",", $argumentsList);
        $decorators = (
            count($this->decorators)
            ? implode(' ', array_map(fn($p): string => (string) $p, $this->decorators)) . ' '
            : ''
        );
        return str_replace(
            "  ",
            " ",
            "$decorators $this->scope $this->staticMode function $this->name($arguments)"
                . ($this->returnType !== '' ? ":$this->returnType" : '')
                . ' '
                . ($this->block !== null ? $this->block : "{}" )
        );
    }

}

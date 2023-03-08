<?php

namespace CodeGenerator\Lang\Php\Classes\Property;

use CodeGenerator\Templates\Interfaces\Classes\Property\PropertyTemplateInterface;
use CodeGenerator\Templates\Interfaces\ValueTemplateInterface;
use CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface;

/**
 * Description of PropertyTemplate
 *
 * @author rustamborhanov
 */
class PropertyTemplate implements PropertyTemplateInterface {

    protected string $name = '';
    protected ?ValueTemplateInterface $value = null;
    protected ?string $scope = null;
    protected ?bool $staticMode = null;
    protected string $type = '';
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

    public function __toString() {
        $decorators = (
            count($this->decorators)
            ? implode(' ', array_map(fn($p): string => (string) $p, $this->decorators)) . ' '
            : ''
        );
        $staticMode = $this->getStaticMode() !== null ? $this->getStaticMode() : false;
        $scope = '';
        if (
            $this->getScope() !== null
            && in_array(strtolower($this->getScope()), ["protected", "public", "private"])
        ) {
            $scope = strtolower($this->getScope());
        }
        $result = $decorators
            .$scope
            . ' '
            . (
                $staticMode
                ? ' static '
                : ''
            )
            . (
                $this->getType() !== ''
                ? ' ' . $this->getType() . ' '
                : ""
            )
            . $this->getName()
            . (
                $this->getValue() !== null
                ? ' = ' . (string) $this->getValue()
                : ''
            )
            . ';';
        return str_replace("  ", " ", $result);
    }

    public function getName(): string {
        return $this->name;
    }

    public function getValue(): ?ValueTemplateInterface {
        return $this->value;
    }

    public function setName(string $Name): PropertyTemplateInterface {
        $this->name = $Name;
        return $this;
    }

    public function setValue(?ValueTemplateInterface $Value = null): PropertyTemplateInterface {
        $this->value = $Value;
        return $this;
    }

    public function getScope(): string | null {
        return $this->scope;
    }

    public function getStaticMode(): bool | null {
        return $this->staticMode;
    }

    public function getType(): string {
        return $this->type;
    }

    public function setScope(string $scope): PropertyTemplateInterface {
        $this->scope = $scope;
        return $this;
    }

    public function setStaticMode(bool $static): PropertyTemplateInterface {
        $this->staticMode = $static;
        return $this;
    }

    public function setType(string $Type): PropertyTemplateInterface {
        $this->type = $Type;
        return $this;
    }

}

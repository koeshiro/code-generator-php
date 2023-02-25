<?php
namespace CodeGenerator\Lang\Php;

use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;
use CodeGenerator\Templates\Interfaces\ValueTemplateInterface;
use CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface;

/**
 * Description of ArgumentTemplate
 *
 * @author rustamborhanov
 */
class ArgumentTemplate implements ArgumentTemplateInterface
{

    protected ?ValueTemplateInterface $value = null;

    protected ?string $name = null;

    protected ?string $type = null;
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

    public function setName(string $name): ArgumentTemplateInterface {
        $this->name = $name;
        return $this;
    }

    public function setType(string $type = ''): ArgumentTemplateInterface {
        $this->type = $type;
        return $this;
    }

    public function setValue(?ValueTemplateInterface $value): ArgumentTemplateInterface {
        $this->value = $value;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getValue(): ?ValueTemplateInterface
    {
        return $this->value;
    }

    public function getType(): string
    {
        return $this->type;
    }
    
    public function __toString() {
        return str_replace(
            "  ",
            " ",
            (
                count($this->decorators)
                    ? implode(' ',array_map(fn($p): string => (string) $p, $this->decorators)).' '
                    : ''
            )
            .$this->type
            .' $'
            .$this->name
            .(
                $this->value
                    ? ' = '. ((string) $this->value)
                    : ''
            )
        );
    }
}

<?php

 class ArgumentTemplate implements CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface
 {
     protected string $name;

     protected ?CodeGenerator\Templates\Interfaces\ValueTemplateInterface $value;

     protected string $type;

     /**
      * @var array<int,\CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface>
      */
     protected array $decorators = [];

     public function addDecorator(CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface $decorator): CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface
     {
        $this->decorators[] = $decorator;
        return $this;
     }

     public function getDecorators(): array
     {
        return $this->decorators;
     }

     public function setName(string $name): CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface
     {
         $this->name = $name;

         return $this;
     }

     public function getName(): string
     {
         return $this->name;
     }

     public function setValue(?CodeGenerator\Templates\Interfaces\ValueTemplateInterface $value): CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface
     {
         $this->value = $value;

         return $this;
     }

     public function getValue(): ?CodeGenerator\Templates\Interfaces\ValueTemplateInterface
     {
         return $this->value;
     }

     public function setType(string $type): CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface
     {
         $this->type = $type;

         return $this;
     }

     public function getType(): string
     {
         return $this->type;
     }

     public function __toString(): string
     {
        return str_replace(
            '  ',
            ' ',
            (
                count($this->decorators)
                    ? implode(' ', array_map(fn ($p): string => (string) $p, $this->decorators)).' '
                    : ''
            )
            .$this->type
            .' '
            .$this->name
            .(
                $this->value
                    ? ' = '.((string) $this->value)
                    : ''
            )
        );
     }
 }

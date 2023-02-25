<?php
namespace CodeGenerator\Templates\Interfaces\Classes\Method;

use CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface;
use CodeGenerator\Templates\Interfaces\BlockTemplateInterface;
use CodeGenerator\Templates\Interfaces\DecoratorTemplateInterface;
use CodeGenerator\Templates\Interfaces\ReturnTemplateInterface;

/**
 *
 * @author koesh
 */
interface MethodTemplateInterface extends \Stringable
{
    public function addDecorator(DecoratorTemplateInterface $decorator): self;
    public function getDecorators(): array;

    public function setName(string $Name): self;

    public function getName();


    public function addArgument(ArgumentTemplateInterface $Argument): self;

    public function getArgument(string $Name);

    public function getArguments();


    public function setBlock(BlockTemplateInterface $Block): self;

    public function getBlock();

    public function setReturnType(string $Type): self;

    public function getReturnType();

    public function setScope(string $scope): self;

    public function getScope();

    public function setStaticMode(bool $static): self;

    public function getStaticMode();

}

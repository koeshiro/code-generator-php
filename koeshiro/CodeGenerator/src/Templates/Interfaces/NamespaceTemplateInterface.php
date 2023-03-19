<?php

namespace CodeGenerator\Templates\Interfaces;

/**
 * @author koesh
 */
interface NamespaceTemplateInterface extends \Stringable
{
    public function setNamespace(string $Namespace): self;

    public function getNamespace(): string;

    public function setBlock(BlockTemplateInterface $Block): self;
}

<?php

namespace CodeGenerator\Templates\Interfaces;

interface UseTemplateInterface extends \Stringable
{
    public function getUse(): string;

    public function setUse(string $object): self;
}

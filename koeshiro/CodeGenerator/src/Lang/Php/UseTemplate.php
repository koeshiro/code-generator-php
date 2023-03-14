<?php
namespace CodeGenerator\Lang\Php;

use CodeGenerator\Templates\Interfaces\UseTemplateInterface;

class UseTemplate implements UseTemplateInterface {
    public string $object = '';
    public function getUse(): string {
        return $this->object;
    }
    public function setUse(string $object): UseTemplateInterface {
        $this->object = $object;
        return $this;
    }

    public function __toString(): string {
        return 'use '.$this->object.';';
    }
}
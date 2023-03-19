<?php

namespace CodeGenerator\Lang\Php;

use CodeGenerator\Templates\Interfaces\ReturnTemplateInterface;

/**
 * Description of ReturnTemplate
 *
 * @author rustamborhanov
 */
class ReturnTemplate implements ReturnTemplateInterface
{
    protected string|\Stringable $value = '';

    public function __toString()
    {
        return 'return '.((string) $this->value).';';
    }

    public function setReturn(\Stringable $value): ReturnTemplateInterface
    {
        $this->value = $value;

        return $this;
    }
}

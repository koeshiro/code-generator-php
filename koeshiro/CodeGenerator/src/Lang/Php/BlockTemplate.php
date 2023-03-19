<?php

namespace CodeGenerator\Lang\Php;

use CodeGenerator\Templates\Interfaces\BlockTemplateInterface;

/**
 * Description of BlockTemplate
 *
 * @author rustamborhanov
 */
class BlockTemplate implements BlockTemplateInterface
{
    /** @var array<string|\Stringable> */
    protected array $lines = [];

    // put your code here
    public function __toString()
    {
        $code = '';
        foreach ($this->lines as $line) {
            $code .= "\t".((string) $line);
        }

        return "{\n\t$code\n}";
    }

    public function addLine(string|\Stringable $Line): BlockTemplateInterface
    {
        $this->lines[] = $Line;

        return $this;
    }
}

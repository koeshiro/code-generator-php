<?php

 class BlockTemplate implements CodeGenerator\Templates\Interfaces\BlockTemplateInterface
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

    public function addLine(string|\Stringable $Line): CodeGenerator\Templates\Interfaces\BlockTemplateInterface
    {
        $this->lines[] = $Line;

        return $this;
    }
 }

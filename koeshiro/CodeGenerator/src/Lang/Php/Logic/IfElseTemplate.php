<?php

namespace CodeGenerator\Lang\Php\Logic;

use CodeGenerator\LangTemplateException;
use  CodeGenerator\Templates\Interfaces\BlockTemplateInterface;
use CodeGenerator\Templates\Interfaces\Logic\IfElseTemplateInterface;
use CodeGenerator\Templates\Interfaces\Logic\LogicBlock\LogicBlockTemplateInterface;

class IfBlokDataType
{
    public LogicBlockTemplateInterface $logic;

    public BlockTemplateInterface $block;
}

class IfElseTemplate implements IfElseTemplateInterface
{
    protected ?IfBlokDataType $if = null;

    /** @var array<IfBlokDataType> */
    protected array $ifElse = [];

    protected ?BlockTemplateInterface $else = null;

    public function setIf(LogicBlockTemplateInterface $Logic, BlockTemplateInterface $Block): self
    {
        $this->if = new IfBlokDataType();
        $this->if->logic = $Logic;
        $this->if->block = $Block;

        return $this;
    }

    public function addIfElse(LogicBlockTemplateInterface $Logic, BlockTemplateInterface $Block): self
    {
        $if = new IfBlokDataType();
        $if->logic = $Logic;
        $if->block = $Block;
        $this->ifElse[] = $if;

        return $this;
    }

    public function setElse(BlockTemplateInterface $Block): self
    {
        $this->else = $Block;

        return $this;
    }

    public function __toString()
    {
        $result = '';
        if ($this->if === null) {
            throw new LangTemplateException('if block is null', 'php', 0);
        }
        $result .= 'if ('.((string) $this->if->logic).')'.((string) $this->if->block);
        if (count($this->ifElse)) {
            foreach ($this->ifElse as $ifElse) {
                $result .= 'else if ('.((string) $ifElse->logic).')'.((string) $ifElse->block);
            }
        }
        if ($this->else) {
            $result .= ' else '.((string) $this->else);
        }

        return $result;
    }
}

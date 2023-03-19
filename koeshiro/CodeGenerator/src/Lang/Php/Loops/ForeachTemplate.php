<?php

namespace CodeGenerator\Lang\Php\Loops;

use CodeGenerator\Lang\Php\Variable\VariablesFabric;
use CodeGenerator\Lang\Php\Variable\VariableTemplate;
use CodeGenerator\LangTemplateException;
use CodeGenerator\Templates\Interfaces\BlockTemplateInterface;
use CodeGenerator\Templates\Interfaces\Loops\ForeachTemplateInterface;

/**
 * Description of ForeachTemplate
 *
 * @author rustamborhanov
 */
class ForeachTemplate implements ForeachTemplateInterface
{
    protected ?BlockTemplateInterface $block = null;

    protected ?VariableTemplate $array = null;

    protected ?string $keyName = null;

    protected ?string $valueVaraibleName = null;

    protected string $valueVariableName;

    protected VariablesFabric $variablesFabric;

    public function __construct()
    {
        $this->variablesFabric = new VariablesFabric();
    }

    public function __toString(): string
    {
        if ($this->array === null) {
            throw new LangTemplateException('Array of loop is not defined', 'php');
        }

        return 'foreach('
            .(string) $this->variablesFabric->createGetVariable()->setVariable($this->array)
            .' '
            .$this->keyName
            .' => '
            .$this->valueVariableName
            .') { '
            .(string) $this->block
            .' }';
    }

    public function setArray(VariableTemplate $Array): ForeachTemplateInterface
    {
        $this->array = $Array;

        return $this;
    }

    public function setBlock(BlockTemplateInterface $block): ForeachTemplateInterface
    {
        $this->block = $block;

        return $this;
    }

    public function setKey(string $KeyName): ForeachTemplateInterface
    {
        $this->keyName = $KeyName;

        return $this;
    }

    public function setValue(string $ValueVariableName): ForeachTemplateInterface
    {
        $this->valueVariableName = $ValueVariableName;

        return $this;
    }
}

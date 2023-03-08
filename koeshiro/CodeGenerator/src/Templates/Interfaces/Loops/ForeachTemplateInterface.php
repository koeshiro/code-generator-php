<?php
namespace CodeGenerator\Templates\Interfaces\Loops;

use CodeGenerator\Templates\Interfaces\BlockTemplateInterface;
use CodeGenerator\Lang\Php\Variable\VariableTemplate;

/**
 *
 * @author koesh
 */
interface ForeachTemplateInterface extends \Stringable
{

    public function setArray(VariableTemplate $Array): self;

    public function setKey(string $KeyName): self;

    public function setValue(string $ValueVariableName): self;

    public function setBlock(BlockTemplateInterface $Line): self;
}

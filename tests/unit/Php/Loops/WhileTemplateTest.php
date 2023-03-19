<?php

use CodeGenerator\Lang\Php\BlockTemplate;
use CodeGenerator\Lang\Php\Logic\LogicBlock\LogicBlockTemplate;
use CodeGenerator\Lang\Php\Logic\LogicBlock\LogicTemplate;
use CodeGenerator\Lang\Php\Loops\WhileTemplate;
use CodeGenerator\Lang\Php\Variable\GetTemplate;
use CodeGenerator\Lang\Php\Variable\VariableTemplate;
use PHPUnit\Framework\TestCase;

class WhileTemplateTest extends TestCase
{
    public function testWhileTemplate()
    {
        $iVariable = (new GetTemplate())->setVariable((new VariableTemplate())->setName('i'));
        $countVariable = (new GetTemplate())->setVariable((new VariableTemplate())->setName('count'));
        $whileTemplate = (new WhileTemplate())
            ->setLogic(
                (new LogicBlockTemplate())
                    ->logic(
                        (new LogicTemplate())
                            ->setLogic(
                                '<',
                                $iVariable,
                                $countVariable
                            )
                    )
            )
            ->setBlock(
                (new BlockTemplate())->addLine('$i++;')
            );
        $this->assertStringContainsString('while($i < $count)', (string) $whileTemplate);
    }
}

<?php

use CodeGenerator\Lang\Php\Logic\LogicBlock\LogicBlockTemplate;
use CodeGenerator\Lang\Php\Logic\LogicBlock\LogicTemplate;
use CodeGenerator\Lang\Php\Variable\GetTemplate;
use CodeGenerator\Lang\Php\Variable\VariableTemplate;
use PHPUnit\Framework\TestCase;

/**
 * Description of LogicBlockTemplateTest
 *
 * @author koesh
 */
class LogicBlockTemplateTest extends TestCase
{
    public function testLogickBlockTemplate()
    {
        $aVariable = (new GetTemplate())->setVariable((new VariableTemplate())->setName('a'));
        $bVariable = (new GetTemplate())->setVariable((new VariableTemplate())->setName('b'));
        $logicBlock = (new LogicBlockTemplate())->logic(
            (new LogicTemplate())->setLogic(
                '<',
                $aVariable,
                $bVariable
            )
        )->and()->logic(
            (new LogicTemplate())->setLogic(
                '>',
                $aVariable,
                $bVariable
            )
        )->or()->logic(
            (new LogicTemplate())->setLogic(
                '===',
                $aVariable,
                $bVariable
            )
        );
        $this->assertStringContainsString('>', (string) $logicBlock);
        $this->assertStringContainsString('<', (string) $logicBlock);
        $this->assertStringContainsString('&&', (string) $logicBlock);
        $this->assertStringContainsString('||', (string) $logicBlock);
        $this->assertStringContainsString('$a', (string) $logicBlock);
        $this->assertStringContainsString('$b', (string) $logicBlock);
    }
}

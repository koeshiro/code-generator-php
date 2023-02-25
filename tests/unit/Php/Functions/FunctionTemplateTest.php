<?php
use PHPUnit\Framework\TestCase;
use CodeGenerator\Lang\Php\ArgumentTemplate;
use CodeGenerator\Lang\Php\BlockTemplate;
use CodeGenerator\Lang\Php\Functions\FunctionTemplate;

class FunctionTemplateTest extends TestCase {
    public function testFunctionTemplate() {
        $functionTemplate = (new FunctionTemplate())
            ->addArgument(
                (new ArgumentTemplate())
                    ->setName('test')
                    ->setType('string')
            )->setName(
                'testFun'
            )->setReturnType(
                'string'
            )->setBlock(
                (new BlockTemplate())
                    ->addLine('return \'test\'.$test;')
            );
        $this->assertStringContainsString('function testFun(string $test): string', ((string)$functionTemplate));
        $this->assertStringContainsString('return \'test\'.$test;', ((string)$functionTemplate));
    }
}
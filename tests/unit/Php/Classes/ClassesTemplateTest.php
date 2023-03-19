<?php

use CodeGenerator\Lang\Php\ArgumentTemplate;
use CodeGenerator\Lang\Php\BlockTemplate;
use CodeGenerator\Lang\Php\Classes\ClassTemplate;
use CodeGenerator\Lang\Php\Classes\Method\MethodTemplate;
use CodeGenerator\Lang\Php\Classes\Property\PropertyTemplate;
use PHPUnit\Framework\TestCase;

class ClassesTemplateTest extends TestCase
{
    public function testClassesTemplate()
    {
        $classTemplate = (new ClassTemplate())
            ->setName('Test')
            ->addProperty(
                (new PropertyTemplate())
                    ->setName('testProp')
                    ->setScope('protected')
                    ->setType('?string')
            )->addMethod(
                (new MethodTemplate())
                    ->setScope('public')
                    ->addArgument(
                        (new ArgumentTemplate())
                            ->setName('data')
                            ->setType('string')
                    )->setName(
                        'setTestProp'
                    )->setReturnType(
                        'void'
                    )->setBlock(
                        (new BlockTemplate())
                            ->addLine('$this->testProp = $data')
                    )
            )->addMethod(
                (new MethodTemplate())
                    ->setScope('public')
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
                    )
            );
        $this->assertStringContainsString('class Test', (string) $classTemplate);
        $this->assertStringContainsString('protected ?string $testProp', (string) $classTemplate);
        $this->assertStringContainsString('public function setTestProp(string $data', (string) $classTemplate);
        $this->assertStringContainsString('$this->testProp = $data', (string) $classTemplate);
        $this->assertStringContainsString('public function testFun(string $test', (string) $classTemplate);
        $this->assertStringContainsString('return \'test\'.$test;', (string) $classTemplate);
    }
}

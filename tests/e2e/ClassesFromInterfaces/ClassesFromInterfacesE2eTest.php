<?php

use CodeGenerator\Lang\Php\BlockTemplate;
use CodeGenerator\Lang\Php\Classes\ClassesFabric;
use CodeGenerator\Lang\Php\Fabric;
use CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface;
use PHPUnit\Framework\TestCase;

class ClassesFromInterfacesE2eTest extends TestCase
{
    protected function requireObjects()
    {
        $globalFabric = new Fabric();
        $globalFabric->createArgument();
        $globalFabric->createBlock();
        $globalFabric->createClassesFabric();
        $globalFabric->createClassesFabric()->createArgument();
        $globalFabric->createClassesFabric()->createClasses();
        $globalFabric->createClassesFabric()->createImplement();
        $globalFabric->createClassesFabric()->createMethod();
        $globalFabric->createClassesFabric()->createProperty();
        $globalFabric->createClassesFabric()->createUseMethod();
        $globalFabric->createClassesFabric()->createSetPropertyValue();
        $globalFabric->createClassesFabric()->createGetPropertyValue();
        $globalFabric->createFunctionsFabric();
        $globalFabric->createFunctionsFabric()->createArgument();
        $globalFabric->createFunctionsFabric()->createFunction();
        $globalFabric->createFunctionsFabric()->createUseFunction();
        $globalFabric->createInterface();
        $globalFabric->createLoopsFabric();
        $globalFabric->createLoopsFabric()->createForeach();
        $globalFabric->createLoopsFabric()->createWhile();
        $globalFabric->createLogicFabric()->createIfElse();
        $globalFabric->createLogicFabric()->createLogic();
        $globalFabric->createLogicFabric()->createLogicBlock();
        $globalFabric->createNamespace();
        $globalFabric->createReturn();
        $globalFabric->createValue();
        $globalFabric->createVariablesFabric();
        $globalFabric->createVariablesFabric()->createVariable();
        $globalFabric->createVariablesFabric()->createGetVariable();
        $globalFabric->createVariablesFabric()->createSetVariable();
        $globalFabric->createUse();
    }

    protected function isNeedProperty(ReflectionMethod $method)
    {
        return str_contains($method->getName(), 'set');
    }

    protected function isReturnSelf(string|null $type)
    {
        return $type !== null && (string) $type === 'self';
    }

    protected function isNeedReturnProperty(ReflectionMethod $method)
    {
        return
            str_contains($method->getName(), 'get')
            && (
                $method->getDeclaringClass()->hasMethod('set'.str_replace('get', '', $method->getName()))
                | $method->getDeclaringClass()->hasMethod('add'.str_replace('get', '', $method->getName()))
            );
    }

    protected function getClassNameFromInterfaceName(string $interfaceName)
    {
        $nameItems = explode('\\', $interfaceName);

        return str_replace('Interface', '', $nameItems[count($nameItems) - 1]);
    }

    protected function createProprtyNameFromMethodName(string $name)
    {
        return lcfirst(str_replace(['get', 'set'], '', $name));
    }

    protected function createProperty(ReflectionMethod $method)
    {
        return (new ClassesFabric())->createProperty()->setName($this->createProprtyNameFromMethodName($method->getName()))->setType((string) $method->getReturnType())->setScope('protected');
    }

    protected function createArgument(ReflectionParameter $argument)
    {
        $createdArgument = (new ClassesFabric())->createArgument()->setName($argument->getName());
        $type = $argument->getType();
        if ($type !== null) {
            $createdArgument->setType((string) $type);
        }

        return $createdArgument;
    }

    protected function createMethod(ReflectionMethod $method): MethodTemplateInterface
    {
        $createdMethod = (new ClassesFabric())->createMethod()->setName($method->getName());
        $body = (new BlockTemplate());
        foreach ($method->getParameters() as $argument) {
            $createdMethod->addArgument($this->createArgument($argument));
        }
        $type = $method->getReturnType();
        if ($this->isNeedReturnProperty($method)) {
            $body->addLine('return $this->'.$this->createProprtyNameFromMethodName($method->getName()).';');
        }
        if ($this->isReturnSelf($type)) {
            $createdMethod->setReturnType($method->getDeclaringClass()->getName());
            if (
                str_contains($method->getName(), 'set')
                && count($method->getParameters())
                && $createdMethod->getArguments()[$method->getParameters()[0]->getName()] !== null
            ) {
                $body->addLine(
                    '$this->'
                    .$this->createProprtyNameFromMethodName($method->getName())
                    .' = '
                    .'$'
                    .$createdMethod->getArguments()[$method->getParameters()[0]->getName()]->getName()
                    .';'
                );
                $body->addLine("\n");
            }
            $body->addLine('return $this;');
        } elseif ($type !== null) {
            $createdMethod->setReturnType((string) $type);
        }
        $createdMethod->setBlock($body);

        return $createdMethod;
    }

    protected function createClass(string $className, string $interfaceFullName): ClassTemplateInterface
    {
        return (new ClassesFabric())->createClasses()->setName($className)->addImplementInterface($interfaceFullName);
    }

    protected function generateCodeByInterfaceReflection(ReflectionClass $interface)
    {
        $class = $this->createClass(
            $this->getClassNameFromInterfaceName($interface->getName()),
            $interface->getName()
        );
        foreach ($interface->getMethods() as $method) {
            $class->addMethod($this->createMethod($method));
            if ($this->isNeedReturnProperty($method)) {
                $class->addProperty($this->createProperty($method));
            }
        }

        return $class;
    }

    public function testClassesFromInterfacesE2e(): void
    {
        $this->requireObjects();
        $interfacesList = get_declared_interfaces();
        $interfacesToUse = [];
        $results = [];
        foreach ($interfacesList as $index => $interfaceName) {
            if (str_contains($interfaceName, 'CodeGenerator')) {
                $interfacesToUse[] = $interfaceName;
            }
        }
        foreach ($interfacesToUse as $index => $interfaceName) {
            $results[$interfaceName] = $this->generateCodeByInterfaceReflection(new ReflectionClass($interfaceName));
        }
        foreach ($results as $interfaceName => $result) {
            $this->assertStringContainsString($interfaceName, (string) $result);
            $this->assertStringContainsString('implements', (string) $result);
        }
    }
}

<?php
use CodeGenerator\Lang\Php\BlockTemplate;
use CodeGenerator\Lang\Php\Classes\ClassesFabric;
use CodeGenerator\Lang\Php\Classes\Method\MethodTemplate;
use CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface;
use CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface;
use PHPUnit\Framework\TestCase;

class ClassesFromInterfacesE2eTest extends TestCase {

    protected function requireObjects() {
        $fabric = (new ClassesFabric());
        $fabric->createArgument();
        $fabric->createClasses();
        $fabric->createImplement();
        $fabric->createMethod();
        $fabric->createProperty();
    }

    protected function isNeedProperty(ReflectionMethod $method) {
        return str_contains($method->getName(),'set');
    }

    protected function isReturnSelf(string | null $type) {
        return $type !== null && (string)$type === 'self';
    }

    protected function isNeedReturnProperty(ReflectionMethod $method) {
        return 
            str_contains($method->getName(),'get')
            && (
                $method->getDeclaringClass()->hasMethod('set'.str_replace('get', '', $method->getName()))
                | $method->getDeclaringClass()->hasMethod('add'.str_replace('get', '', $method->getName()))
            );
    }

    protected function getClassNameFromInterfaceName(string $interfaceName) {
        $nameItems = explode('\\', $interfaceName);
        return str_replace('Interface', '', $nameItems[count($nameItems) - 1]);
    }

    protected function createProperty(ReflectionMethod $method) {
        return ((new ClassesFabric())->createProperty())->setName(str_replace('get', '', $method->getName()))->setType((string)$method->getReturnType())->setScope('protected');
    }

    protected function createArgument(ReflectionParameter $argument) {
        $createdArgument = (new ClassesFabric())->createArgument()->setName($argument->getName());
        $type = $argument->getType();
        if ($type !== null) {
            $createdArgument->setType((string)$type);
        }
        return $createdArgument;
    }

    protected function createMethod(ReflectionMethod $method): MethodTemplateInterface {
        $createdMethod = (new ClassesFabric())->createMethod()->setName($method->getName());
        $body = (new BlockTemplate());
        foreach($method->getParameters() as $argument) {
            $createdMethod->addArgument($this->createArgument($argument));
        }
        $type = $method->getReturnType();
        if ($this->isNeedReturnProperty($method)) {
            $body->addLine('return $this->'.str_replace('get', '', $method->getName()).';');
        }
        if ($this->isReturnSelf($type)) {
            $createdMethod->setReturnType($method->getDeclaringClass()->getName());
            $body->addLine('return $this;');
        } else if ($type !== null) {
            $createdMethod->setReturnType((string)$type);
        }
        $createdMethod->setBlock($body);
        return $createdMethod;
    }

    protected function createClass(string $className, string $interfaceFullName): ClassTemplateInterface {
        return (new ClassesFabric())->createClasses()->setName($className)->addImplementInterface($interfaceFullName);
    }

    protected function generateCodeByInterfaceReflection(ReflectionClass $interface) {
        $class = $this->createClass(
            $this->getClassNameFromInterfaceName($interface->getName()),
            $interface->getName()
        );
        foreach($interface->getMethods() as $method) {
            $class->addMethod($this->createMethod($method));
            if ($this->isNeedReturnProperty($method)) {
                $class->addProperty($this->createProperty($method));
            }
        }
        return $class;
    }

    public function testClassesFromInterfacesE2e(): void {
        $this->requireObjects();
        $interfacesList = get_declared_interfaces();
        $interfacesToUse = [];
        $results = [];
        foreach($interfacesList as $index => $interfaceName) {
            if (str_contains($interfaceName, 'CodeGenerator')) {
                $interfacesToUse[] = $interfaceName;
            }
        }
        foreach($interfacesToUse as $index => $interfaceName) {
            $results[]=$this->generateCodeByInterfaceReflection(new ReflectionClass($interfaceName));
        }
        foreach($results as $result) {
            $this->assertStringContainsString('implements', (string) $result);
        }
    }
}
<?php
use CodeGenerator\Lang\Php\ArgumentTemplate;
use CodeGenerator\Lang\Php\BlockTemplate;
use CodeGenerator\Lang\Php\Classes\ClassTemplate;
use CodeGenerator\Lang\Php\Classes\Method\MethodTemplate;
use CodeGenerator\Lang\Php\DecoratorTemplate;
use CodeGenerator\Lang\Php\ValueTemplate;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Yaml\Yaml;


class SwaggerE2eTest extends TestCase {
    protected function controllerMethodNameByUrl(string $url, string $method) {
        $methodName = '';
        if ($url !== '/') {
            $patrsOfUrl = array_values(
                array_map(
                    function($part) {
                        if (str_contains($part,"{")) {
                            return str_replace("{","",str_replace("}","",$part));
                        }
                        return $part;
                    },
                    array_filter(
                        explode("/",$url),
                        fn($part) => $part !== ''
                    )
                )
            );
            $methodName = $patrsOfUrl[count($patrsOfUrl)-1];
        } 
        if ($methodName === '') {
            $methodName = 'index';
        }
        return $methodName.ucwords($method);
    }
    protected function controllerNameByUrl(string $url) {
        $controllerName = '';
        $patrsOfUrl = array_filter(explode("/",$url),fn($part) => !str_contains($part,"{"));
        if ($url !== '/') {
            foreach($patrsOfUrl as $part) {
                $controllerName .= ucwords($part);
            }
        } 
        if ($controllerName === '') {
            $controllerName = 'Index';
        }
        return $controllerName;
    }
    protected function groupPathsByUrlCore(array $paths) {
        $group = [];
        foreach($paths as $path => $pathSettings) {
            $patrsOfUrl = array_values(array_filter(explode("/",$path),fn($part) => $part !== ''));
            $patrsOfUrl = count($patrsOfUrl) > 1 ? array_slice($patrsOfUrl,0, count($patrsOfUrl)-1) : $patrsOfUrl;
            $groupName = implode("/",$patrsOfUrl);
            $group[$groupName][] = [
                'path' => $path,
                'settings' => $pathSettings,
            ];
        }
        return $group;
    }
    protected function createController(string $name): ClassTemplate {
        return (new ClassTemplate())->setName($name.'Controller');
    }
    /**
     * @param string $url
     * @param string $httpMethod
     * @param array<{name:string;required:boolean;in:string;type:string}> $parameters
     * @return CodeGenerator\Templates\Interfaces\Classes\Method\MethodTemplateInterface
     */
    protected function createControllerMethod(string $url, string $httpMethod, array $parameters): MethodTemplate {
        $methodName = $this->controllerMethodNameByUrl($url, $httpMethod);
        $method = (new MethodTemplate())
            ->setName($methodName)
            ->addDecorator(
                (new DecoratorTemplate())
                    ->setName('Route')
                    ->addArgumentValue((new ValueTemplate())->setValue($url))
            )
            ->setScope('public')
            ->setReturnType('Response')
            ->setBlock(new BlockTemplate());
        foreach($parameters as $paramName => $param) {
            $method->addArgument(
                (new ArgumentTemplate())
                    ->setName($param['name'])
                    ->setType($param['type'])
            );
        }
        return $method;
    }
    protected function getSwaggerFileData() {
        return Yaml::parseFile(__DIR__ . '/swagger.yml');
    }
    public function testSwaggerE2e() {
        $data = ($this->getSwaggerFileData())['paths'];
        $groups = $this->groupPathsByUrlCore($data);
        $controllers = [];
        foreach($groups as $groupName => $group) {
            $controller = $this->createController($this->controllerNameByUrl($groupName));
            foreach($group as $data) {
                foreach($data['settings'] as $methods => $settings) {
                    $controller->addMethod($this->createControllerMethod($data['path'],$methods,$settings['parameters']??[]));
                }
            }
            $controllers[]=$controller;
        }
        $result = implode("\n",array_map(fn($c)=>(string)$c,$controllers));
        $this->assertStringContainsString('UsersController', $result);
        $this->assertStringContainsString('#[Route("/users")]', $result);
        $this->assertStringContainsString('public function usersGet():Response', $result);
        $this->assertStringContainsString('public function idGet(number $id):Response', $result);
    }
}
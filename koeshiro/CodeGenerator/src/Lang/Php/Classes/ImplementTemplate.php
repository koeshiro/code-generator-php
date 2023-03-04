<?php
namespace CodeGenerator\Lang\Php\Classes;

use CodeGenerator\Templates\Interfaces\Classes\ImplementTemplateInterface;
use \CodeGenerator\Templates\Interfaces\Classes\ClassTemplateInterface;

/**
 * Description of ImplementTemplate
 *
 * @author koesh
 */
class ImplementTemplate implements ImplementTemplateInterface
{

    protected $arguments = [];

    protected ?ClassTemplateInterface $class = null;
    
    public function __toString()
    {
        $arguments = implode(",",array_map(fn($p):string=>(string)$p,$this->arguments));
        return "new {$this->class->getName()}($arguments)";
    }

    public function addArgument(\CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface $Argument): ImplementTemplateInterface {
        $this->arguments[] = $Argument;
        return $this;
    }

    public function setClass(string | ClassTemplateInterface $Class): ImplementTemplateInterface {
        if (is_string($Class) || $Class instanceof ClassTemplateInterface) {
            $this->class = $Class;
        } else {
            throw new \CodeGenerator\LangTemplateException("\$Class is not valid. Class mast by string or implement ClassTemplateInterface", "Php");
        }
        return $this;
    }
}

<?php
namespace CodeGenerator\Lang\Php;

use CodeGenerator\Templates\Interfaces\FabricInterface;

/**
 * Description of Factory
 *
 * @author rustamborhanov
 */
class Fabric implements FabricInterface
{

    // put your code here
    public function createArgument(): \CodeGenerator\Templates\Interfaces\ArgumentTemplateInterface {
        return new ArgumentTemplate();
    }

    public function createBlock(): \CodeGenerator\Templates\Interfaces\BlockTemplateInterface {
        return new BlockTemplate();
    }

    public function createClassesFabric(): \CodeGenerator\Templates\Interfaces\Classes\ClassesFabricInterface {
        return new Classes\ClassesFabric();
    }

    public function createFunctionsFabric(): \CodeGenerator\Templates\Interfaces\Functions\FunctionsFabricInterface {
        return new Functions\FunctionsFabric();
    }

    public function createInterface(): \CodeGenerator\Templates\Interfaces\InterfaceTemplateInterface {
        return new InterfaceTemplate();
    }

    public function createLoopsFabric(): \CodeGenerator\Templates\Interfaces\Loops\LoopsFabricInterface {
        return new Loops\LoopsFabric();
    }

    public function createNamespace(): \CodeGenerator\Templates\Interfaces\NamespaceTemplateInterface {
        return new NamespaceTemplate();
    }

    public function createReturn(): \CodeGenerator\Templates\Interfaces\ReturnTemplateInterface {
        return new ReturnTemplate();
    }

    public function createValue(): \CodeGenerator\Templates\Interfaces\ValueTemplateInterface {
        return new ValueTemplate();
    }

    public function createVariablesFabric(): \CodeGenerator\Templates\Interfaces\Variable\VariablesFabricInterface {
        return new Variable\VariablesFabric();
    }

    public function createUse(): \CodeGenerator\Templates\Interfaces\UseTemplateInterface {
        return new UseTemplate();
    }

}

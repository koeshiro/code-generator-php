<?php
namespace CodeGenerator\Lang\Php\Variable;

use CodeGenerator\Templates\Interfaces\Variable\VariablesFabricInterface;
use CodeGenerator\Templates\Interfaces\Variable\GetTemplateInterface;
use CodeGenerator\Templates\Interfaces\Variable\SetTemplateInterface;
use CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface;

use CodeGenerator\Lang\Php\Variable\VariableTemplate;
use CodeGenerator\Lang\Php\Variable\SetTemplate;
use CodeGenerator\Lang\Php\Variable\GetTemplate;

/**
 * Description of VariablesFabric
 *
 * @author rustamborhanov
 */
class VariablesFabric implements VariablesFabricInterface
{
    public function createGetVariable(): GetTemplateInterface {
        return new GetTemplate();
    }

    public function createSetVariable(): SetTemplateInterface {
        return new SetTemplate();
    }

    public function createVariable(): VariableTemplateInterface {
        return new VariableTemplate();
    }
}

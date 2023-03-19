<?php

namespace CodeGenerator\Lang\Php\Variable;

use CodeGenerator\Templates\Interfaces\Variable\GetTemplateInterface;
use CodeGenerator\Templates\Interfaces\Variable\SetTemplateInterface;
use CodeGenerator\Templates\Interfaces\Variable\VariablesFabricInterface;
use CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface;

/**
 * Description of VariablesFabric
 *
 * @author rustamborhanov
 */
class VariablesFabric implements VariablesFabricInterface
{
    public function createGetVariable(): GetTemplateInterface
    {
        return new GetTemplate();
    }

    public function createSetVariable(): SetTemplateInterface
    {
        return new SetTemplate();
    }

    public function createVariable(): VariableTemplateInterface
    {
        return new VariableTemplate();
    }
}

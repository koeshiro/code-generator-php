<?php
namespace CodeGenerator\Templates\Interfaces\Variable;

use CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface;
use CodeGenerator\Templates\Interfaces\Variable\GetTemplateInterface;
use CodeGenerator\Templates\Interfaces\Variable\SetTemplateInterface;

/**
 *
 * @author rustamborhanov
 */
interface VariablesFabricInterface
{

    public function createVariable(): VariableTemplateInterface;

    public function createGetVariable(): GetTemplateInterface;

    public function createSetVariable(): SetTemplateInterface;
}

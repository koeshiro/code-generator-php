<?php

namespace CodeGenerator\Templates\Interfaces\Variable;

/**
 * @author rustamborhanov
 */
interface VariablesFabricInterface
{
    public function createVariable(): VariableTemplateInterface;

    public function createGetVariable(): GetTemplateInterface;

    public function createSetVariable(): SetTemplateInterface;
}

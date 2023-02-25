<?php
namespace CodeGenerator\Lang\Php\Variable;

use CodeGenerator\Templates\Interfaces\Variable\GetTemplateInterface;
use CodeGenerator\Templates\Interfaces\Variable\VariableTemplateInterface;

/**
 * Description of GetTemplate
 *
 * @author rustamborhanov
 */
class GetTemplate implements GetTemplateInterface {
    protected ?VariableTemplateInterface $variable = null;
    public function setVariable(VariableTemplateInterface $Variable): GetTemplateInterface {
        $this->variable = $Variable;
        return $this;
    }

    public function __toString():string {
        return '$' . $this->variable->getName();
    }
}

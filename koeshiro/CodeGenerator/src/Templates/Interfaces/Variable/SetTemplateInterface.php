<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace CodeGenerator\Templates\Interfaces\Variable;

/**
 *
 * @author rustamborhanov
 */
interface SetTemplateInterface extends \Stringable
{

    public function setVariable(VariableTemplateInterface $Variable): self;

    public function setValue(ValueTemplateInterface $Value = null): self;
}

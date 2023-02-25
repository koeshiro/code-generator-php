<?php
namespace CodeGenerator\Lang\Php;

use CodeGenerator\Templates\Interfaces\NamespaceTemplateInterface;
use CodeGenerator\Templates\Interfaces\BlockTemplateInterface;

/**
 * Description of NamespaceTemplateI
 *
 * @author rustamborhanov
 */
class NamespaceTemplate implements NamespaceTemplateInterface
{

    protected string $namespace;

    protected ?BlockTemplateInterface $block = null;

    // put your code here
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    public function setBlock(BlockTemplateInterface $Block): NamespaceTemplateInterface {
        $this->block = $Block;
        return $this;
    }

    public function setNamespace(string $Namespace): NamespaceTemplateInterface {
        $this->namespace = $Namespace;
        return $this;
    }

    public function __toString()
    {
        return "namespace $this->namespace; " . ((string) $this->block);
    }
}

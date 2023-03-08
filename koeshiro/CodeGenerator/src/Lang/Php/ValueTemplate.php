<?php
namespace CodeGenerator\Lang\Php;

use CodeGenerator\LangTemplateException;
use CodeGenerator\Templates\Interfaces\ValueTemplateInterface;

/**
 * Description of ValueTemplate
 *
 * @author rustamborhanov
 */
class ValueTemplate implements ValueTemplateInterface
{

    protected mixed $value;

    protected function isAllowedToSerialize(mixed $value): bool
    {
        $type = gettype($value);
        if($type === "boolean" || $type === "integer" || $type === "double" || ($type === "object" && $value instanceof \Serializable)) {
            return true;
        } else {
            return false;
        }
    }
    /**
     * @param array<int,mixed> $array
     */
    protected function isAllowedToSerializeArray(array $array): bool
    {
        foreach ($array as $item) {
            if (! $this->isAllowedToSerialize($item)) {
                return false;
            }
        }
        return true;
    }

    public function __toString() {
        $type = gettype($this->value);
        switch ($type) {
            case "boolean":
                $prepearedValue = (string) $this->value;
                break;
            case "integer":
                $prepearedValue = (string) $this->value;
                break;
            case "double":
                $prepearedValue = (string) $this->value;
                break;
            case "string":
                $prepearedValue = '"'.$this->value.'"';
                break;
            case "array":
                if ($this->isAllowedToSerializeArray($this->value)) {
                    $prepearedValue = 'unserialize(' . serialize($this->value) . ')';
                } else {
                    throw new LangTemplateException("Array is not serializable", __NAMESPACE__);
                }
                break;
            case "object":
                if ($this->isAllowedToSerialize($this->value)) {
                    $prepearedValue = 'unserialize(' . serialize($this->value) . ')';
                } else {
                    throw new LangTemplateException("Object is not serializable", __NAMESPACE__);
                }
                break;
            case "resource":
                throw new LangTemplateException("Resource is not serializable", __NAMESPACE__);
            case "resource (closed)":
                throw new LangTemplateException("Resource (closed) is not serializable", __NAMESPACE__);
            case "NULL":
                $prepearedValue = "null";
                break;
            default:
                throw new LangTemplateException("Type is undefined", __NAMESPACE__);
        }
        return $prepearedValue;
    }

    public function getValue(): \Stringable | string
    {
        return $this->value;
    }

    public function setValue(mixed $Value): ValueTemplateInterface {
        $this->value = $Value;
        return $this;
    }
}

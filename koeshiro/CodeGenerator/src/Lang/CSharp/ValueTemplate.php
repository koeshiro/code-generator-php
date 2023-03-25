<?php

use CodeGenerator\LangTemplateException;
 class ValueTemplate implements CodeGenerator\Templates\Interfaces\ValueTemplateInterface
 {
     protected mixed $value;

     public function setValue(mixed $Value): CodeGenerator\Templates\Interfaces\ValueTemplateInterface
     {
         $this->value = $Value;

         return $this;
     }

     public function getValue(): mixed
     {
         return $this->value;
     }

     public function __toString(): string
     {
        $type = gettype($this->value);
        $prepearedValue = '';
        switch ($type) {
            case 'boolean':
                $prepearedValue = (string) $this->value;
                break;
            case 'integer':
                $prepearedValue = (string) $this->value;
                break;
            case 'double':
                $prepearedValue = (string) $this->value;
                break;
            case 'string':
                $prepearedValue = "'".$this->value."'";
            case 'NULL':
                $prepearedValue = 'null';
                break;
            default:
                throw new LangTemplateException('Type is undefined', __NAMESPACE__);
        }

        return $prepearedValue;
     }
 }

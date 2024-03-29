<?php

namespace CodeGenerator\Interfaces;

/**
 * @author koesh
 */
interface LangTemplateExceptionInterface
{
    public function __construct(string $message = '', string $lang = 'php', int $code = 0, \Throwable $previous = null);

    public function getLang(): string;
}

<?php
namespace CodeGenerator;

/**
 * Description of LangFactory
 *
 * @author koesh
 */
class LangTemplateException extends \Exception implements Interfaces\LangTemplateExceptionInterface
{

    protected $lang = null;

    public function __construct(string $message = "", string $lang = "php", int $code = 0, \Throwable $previous = NULL)
    {
        $this->lang = $lang;
        parent::__construct($message, $code, $previous);
    }

    public function getLang()
    {
        return $this->lang;
    }
}

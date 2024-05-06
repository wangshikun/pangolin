<?php
namespace pangolin\sdk\http;

/**
 * Pop接口调用的异常类
 */
class PopHttpException extends \Exception
{
    public function errorMessage(): string
	{
        return $this->getMessage();
    }
}
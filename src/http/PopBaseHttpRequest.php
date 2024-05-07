<?php
namespace pangolin\sdk\http;

/**
 * Pop request类
 */
abstract class PopBaseHttpRequest
{

    public function __construct()
    {
    }

    public abstract function getType();


    public final function getParamsMap(): array
	{
        $this->setUserParams($paramsMap);
        return $paramsMap;
    }


    protected abstract function setUserParams(&$var);

    protected final function setUserParam(&$paramMap, $name, $param)
    {

        if (!is_null($param)&&$param !== "") {
            if ($this->isPrimaryType($param)) {
                $paramMap[$name] = $param;
            } else {
                $paramMap[$name] = json_encode($param);
            }
        }
    }

    private function isPrimaryType($param): bool
	{
        if (is_bool($param)) {
            return true;
        } else if (is_integer($param)) {
            return true;
        } else if (is_long($param)) {
            return true;
        } else if (is_float($param)) {
            return true;
        } else if (is_double($param)) {
            return true;
        } else if (is_numeric($param)) {
            return true;
        }else if(is_array($param)){
			return true;
		} else {
            return is_string($param);
        }
    }
}
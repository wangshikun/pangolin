<?php
namespace pangolin\sdk\http;

/**
 * Pop接口调用的客户端类
 */
class PopHttpClient
{

	private string $apiServerUrl = "https://1ecom.pangolin-sdk-toutiao.com/";//接口域名

	private string $app_id='';//在穿山甲媒体平台上注册的应用id

	private int $timestamp;//秒时间戳，和服务器时间相差超过10分钟会报错。
    /**
     * SDK版本号
     */
    private static string $version="1";//API协议版本，当前支持"1"。若不传，默认为"1"
    /**
     * 接口超时时间
     */
    private static string $SECONDS = "30";
	private static string $sign_type="MD5";

	private string $secure_key='';//密钥
	private string $req_id='';//唯一id，方便问题排查。如果没有自己的生成规则，推荐按照UUID
    /**
     * 构造函数
     * @param string $app_id 开放平台分配的clientId
     * @param string $secure_key 开放平台分配的clientSecret
     */
    public function  __construct(string $app_id, string $secure_key){
        $this->app_id = $app_id;
        $this->secure_key = $secure_key;
		$this->timestamp=time();
		$this->req_id=uniqid();
    }


	/**
	 * 接口调用函数
	 * @param mixed $request 是 Array 类型，里面包含API接口名称type（必填）、data_type（返回数据格式选填）和接口其他参数
	 * @param string $access_token 表示调用接口的授权码
	 * @return PopHttpResponse
	 * @throws PopHttpException
	 */
    public function syncInvoke($request, string $access_token = ""): PopHttpResponse
	{
		$data=$request->getParamsMap();
		$data=json_encode($data,JSON_UNESCAPED_UNICODE);
		$this->setUrl($request);
		$params['app_id']=$this->app_id;
		$params['timestamp']=$this->timestamp;
		$params['sign_type']=self::$sign_type;
		$params['req_id']=$this->req_id;
        $params['sign'] = $this->makeSign($data);
		$params['data']=$data;
		return $this->postCurl($params);
    }

	private function setUrl($request){
		$this->apiServerUrl.=$request->getType();
	}

	/**
	 * @return string 返回md5后的sign值
	 */
    private function makeSign($data): string
	{
		$str = "app_id=".$this->app_id."&data=".$data."&req_id=".$this->req_id."&timestamp=".$this->timestamp.$this->secure_key;
		return md5($str);
    }

	/**
	 * @throws PopHttpException
	 */
	private function postCurl($params): PopHttpResponse
	{
        $ch = curl_init();
		//设定 cURL 会话的超时时间
        curl_setopt($ch, CURLOPT_TIMEOUT, self::$SECONDS);
		//ssl验证
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch,CURLOPT_SSL_VERIFYHOST,0);//严格校验
		//设置 URL
        curl_setopt($ch,CURLOPT_URL, $this->apiServerUrl);
        //设置header
        curl_setopt($ch, CURLOPT_HEADER,false);
        //设置header
        $headers = array("Content-Type: application/json");
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        //要求结果为字符串且输出到屏幕上
		//post提交方式
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
        //运行curl
        $raw_response = curl_exec($ch);
        $status_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        //返回结果
        if($raw_response){
            curl_close($ch);
            $response = new PopHttpResponse();
            $response->setStatusCode($status_code);
            $response->setBody($raw_response);
            return $response;
        } else {
            $error = curl_errno($ch);
            curl_close($ch);
            throw new PopHttpException("curl出错，错误码:$error");
        }
    }

}
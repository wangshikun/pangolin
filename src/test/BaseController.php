<?php
	/**
	 * Created by:
	 * User: wangs
	 * Date: 2024/5/7
	 */
	declare (strict_types=1);

	use pangolin\sdk\http\PopHttpClient;

	require __DIR__ . '/../../vendor/autoload.php';
	$client=getPddClient();
	$request=new \pangolin\sdk\api\ProductLinkRequest();
	$url='https://haohuo.jinritemai.com/ecommerce/trade/detail/index.html?id=3559684471093625316&origin_type=open_platform';
	$request->setProductUrl($url);
	$request->setExternalInfo('uid1_pid2');
	$request->setShareType([1,3,5]);
	$res=$client->syncInvoke($request);
	var_dump($res);
	exit;



	 function getPddClient()
	{
	$client_id ='5527918';
	$client_secret = '88bd0a1628d76c2a256eb67efd51c195';
	return new PopHttpClient( $client_id, $client_secret);
	}
<?php
	/**
	 * 抖口令解析+二次转链接口
	 * Created by:
	 * User: wangs
	 * Date: 2024/5/7
	 * 给外部媒体提供通过抖音的商品分享口令和直播间分享口令反解析商品id和直播间id的能力。
	 * 媒体拿到商品id 和直播间id后，
	 * 可分别调用商品详情接口和直播间详情接口获取商品信息和直播间信息。
	 * 然后使用商品信息和直播间信息去分别调用商品转链接口和直播间转链接口，
	 * 用户在通过媒体自身的转链产生订单后，媒体可获得佣金收入。
	 */
	declare (strict_types=1);

	namespace pangolin\sdk\api;

	use pangolin\sdk\http\PopBaseHttpRequest;

	class CommandParseRequest extends PopBaseHttpRequest
	{
		private ?string $command=null;

		private ?string $external_info=null;
		private ?int $platform=null;
		private ?array $share_type=null;

		public function getType(): string
		{
			// TODO: Implement getType() method.
			return "/command_parse";
		}

		public function setUserParams(&$var)
		{
			// TODO: Implement setUserParams() method.
			$this->setUserParam($var,'command',$this->command);
			$this->setUserParam($var,'external_info',$this->external_info);
			$this->setUserParam($var,'platform',$this->platform);
			$this->setUserParam($var,'share_type',$this->share_type);
		}


		public function setCommand($command){
			$this->command=$command;
		}


		public function setExternalInfo($external_info){
			$this->external_info=$external_info;
		}

		public function setPlatform($platform){
			$this->platform=$platform;
		}
	}
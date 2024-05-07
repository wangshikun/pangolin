<?php
	/**
	 * 3.2.2 商品转链接口
	 * Created by:
	 * User: wangs
	 * Date: 2024/5/7
	 */
	declare (strict_types=1);

	namespace pangolin\sdk\api;

	use pangolin\sdk\http\PopBaseHttpRequest;

	class ProductLinkRequest extends PopBaseHttpRequest
	{
		private string $product_url='';

		private string $product_ext='';

		private string $external_info='';

		private ?array $share_type=null;

		private ?int $platform=null;
		private ?bool $use_coupon=null;



		/**
		 * @return string
		 */
		public function getType(): string
		{
			return "/product/link";
		}

		/**
		 * @param $var
		 * @return void
		 */
		protected function setUserParams(&$var)
		{

			$this->setUserParam($var,'product_url',$this->product_url);
			$this->setUserParam($var,'product_ext',$this->product_ext);
			$this->setUserParam($var,'external_info',$this->external_info);
			$this->setUserParam($var,'share_type',$this->share_type);
			$this->setUserParam($var,'platform',$this->platform);
			$this->setUserParam($var,'use_coupon',$this->use_coupon);
		}

		//商品url。与商品接口detail_url一致
		public function setProductUrl($product_url){
			$this->product_url=$product_url;
		}

		//商品搜索接口返回的product.ext 字段, 尽量填写
		public function setProductExt($product_ext){
			$this->product_ext=$product_ext;
		}

		//媒体传递扩展参数的字段， 字符只允许字母大小写、数字、下划线，长度不超过40
		public function setExternalInfo($external_info){
			$this->external_info=$external_info;
		}

		//转链类型
		public function setShareType($share_type){
			$this->share_type=$share_type;
		}

		//0：抖音，1：抖极，不传默认为0
		public function setPlatform($platform){
			$this->platform=$platform;
		}

		//是否返回商品惠后价领券链接(如果商品有优惠则返回，否则不返回)
		public function setUseCoupon($use_coupon){
			$this->use_coupon=$use_coupon;
		}



	}
<?php
	/**
	 * 抖客商品专属券查询，只能查询抖客专属券，不返回商品的通用券
	 * Created by:
	 * User: wangs
	 * Date: 2024/5/7
	 */
	declare (strict_types=1);

	namespace pangolin\sdk\api;

	use pangolin\sdk\http\PopBaseHttpRequest;

	class ProductExclusiveCouponRequest extends PopBaseHttpRequest
	{
		private ?string $product_url=null;

		public function getType()
		{
			// TODO: Implement getType() method.
			return "/product/exclusive_coupon";
		}

		public function setUserParams(&$var)
		{
			// TODO: Implement setUserParams() method.
			$this->setUserParam($var,'product_url',$this->product_url);
		}

		public function setProductUrl($product_url){
			$this->product_url=$product_url;
		}
	}
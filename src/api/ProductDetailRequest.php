<?php
	/**
	 * 获取某些商品的详细信息
	 * Created by:
	 * User: wangs
	 * Date: 2024/5/7
	 */
	declare (strict_types=1);

	namespace pangolin\sdk\api;

	use pangolin\sdk\http\PopBaseHttpRequest;

	class ProductDetailRequest extends PopBaseHttpRequest
	{
		private ?array $product_ids=null;

		/**
		 * @return string
		 */
		public function getType(): string
		{
			return "product/detail";
		}

		/**
		 * @param $var
		 * @return void
		 */
		protected function setUserParams(&$var)
		{
			$this->setUserParam($var,'product_ids',$this->product_ids);
		}

		public function setProductIds($product_ids){
			$this->product_ids=$product_ids;
		}

	}
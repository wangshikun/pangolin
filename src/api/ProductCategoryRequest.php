<?php
	/**
	 * 类目借口
	 * Created by:
	 * User: wangs
	 * Date: 2024/5/7
	 */
	declare (strict_types=1);

	namespace pangolin\sdk\api;

	use pangolin\sdk\http\PopBaseHttpRequest;

	class ProductCategoryRequest extends PopBaseHttpRequest
	{

		private ?int $parent_id=null;

		public function getType(): string
		{
			// TODO: Implement getType() method.
			return '/product/category';
		}

		public function setUserParams(&$var)
		{
			// TODO: Implement setUserParams() method.
			$this->setUserParam($var,'parent_id',$this->parent_id);
		}


		public function setParentId($parent_id){
			$this->parent_id=$parent_id;
		}


	}
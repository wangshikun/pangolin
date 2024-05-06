<?php
	/**
	 * Created by:
	 * User: wangs
	 * Date: 2024/4/23
	 */
	declare (strict_types=1);

	namespace pangolin\sdk\api;

	use src\http\PopBaseHttpRequest;

	class ProductSearchRequest extends PopBaseHttpRequest
	{

		/**
		 * @JsonProperty(Integer, "page")
		 */
		private int $page=0;//商品第几页，从1开始
		/**
		 * @JsonProperty(Integer, "page_size")
		 */
		private int $page_size=20;//商品每页数量，最大20，最小1
		/**
		 * 商品关键词
		 * @var string
		 */
		private string $title;//商品关键词


		public function __construct(){

		}

		/**
		 * @return string
		 */
		public function getType(): string
		{
			return "product/search";
		}


		/**
		 * @param $params
		 * @return void
		 */
		protected function setUserParams(&$params)
		{
			$this->setUserParam($params, "page", $this->page);
			$this->setUserParam($params, "page_size", $this->page_size);
		}

		public function setPage($page){
			$this->page=$page;
		}

		public function setPageSize($page_size){
			$this->page_size=$page_size;
		}

		//设置标题

	}
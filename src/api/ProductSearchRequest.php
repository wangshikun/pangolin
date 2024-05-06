<?php
	/**
	 * Created by:
	 * User: wangs
	 * Date: 2024/4/23
	 */
	declare (strict_types=1);

	namespace pangolin\sdk\api;


	use pangolin\sdk\http\PopBaseHttpRequest;

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
		private ?array $first_cids = null;
		private ?array $second_cids = null;
		private ?array $third_cids = null;
		private ?int $price_min = null;
		private ?int $price_max = null;
		private ?int $sell_num_min = null;
		private ?int $sell_num_max = null;
		private ?int $search_type = null;
		private ?int $order_type = null;
		private ?int $cos_fee_min = null;
		private ?int $cos_fee_max = null;
		private ?int $cos_ratio_min = null;
		private ?int $cos_ratio_max = null;
		private ?int $activity_id = null;



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
			$this->setUserParam($params, "title", $this->title);
			$this->setUserParam($params, "first_cids", $this->first_cids);
			$this->setUserParam($params, "second_cids", $this->second_cids);
			$this->setUserParam($params, "third_cids", $this->third_cids);
			$this->setUserParam($params, "price_min", $this->price_min);
			$this->setUserParam($params, "price_max", $this->price_max);
			$this->setUserParam($params, "sell_num_min", $this->sell_num_min);
			$this->setUserParam($params, "sell_num_max", $this->sell_num_max);
			$this->setUserParam($params, "search_type", $this->search_type);
			$this->setUserParam($params, "order_type", $this->order_type);
			$this->setUserParam($params, "cos_fee_min", $this->cos_fee_min);
			$this->setUserParam($params, "cos_fee_max", $this->cos_fee_max);
			$this->setUserParam($params, "cos_ratio_min", $this->cos_ratio_min);
			$this->setUserParam($params, "cos_ratio_max", $this->cos_ratio_max);
			$this->setUserParam($params, "activity_id", $this->activity_id);
		}

		//设置商品第几页 从1开始
		public function setPage($page){
			$this->page=$page;
		}

		//商品每页的数量 最大20 最小1
		public function setPageSize($page_size){
			$this->page_size=$page_size;
		}

		//商品关键词
		public function setTitle($title){
			$this->title=$title;
		}

		//筛选商品一级类目，从商品类目接口可获得一级类目
		public function setFirstCids($first_cids){
			$this->first_cids=$first_cids;
		}

		public function setSecondCids(?array $second_cids): void
		{
			$this->second_cids = $second_cids;
		}

		public function setThirdCids(?array $third_cids): void
		{
			$this->third_cids = $third_cids;
		}

		public function setPriceMin(?int $price_min): void
		{
			$this->price_min = $price_min;
		}

		public function setPriceMax(?int $price_max): void
		{
			$this->price_max = $price_max;
		}

		public function setSellNumMin(?int $sell_num_min): void
		{
			$this->sell_num_min = $sell_num_min;
		}

		public function setSellNumMax(?int $sell_num_max): void
		{
			$this->sell_num_max = $sell_num_max;
		}

		public function setSearchType(?int $search_type): void
		{
			$this->search_type = $search_type;
		}

		public function setOrderType(?int $order_type): void
		{
			$this->order_type = $order_type;
		}

		public function setCosFeeMin(?int $cos_fee_min): void
		{
			$this->cos_fee_min = $cos_fee_min;
		}

		public function setCosFeeMax(?int $cos_fee_max): void
		{
			$this->cos_fee_max = $cos_fee_max;
		}

		public function setCosRatioMin(?int $cos_ratio_min): void
		{
			$this->cos_ratio_min = $cos_ratio_min;
		}

		public function setCosRatioMax(?int $cos_ratio_max): void
		{
			$this->cos_ratio_max = $cos_ratio_max;
		}

		public function setActivityId(?int $activity_id): void
		{
			$this->activity_id = $activity_id;
		}



	}
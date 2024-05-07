<?php
	/**
	 * Created by:
	 * User: wangs
	 * Date: 2024/5/7
	 */
	declare (strict_types=1);

	namespace pangolin\sdk\api;

	use pangolin\sdk\http\PopBaseHttpRequest;

	class RewardOrdersRequest extends PopBaseHttpRequest
	{
		private ?int $page=null;
		private ?int $page_size=null;
		private ?string $start_date=null;
		private ?string $end_date=null;
		/**
		 * @var int|null
		 * 默认全部，0:全部 1:商品分销 2: 直播间分销 3: mix自建活动页分销 4:频道页分销 99:其他
		 */
		private ?int $distribution_type;

		public function getType(): string
		{
			// TODO: Implement getType() method.
			return '/reward_orders';
		}

		public function setUserParams(&$var)
		{
			// TODO: Implement setUserParams() method.
			$this->setUserParam($var,'page',$this->page);
			$this->setUserParam($var,'page_size',$this->page_size);
			$this->setUserParam($var,'start_date',$this->start_date);
			$this->setUserParam($var,'end_date',$this->end_date);
			$this->setUserParam($var,'distribution_type',$this->distribution_type);
		}

		public function setPage($page){
			$this->page=$page;
		}

		public function setPageSize($page_size){
			$this->page_size=$page_size;
		}

		public function setStartDate($start_date){
			$this->start_date=$start_date;
		}

		public function setEndDate($end_date){
			$this->end_date=$end_date;
		}

		public function setDistributionType($distribution_type){
			$this->distribution_type=$distribution_type;
		}

	}
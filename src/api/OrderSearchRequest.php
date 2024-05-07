<?php
	/**
	 * 查询某个应用下通过商品转链和直播间转链产生的订单
	 * Created by:
	 * User: wangs
	 * Date: 2024/5/7
	 */
	declare (strict_types=1);

	namespace pangolin\sdk\api;

	use pangolin\sdk\http\PopBaseHttpRequest;

	class OrderSearchRequest extends PopBaseHttpRequest
	{
		private ?int $size=null;//此次请求拉取数量[1,50]

		private ?string $cursor=null;//游标

		private ?int $start_time=null;//支付的开始时间

		private ?int $end_time=null;//结束时间

		/**
		 * @var string|null
		 * pay-按照支付时间查询特定时间范围内的订单
		 * update-按照订单更新时间查询特定时间范围内的订单
		 */
		private ?string $time_type=null;
		private ?string $order_ids=null;//订单号
		/**
		 * @var int|null
		 * 1-商品分销订单，
		 * 2-直播间分销订单
		 * 3-活动类型订单
		 */
		private ?int $order_type=null;
		private ?int $access_type=null;

		public function getType()
		{
			// TODO: Implement getType() method.
			return '/order/search';
		}

		public function setUserParams(&$var)
		{
			// TODO: Implement setUserParams() method.
			$this->setUserParam($var,'size',$this->size);
			$this->setUserParam($var,'cursor',$this->cursor);
			$this->setUserParam($var,'start_time',$this->start_time);
			$this->setUserParam($var,'end_time',$this->end_time);
			$this->setUserParam($var,'time_type',$this->time_type);
			$this->setUserParam($var,'order_ids',$this->order_ids);
			$this->setUserParam($var,'order_type',$this->order_type);
			$this->setUserParam($var,'access_type',$this->access_type);
		}


		public function setSize($size){
			$this->size=$size;
		}

		public function setCursor($cursor){
			$this->cursor=$cursor;
		}

		public function setStartTime($start_time){
			$this->start_time=$start_time;
		}

		public function setEndTime($end_time){
			$this->end_time=$end_time;
		}

		public function setOrderIds($order_ids){
			$this->order_ids=$order_ids;
		}

		public function setTimeType($time_type){
			$this->time_type=$time_type;
		}

		public function setOrderType($order_type){
			$this->order_type=$order_type;
		}

		public function setAccessType($access_type){
			$this->access_type=$access_type;
		}
	}
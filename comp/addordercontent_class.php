<?php
require_once "modules_class.php";

class AddOrderContent extends Modules {
	
	protected $title = "Стильные и удобные городские рюкзаки AspenSport. Менеджер свяжется с Вами для подтверждения заказа. WebMoney. Акция!";
	protected $meta_desc = "Ваш заказ на покупку качественного, стильного и удобного городского рюкзака AspenSport принят. Менеджер свяжется с Вами для подтверждения заказа. Можете оплатить заказ в системе WebMoney через наш сайт www.bag.zahist.club";
	protected $meta_key = "заказ принят, заказ принят оплатить, заказ принят звонок";
	
	protected function getContent() {
		$this->template->set("num", $this->data["num"]);
		$this->template->set("price", $this->order->getPrice($this->data["num"]));
		return "addorder";
	}
	
}

?>
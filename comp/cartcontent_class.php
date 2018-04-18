<?php
require_once "modules_class.php";

class CartContent extends Modules {
	
	protected $title = "Оформление заказа на покупку стильного городского рюкзака AspenSport. Бесплатная доставка. Оплата при получении.";
	protected $meta_desc = "Оформление заказа на покупку качественного, стильного и удобного городского рюкзака AspenSport.";
	protected $meta_key = "корзина, заказ, оформление заказа";
	
	protected function getContent() {
		$cart = array();
		$summa = 0;
		if ($_SESSION["cart"]) {
			$ids = explode(",", $_SESSION["cart"]);
			$products = $this->product->getAllOnIDs($ids);
			$result = array();
			for ($i = 0; $i < count($products); $i++) {
				$result[$products[$i]["num"]] = $products[$i];
			}
			$ids_unique = array_unique($ids);
			$i = 0;
			foreach ($ids_unique as $v) {
				$cart[$i]["num"] = $result[$v]["num"];
				$cart[$i]["title"] = $result[$v]["title"];
				$cart[$i]["img"] = $result[$v]["img"];
				$cart[$i]["price"] = $result[$v]["price"];
				$cart[$i]["count"] = $this->getCountInArray($v, $ids);
				$cart[$i]["summa"] = $cart[$i]["count"] * $cart[$i]["price"];
				$cart[$i]["link_delete"] = $result[$v]["link_delete"];
				$summa += $cart[$i]["summa"];
				$i++;
			}
			$value = $this->discount->getValueOnCode($_SESSION["discount"]);
			if ($value) {
				$summa *= (1 - $value);
				$this->template->set("discount", $_SESSION["discount"]);
			}
		}
		$this->template->set("summa", $summa);
		$this->template->set("cart", $cart);
		$this->template->set("message", $this->message());
		$this->template->set("name", $_SESSION["name"]);
		$this->template->set("phone", $_SESSION["phone"]);
		$this->template->set("email", $_SESSION["email"]);
		$this->template->set("delivery", $_SESSION["delivery"]);
		$this->template->set("address", $_SESSION["address"]);
		$this->template->set("notice", $_SESSION["notice"]);
		$this->template->set("link_order", $this->url->order());
		
		return "cart";
	}
	
}

?>
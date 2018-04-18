<?php
require_once "modules_class.php";

class AddCartoffContent extends Modules {
	
	protected $title = "Выбранный товар добавлен в корзину";
	protected $meta_desc = "Товар добавлен в корзину.";
	protected $meta_key = "товар добавлен, товар в корзине, товар добавлен в корзину, выбранный товар добавлен в корзину";
	
	protected function getContent() {
		$this->template->set("num", $this->data["num"]);
		return "addcart";
	}
	
}

?>
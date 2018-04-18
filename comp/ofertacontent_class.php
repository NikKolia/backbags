<?php
require_once "modules_class.php";

class OfertaContent extends Modules {
	
	protected $title = "Публичная оферта";
	protected $meta_desc = "Публичная оферта сайта рюкзаков AspenSport.";
	protected $meta_key = "оплата, публичная оферта, оплата WebMoney";
	
	protected function getContent() {
		return "oferta";
	}
	
}

?>
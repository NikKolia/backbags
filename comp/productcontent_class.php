<?php
require_once "modules_class.php";

class ProductContent extends Modules {
	
	protected function getContent() {
		$product_info = $this->product->get($this->data["num"], $this->section->getTableName());
		if (!$product_info) return $this->index();
		$this->title = "Стильный и удобный городской рюкзак AspenSport. Товар - 10".$product_info["num"].", цена - ".$product_info["price"]." грн";
		$this->meta_desc = "Качество, мода и стиль - городской рюкзак AspenSport. Товар - №10".$product_info["num"].", цена - ".$product_info["price"]." грн. На этой странице Вы можете посмотреть полное описание, красивые фото и купить ортопедические водонепроницаемые прочные городские рюкзаки. ✓Для ноутбука. Школьный, вместительный, на все случаи жизни. На подарок.";
		$this->meta_key = mb_strtolower("описание фото моделей качественного и удобного городского рюкзака для ноутбуков AspenSport. Код товара - 10".$product_info["num"].", цена - ".$product_info["price"]."грн., купить качественный городской рюкзак AspenSport");
		
		$this->template->set("link_section", $this->url->section($product_info["section_id"]));
		$this->template->set("link_models", $this->url->models());
		$this->template->set("product", $product_info);
		$this->template->set("comments", $this->product->getComment($this->data["num"], $this->comment->getTableName()));
		$this->template->set("images", $this->product->getImages($this->data["num"], $this->image->getTableName()));
		$this->template->set("product_id", $product_info["num"]);
		$this->template->set("products", $this->product->getOthers($product_info, $this->config->count_others));
		$this->template->set("name", $_SESSION["name"]);
		$this->template->set("email", $_SESSION["email"]);
		$this->template->set("comment", $_SESSION["comment"]);
		$this->template->set("message", $this->message());
		return "product";
	}
	
}

?>
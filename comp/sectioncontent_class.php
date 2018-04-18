<?php
require_once "modules_class.php";

class SectionContent extends Modules {
	
	protected function getContent() {
		$section_info = $this->section->get($this->data["num"]);
		if (!$section_info) return $this->index();
		$this->title = "Стильные и удобные городские рюкзаки AspenSport - ".$section_info["title"]."";
		$this->meta_desc = "Качественные и удобные городские рюкзаки AspenSport - ".$section_info["title"].". ✓Оплата при получении! ✓Бесплатная доставка по Украине! ✓Доступные цены! ☎(097)990-42-90, (095)002-49-02 ✓Здесь можно купить ортопедический водонепроницаемый прочный городской рюкзак. ✓Для ноутбуков. Школьные вместительные. Для подарка.";
		$this->meta_key = mb_strtolower("описание фото моделей качественного и удобного городского рюкзака для ноутбуков AspenSport, купить качественный городской рюкзак AspenSport ".$section_info["title"]);
		
		$this->setLinkSort();
		$sort = $this->data["sort"];
		$up = $this->data["up"];
		$this->template->set("table_products_title", $section_info["title"]);
		$this->template->set("products", $this->product->getAllOnSectionID($section_info["num"], $sort, $up));
		$this->template->set("infos", $this->section->getInfoses($section_info["num"], $this->info->getTableName()));
		$this->template->set("videos", $this->section->getVideos($section_info["num"], $this->video->getTableName()));
		return "index";
	}
	
}

?>
<?php
require_once "modules_class.php";

class Content extends Modules {

	protected $title = "Рюкзаки AspenSport - стильные, модные и удобные. Выбирай!";
	protected $meta_desc = "Стильные, качественные и удобные городские рюкзаки AspenSport. ✓Акция! Оплата при получении ✓Бесплатная доставка по Украине! ☎(097)990-42-90, (095)002-49-02 ✓Здесь Вы можете купить ортопедический водонепроницаемый прочный городской рюкзак на каждый день. ✓Для ноутбука школьный вместительный подарок.";
	protected $meta_key = "купить ортопедический износостойкий рюкзак, для ноутбука, стильный на каждый день, от производителя, городской, водонепроницаемый, недорого, мужской, повседневный высокопрочный, женский, школьный, фото, акция, мужские городские, модные рюкзаки для девочек, удобные вместительные, для подростков в школу, тканевые, молодежные, стильные, магазин рюкзаков, подарок, распродажа, aspensport, Аспенспорт, Аспен спорт";
	
	protected function getContent() {
		$this->setLinkSort();
		$sort = $this->data["sort"];
		$up = $this->data["up"];
		$this->template->set("table_products_title", "Все товары сайта");
		$this->template->set("products", $this->product->getAllSort($sort, $up, $this->config->count_on_page));
		$this->template->set("infos", $this->info->getAllData($this->config->count_info));
		$this->template->set("videos", $this->video->getAllData($this->config->count_video));
		return "index";
	}
	
}

?>
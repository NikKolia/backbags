<?php
require_once "modules_class.php";

class ModelsContent extends Modules {
	
	protected $title = "Все модели стильных и удобных городских рюкзаков AspenSport - выбери сейчас!";
	protected $meta_desc = "Все доступные модели городских рюкзаков AspenSport. ✓Акция! Оплата при получении! Бесплатная доставка по Украине! ☎(097)990-42-90, (095)002-49-02 ✓Здесь Вы можете купить ортопедический водонепроницаемый прочный городской рюкзак на каждый день. ✓Для ноутбука. Школьный вместительный. На подарок.";
	protected $meta_key = "купить ортопедический износостойкий рюкзак, для ноутбука, стильный на каждый день, от производителя, городской, водонепроницаемый, недорого, мужской, повседневный высокопрочный, женский, школьный, фото, акция, мужские городские, модные рюкзаки для девочек, удобные вместительные, для подростков в школу, тканевые, молодежные, стильные, магазин рюкзаков, подарок, распродажа, aspensport, Аспенспорт, Аспен спорт";
	
	protected function getContent() {
		$this->template->set("table_products_title", "Все доступные модели");		
		$this->template->set("products", $this->product->getOthers($product_info, $this->config->count_others));
		$this->template->set("models", $this->model->getModels($this->config->models_count));
		$this->template->set("pages", $this->model->getPages());
		return "models";
	}
	
}

?>
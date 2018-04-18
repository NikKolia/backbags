<?php
require_once "adminform_class.php";

class AdminImagesContent extends AdminForm {
	
	protected $title = "Изображения товара";
	protected $meta_desc = "Страница с изображениями описания товара";
	protected $meta_key = "изображения товара, загрузка изображений товара";
	
	protected function getFormData() {
		$form_data = array();
		$this->template->set("products", $this->product->getAllimgData());
		$form_data["fields"] = array("product_id", "img_title", "img_description"); 
		$form_data["func_add"] = "add_image";
		$form_data["func_edit"] = "edit_image";
		$form_data["title_add"] = "Добавление изображения";
		$form_data["title_edit"] = "Редактирование информации";
		$form_data["get"] = $this->image->get($this->data["num"], $this->product->getTableName());
		$form_data["form_t"] = "image_form";
		$form_data["t"] = "images";
		$form_data["obj"] = $this->image;
		$form_data["table_data"] = $this->image->getTableData($this->product->getTableName(), $this->config->pagination_count, $this->page_info["offset"]);
		return $form_data;
	}
}

?>
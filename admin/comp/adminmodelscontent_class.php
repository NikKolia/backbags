<?php
require_once "adminform_class.php";

class AdminModelsContent extends AdminForm {
	
	protected $title = "Редактирование страницы для поднятия настроения";
	protected $meta_desc = "Редактирование страницы для поднятия настроения";
	protected $meta_key = "изображения и выражения страницы настроения, загрузка постов";
	
	protected function getFormData() {
		$form_data = array();
		$form_data["fields"] = array("model", "model_img", "date"); 
		$form_data["func_add"] = "add_model";
		$form_data["func_edit"] = "edit_model";
		$form_data["title_add"] = "Добавление модели";
		$form_data["title_edit"] = "Редактирование информации";
		$form_data["get"] = $this->model->get($this->data["num"]);
		$form_data["form_t"] = "models_form";
		$form_data["t"] = "models";
		$form_data["obj"] = $this->model;
		$form_data["table_data"] = $this->model->getTableData($this->config->pagination_count, $this->page_info["offset"]);
		return $form_data;
	}
}

?>
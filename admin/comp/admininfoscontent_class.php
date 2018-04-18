<?php
require_once "adminform_class.php";

class AdminInfosContent extends AdminForm {
	
	protected $title = "Описание раздела";
	protected $meta_desc = "Страница с описанием раздела";
	protected $meta_key = "ввод описания раздела, загрузка изображений раздела";
	
	protected function getFormData() {
		$form_data = array();
		$this->template->set("sections", $this->section->getAllData());
		$form_data["fields"] = array("section_id", "infoimg_title", "infoimg_description"); 
		$form_data["func_add"] = "add_info";
		$form_data["func_edit"] = "edit_info";
		$form_data["title_add"] = "Добавление информации о разделе";
		$form_data["title_edit"] = "Редактирование информации о разделе";
		$form_data["get"] = $this->info->get($this->data["num"], $this->section->getTableName());
		$form_data["form_t"] = "info_form";
		$form_data["t"] = "infos";
		$form_data["obj"] = $this->info;
		$form_data["table_data"] = $this->info->getTableData($this->section->getTableName(), $this->config->pagination_count, $this->page_info["offset"]);
		return $form_data;
	}
}

?>
<?php
require_once "adminform_class.php";

class AdminVideosContent extends AdminForm {
	
	protected $title = "Видео раздела";
	protected $meta_desc = "Страница с видео раздела";
	protected $meta_key = "ввод видео раздела, загрузка видео раздела";
	
	protected function getFormData() {
		$form_data = array();
		$this->template->set("sections", $this->section->getAllData());
		$form_data["fields"] = array("section_id", "sec_videos", "video_title", "video_desc");
		$form_data["func_add"] = "add_video";
		$form_data["func_edit"] = "edit_video";
		$form_data["title_add"] = "Добавление видео раздела";
		$form_data["title_edit"] = "Редактирование видео раздела";
		$form_data["get"] = $this->video->get($this->data["num"], $this->section->getTableName());
		$form_data["form_t"] = "video_form";
		$form_data["t"] = "videos";
		$form_data["obj"] = $this->video;
		$form_data["table_data"] = $this->video->getTableData($this->section->getTableName(), $this->config->pagination_count, $this->page_info["offset"]);
		return $form_data;
	}
}

?>
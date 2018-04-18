<h3><?=$this->form_title?></h3>
<?php include "message.tpl"; ?>
<div class="form">
	<form name="product" action="<?=$this->action?>" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Раздел:</td>
				<td>
					<select name="section_id">
						<?php foreach ($this->sections as $section) { ?>
							<option value="<?=$section["num"]?>" <?php if ($section["num"] == $this->section_id) { ?>selected="selected"<?php } ?>><?=$section["title"]?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Наименование:</td>
				<td>
					<textarea name="pr_title" cols="30" rows="3"><?=$this->pr_title?></textarea>
				</td>
			</tr>
			<tr>
				<td>Размеры:</td>
				<td>
					<input type="text" name="model" value="<?=$this->model?>" />
				</td>
			</tr>
			<tr>
				<td>Цена:</td>
				<td>
					<input type="text" name="price" value="<?=$this->price?>" /> гривен
				</td>
			</tr>
			<tr>
				<td>Описание:</td>
				<td>
					<textarea name="description" cols="100" rows="10"><?=$this->description?></textarea>
				</td>
			</tr>
			<tr>
				<td>Видео:</td>
				<td>
					<textarea name="frame" cols="30" rows="4"><?=$this->frame?></textarea>
				</td>
			</tr>
			<tr>
				<td>Изображение:</td>
				<td>
					<input type="file" name="img" />
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="hidden" name="num" value="<?=$this->id?>" />
					<input type="hidden" name="func" value="<?=$this->func?>" />
					<input type="submit" value="Отправить" />
				</td>
			</tr>
		</table>
	</form>
</div>
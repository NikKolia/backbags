<h3><?=$this->form_title?></h3>
<?php include "message.tpl"; ?>
<div class="form">
	<form name="image" action="<?=$this->action?>" method="post" enctype="multipart/form-data">
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
				<td>№п/п:</td>
				<td>
					<input type="text" name="infoimg_title" value="<?=$this->infoimg_title?>" />
				</td>
			</tr>
			<tr>
				<td>Описание:</td>
				<td>
					<textarea name="infoimg_description" cols="30" rows="10"><?=$this->infoimg_description?></textarea>
				</td>
			</tr>
			<tr>
				<td>Изображение:</td>
				<td>
					<input type="file" name="infoimgs" />
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
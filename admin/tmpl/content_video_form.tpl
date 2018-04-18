<h3><?=$this->form_title?></h3>
<?php include "message.tpl"; ?>
<div class="form">
	<form name="video" action="<?=$this->action?>" method="post" enctype="multipart/form-data">
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
					<input type="text" name="video_title" value="<?=$this->video_title?>" />
				</td>
			</tr>
			<tr>
				<td>Ссылка:</td>
				<td>
					<textarea name="sec_videos" cols="30" rows="4"><?=$this->sec_videos?></textarea>
				</td>
			</tr>
			<tr>
				<td>Описание:</td>
				<td>
					<textarea name="video_desc" cols="30" rows="10"><?=$this->video_desc?></textarea>
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
<h3><?=$this->form_title?></h3>
<?php include "message.tpl"; ?>
<div class="form">
	<form name="image" action="<?=$this->action?>" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Модель:</td>
				<td>
					<textarea name="model" cols="30" rows="10"><?=$this->model?></textarea>
				</td>
			</tr>
			<tr>
				<td>Изображение:</td>
				<td>
					<input type="file" name="model_img" />
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
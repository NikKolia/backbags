<h3><?=$this->form_title?></h3>
<?php include "message.tpl"; ?>
<div class="form">
	<form name="image" action="<?=$this->action?>" method="post" enctype="multipart/form-data">
		<table>
			<tr>
				<td>Товар:</td>
				<td>
					<select name="product_id">
						<?php foreach ($this->products as $product) { ?>
							<option value="<?=$product["num"]?>" <?php if ($product["num"] == $this->product_id) { ?>selected="selected"<?php } ?>><?=$product["num"]?> <?=$product["title"]?></option>
						<?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>№п/п:</td>
				<td>
					<input type="text" name="img_title" value="<?=$this->img_title?>" />
				</td>
			</tr>
			<tr>
				<td>Описание:</td>
				<td>
					<textarea name="img_description" cols="30" rows="10"><?=$this->img_description?></textarea>
				</td>
			</tr>
			<tr>
				<td>Изображение:</td>
				<td>
					<input type="file" name="imgs" />
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
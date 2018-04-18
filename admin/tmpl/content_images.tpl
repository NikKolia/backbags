<h3>Изображения товара</h3>
<?php include "message.tpl"; ?>
<?php include "pagination.tpl"; ?>
<p class="link_new">
	<a href="<?=$this->link_new?>">Добавить новое изображение</a>
</p>
<table class="info">
	<tr class="header">
		<td>id</td>
		<td>Товар</td>
		<td>Изображение</td>
		<td>№п/п</td>
		<td>Описание, дата</td>
		<td>Функции</td>
	</tr>
	<?php foreach ($this->table_data as $data) { ?>
		<tr>
			<td><?=$data["num"]?></td>
			<td>№<?=$data["product_id"]?><br />
				<?=$data["product"]?>
			</td>
			<td>
				<img class="img" src="<?=$data["imgs"]?>" alt="product image" />
			</td>
			<td><?=$data["img_title"]?></td>
			<td>
				<?=$data["img_description"]?>
				<br />
				<?=$data["date"]?>
			</td>
			<td>
				<a href="<?=$data["link_admin_edit"]?>">Редактировать</a>
				<br />
				<a href="<?=$data["link_admin_delete"]?>" onclick="return confirm('Вы уверены, что хотите удалить элемент?')">Удалить</a>
			</td>
		</tr>
	<?php } ?>
</table>
<?php include "pagination.tpl"; ?>
<h3>Комментарии и отзывы</h3>
<?php include "message.tpl"; ?>
<?php include "pagination.tpl"; ?>
<p class="link_new">
	<a href="<?=$this->link_new?>">Добавить новый комментарий</a>
</p>
<table class="info">
	<tr class="header">
		<td>id</td>
		<td>Товар</td>
		<td>Комментарий</td>
		<td>Дата</td>
		<td>Имя</td>
		<td>Email</td>
		<td>Функции</td>
	</tr>
	<?php foreach ($this->table_data as $data) { ?>
		<tr>
			<td><?=$data["num"]?></td>
			<td>№<?=$data["product_id"]?><br />
				<?=$data["product"]?>
			</td>
			<td><?=$data["comment"]?></td>
			<td><?=$data["date"]?></td>
			<td><?=$data["name"]?></td>
			<td><?=$data["email"]?></td>
			<td>
				<a href="<?=$data["link_admin_edit"]?>">Редактировать</a>
				<br />
				<a href="<?=$data["link_admin_delete"]?>" onclick="return confirm('Вы уверены, что хотите удалить элемент?')">Удалить</a>
			</td>
		</tr>
	<?php } ?>
</table>
<?php include "pagination.tpl"; ?>
<h3>Редактирование страницы настроения</h3>
<?php include "message.tpl"; ?>
<?php include "pagination.tpl"; ?>
<p class="link_new">
	<a href="<?=$this->link_new?>">Добавить новую модель</a>
</p>
<table class="info">
	<tr class="header">
		<td>id</td>
		<td>Модель, дата</td>
		<td>Изображение</td>
		<td>Функции</td>
	</tr>
	<?php foreach ($this->table_data as $data) { ?>
		<tr>
			<td><?=$data["num"]?></td>
			<td>
				<?=$data["model"]?>
				<br />
				<?=$data["date"]?>
			</td>
			<td>
				<img class="img" src="<?=$data["model_img"]?>" alt="model image" />
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
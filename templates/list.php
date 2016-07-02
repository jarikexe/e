<?php require('header.php') ?>

<!-- Blog -->
<div class="blog col-md-8">
<?php foreach ($records as $row):?>
	<div class="articleHeader col-md-12">
	<!-- ###edit-remove### -->
		<?php if (IS_ADMIN): ?>
		<a class="edit_remove" href="?act=edit-entry&id=<?=$row['id']?>"><span class="glyphicon glyphicon-pencil"></span></a>
		<a class="edit_remove" href="?act=del-entry&id=<?=$row['id']?>"><span class="glyphicon glyphicon-trash"></span></a>
		<?php endif?>

	<!-- ###header### -->
		<a href="?act=view-entry&id=<?=$row['id'];?>"><?=$row['header']?></a>
	</div>

	<!-- ###atributes### -->
	<div class="atributes col-md-12">
		<span  class="atrib">
			<a href="?act=view-entry&id=<?=$row['id'];?>">coments (<?=$row['comments'];?>)</a>
		</span>
		<span class="atrib">Author: <?=$row['author']?></span>
		<span class="atrib">Date: <?=$row['date']?></span>
	</div>

	<!-- ###content### -->
	<div class="col-md-12">
		<?=$row['content']?>
	</div>

	
<?php endforeach ?>
</div>
<!-- Blog End -->

<!-- Navigation -->
<nav class="col-md-4 mainNav">
<h3>Categories</h3>
	<ul>
		<li><a href="" class="col-md-12"><span class="glyphicon glyphicon-trash"></span>link</a></li>
		<li><a href="" class="col-md-12"><span class="glyphicon glyphicon-trash"></span>linksadfsadfsd</a></li>
		<li><a href="" class="col-md-12"><span class="glyphicon glyphicon-trash"></span>link</a></li>
		<li><a href="" class="col-md-12"><span class="glyphicon glyphicon-trash"></span>linksdfsad</a></li>
		<li><a href="" class="col-md-12"><span class="glyphicon glyphicon-trash"></span>linkaaaaaaaa</a></li>
		<li><a href="" class="col-md-12"><span class="glyphicon glyphicon-trash"></span>link</a></li>
		<li><a href="" class="col-md-12"><span class="glyphicon glyphicon-trash"></span>linksadf</a></li>
		<li><a href="" class="col-md-12"><span class="glyphicon glyphicon-trash"></span>lisdafnk</a></li>
	</ul>
</nav>
<!-- Navigation End -->

<!-- Pagination -->
<div class="col-md-12">
Pages
<?php for ($i = 1; $i <= $pages; $i++):?>
	<? if ($i == $page): ?><b><?= $i ?></b>
	<?php else: ?><a href="?page=<?=$i?>"><?=$i?></a>
	<?php endif  ?>

<?php endfor ?>
</div>
<!-- Pagination End -->



<?php require('footer.php') ?>
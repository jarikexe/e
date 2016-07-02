<?php require('header.php') ?>

<h1><?=$ENTRY['header']?></h1>
<p><?=$ENTRY['content']?></p>

<h3>Coments</h3>

<form action="?act=do-new-comment" method="post" class="col-md-4">
<div class="input-group">
<input type="hidden" name="entry_id" value="<?= $id?>">
<input type="text" class="form-control" name="author" placeholder="Author">
<textarea name="comentText" class="col-md-12" rows="5" placeholder="coment text goes hear"></textarea>
<button type="submit" class="btn btn-info col-md-12">Add new coment</button>
</div>

</form>
<div class="col-md-12">
<?php foreach ($comments as $row):?>




<h4><b><?=$row['author']?></b><?php if (IS_ADMIN): ?>
<a href="?act=del-comment&entry_id=<?= $ENTRY['id'] ?>&id=<?= $row['id'] ?>"><span class="glyphicon glyphicon-trash"></span></a>
<?php endif?></h4>
    <p><?=$row['text']?></p>
`   <p><span><?=$row['date']?></span></p>

    <?php endforeach ?>
</div>
<?php require('footer.php') ?>
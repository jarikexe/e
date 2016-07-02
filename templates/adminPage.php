<?php require('header.php'); ?>

<?php if(IS_ADMIN):?>
<form action="?act=do-new-entry" method="POST" class="col-md-8 col-md-offset-2">
<div class="input-group"> 
  <input type="text" class="form-control" name="author" placeholder="Author">
  <input type="text" class="form-control" name="header">
<textarea name="content" class="col-md-12" rows="12"></textarea>
<button type="submit" class="btn btn-warning col-md-12">Add new entry +++</button>
</div>

</form>


<style>
    input{
        margin-top: 20px;
    }
    textarea{
        margin: 20px auto;
    }
</style>

<?php endif?>
<?php require('footer.php') ?>
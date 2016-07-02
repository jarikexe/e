<?php require('header.php') ?>

<form action="?act=pre-login" method="POST" class="col-md-4 col-md-offset-4">
<div class="input-group"> 
  <input type="text" class="form-control" name="login">
  <input type="password" class="form-control" name="pass">
<button type="submit" class="btn btn-info col-md-12">login</button>
</div>

</form>


<style>
    form{
        margin-top: 100px;
    }
    input{
        margin-top: 20px;
    }
    button{
        margin-top: 20px;
    }
</style>
<?php require('footer.php') ?>
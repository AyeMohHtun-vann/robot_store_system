<!DOCTYPE html>
<html lang="en">
<head>
  <title>New Robot Category</title>
  
<link rel="stylesheet" href="css/style.css">
<style>


</style>
</head>
<body>


  <h1>New category</h1>
  <ul class="menu">
<li><a href="robot-list.php">Manage Robots</a></li>
<li><a href="cat-list.php">Manage Categories</a></li>
<li><a href="orders.php">Manage Orders</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
  <form action="cat-add.php" method="post">
    
    <div class="form-group row">
      <div class="col-xs-2">
      <label for="name">Category Name</label>
      <input type="text" class="form-control" id="name" placeholder="" name="name">
    </div>
</div>
<div class="form-group row">
    <div class="col-xs-2">
      <label for="remark">Remark</label>
      <textarea class="form-control" id="remark" placeholder="" name="remark"></textarea>
    </div>
   </div>
    <button type="submit" class="btn btn-default">Add category</button>
  </form>

</body>
</html>


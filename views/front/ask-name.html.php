<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <style>
    .error{padding:1em;border: solid 1px red;color: red;}
  </style>
</head>
<body>
  
  <?php if (isset($error)): ?>
    <div class="error">
      <?php echo $error;?>
    </div>
  <?php endif ?>

  <form method="POST" action="/ask">
    <label>Quel est ton nom petit ourson ?</label><br>
    <input type="text" name="name"><br>
    <button type="submit"> C'est mon nom !</button>
  </form>
  
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php
  if ($this->section("title")) {
    echo $this->section("title");
  }
  ?>

  <?php
    if ($this->section("css")) {
        echo $this->section("css");
    }
  ?>
  <link rel="shortcut icon" href="<?= url("assets/web/"); ?>img/favicon.ico" type="image/x-icon">
</head>
<body>
  <?php echo $this->section("content"); ?>
</body>
</html>
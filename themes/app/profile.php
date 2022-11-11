<?php
$this->layout("_theme");
?>
<div class="container">
  <form enctype="multipart/form-data" method="post" id="formProfile">
    <div class="mb-3">
      <label for="username" class="form-label">Username: </label>
      <input type="text" name="username" class="form-control" id="username" value="<?=$user["username"];?>" placeholder="Seu username...">
    </div>
    <div class="mb-3">
      <label for="email" class="form-label">Email: </label>
      <input type="email" name="email" class="form-control" id="email" value="<?=$user["email"];?>" placeholder="name@example.com">
    </div>
    <div class="mb-3">
      <label for="photo" class="form-label">Sua Foto: </label>
      <input class="form-control" type="file" name="photo" id="photo">
    </div>
    <div class="mb-3">
      <button type="submit" class="btn btn-primary" name="send">Alterar</button>
    </div>
    <div class="alert alert-primary" role="alert" id="message">
      Mensagem de Retorno!
    </div>
    <div class="mb-3">
      <?php
      if(!empty($user["photo"])):
        ?>
        <img src="<?= url($user["photo"]); ?>" class="img-thumbnail" id="photoShow" alt="...">
      <?php
      endif;
      ?>
    </div>
  </form>
</div>
<script type="text/javascript" async>
    const form = document.querySelector("#formProfile");
    const message = document.querySelector("#message");
    const photoShow = document.querySelector("#photoShow");
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUser = new FormData(form);
        const data = await fetch("<?= url("app/perfil"); ?>",{
            method: "POST",
            body: dataUser
        });
        const user = await data.json();
        if(user) {
            if(user.type === "alert-success") {
                photoShow.setAttribute("src",user.photo);
            }
            message.textContent = user.message;
            message.classList.remove("alert-primary", "alert-danger");
            message.classList.add(`${user.type}`);
        }
    });
</script>
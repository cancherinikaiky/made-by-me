<?php
  $this->layout("_theme");
?>

<?php $this->start("css"); ?>
    <link rel="stylesheet" href="<?= url("assets/web/") ?>css/register.css">
<?php $this->end(); ?>

<?php $this->start("title"); ?>
    <title>Ainda não possui uma conta? Cadastre-se!</title>
<?php $this->end(); ?>

<div class="wrapper">
<header>
  <img class="logo" src="<?= url("assets/web/") ?>img/madebyme-logo.png" alt="Logo da loja MadebyMe, composto de duas folhas em verde médio e escuro.">
</header>

<main>
  <form id="registerUserForm">

    <div class="insert">
      <label for="username">Usuário:</label>
      <input type="text" name="username" value="" id="username" required>
    </div>

    <div class="insert">
      <label for="email">Email:</label>
      <input type="email" name="email" value="" id="email" required>
    </div>

    <div class="insert">
      <label for="password">Senha:</label>
      <input type="password" name="password" value="" id="password" required>
    </div>

    <button class="submit" type="submit">Cadastrar</button>

  </form>
  <div id="message" style="margin-bottom: 2rem; color: var(--color-main-green); font-size: 1.4rem; font-weight: 500">

  </div>
</main>

<aside class="info">
  <span class="checked">
    Já possui conta?<br>
    <a href="<?= url("login") ?>">Logue-se</a>
  </span>
</aside>
</div>

<script type="text/javascript" async>
    const form = document.querySelector("#registerUserForm"); // id do formulário
    const message = document.querySelector("#message"); // id da div message
    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataUser = new FormData(form);

        const data = await fetch("<?= url("cadastrar"); ?>",{
            method: "POST",
            body: dataUser,
        });
        const user = await data.json();
        console.log(user);

        if(user) {
            message.innerHTML = user.message;
            message.classList.remove("success", "warning", "error");
            message.classList.add("message");
            message.classList.add(`${user.type}`);
        }

        document.querySelector("#username").value = "";
        document.querySelector("#email").value = "";
        document.querySelector("#password").value = "";

        window.location.href = "<?= url("login")?>";
    });
</script>
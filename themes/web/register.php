<?php
  $this->layout("_theme");
?>

  <div class="wrapper">
    <header>
      <img class="logo" src="../assets/madebyme-logo.png" alt="Logo da loja MadebyMe, composto de duas folhas em verde médio e escuro.">
    </header>

    <main>
      <form id="registerUserForm">

        <div class="insert">
          <label for="user">Usuário:</label>
          <input type="text" name="user" value="" id="user" required>
        </div>

        <div class="insert">
          <label for="email">Email:</label>
          <input type="email" name="email" value="" id="email" required>
        </div>

        <div class="insert">
          <label for="password">Senha:</label>
          <input type="password" name="password" value="" id="password" required>
        </div>

<!--        <div class="insert">-->
<!--          <label for="passwordConfirm">Confirme senha:</label>-->
<!--          <input type="password" name="passwordConfirm" value="" id="passwordConfirm" required>-->
<!--        </div>-->

        <button class="submit" type="submit">Cadastrar</button>

      </form>
    </main>

    <aside class="info">
      <span class="checked">
        Já possui conta?<br>
        <a href="<?= url("login") ?>">Logue-se</a>
      </span>
    </aside>
  </div>

  <script type="text/javascript" async>
    const registerUrl = "<?= url("cadastrar") ?>";
    const registerUserForm = document.querySelector("#registerUserForm");

    registerUserForm.addEventListener("submit", async (form) => {
        form.preventDefault();
        const sendRegisterForm = new FormData(registerUserForm);

        await fetch(registerUrl, {
            method: "POST",
            body: sendRegisterForm
        })
        .then((res) => {
            const jsonRes = res.json();
            console.log(jsonRes);
        })
        .catch((err) => {
            const jsonErr = err.json();
            console.error(jsonErr);
        })
    })
  </script>
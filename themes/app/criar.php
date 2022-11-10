<?php
    $this->layout("_theme");
?>

<?php $this->start("css"); ?>
    <link rel="stylesheet" href="<?= url("assets/web/") ?>css/create-item.css">
<?php $this->end(); ?>

<?php $this->start("title"); ?>
    <title>Cadastre seu item!</title>
<?php $this->end(); ?>

<div class="wrapper">
    <nav class="logo">
        <header class="wrapper">
            <img src="<?= url("assets/web/") ?>img/madebyme-logo.png" alt="" />
            <h1>
                MADE BY
                <span>ME</span>
            </h1>
        </header>
    </nav>

    <main>
        <div class="info">
          <span>
              <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M15 7.5L15 22.5" stroke="#007444" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
                  <path d="M22.5 15L7.5 15" stroke="#007444" stroke-width="2" stroke-linecap="square" stroke-linejoin="round"/>
              </svg>
              Cadastrar item
          </span>

            <i>
                <svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.8">
                        <circle cx="15" cy="15" r="11.25" stroke="#32373D" stroke-width="2"/>
                        <path d="M15.625 9.375C15.625 9.72018 15.3452 10 15 10C14.6548 10 14.375 9.72018 14.375 9.375C14.375 9.02982 14.6548 8.75 15 8.75C15.3452 8.75 15.625 9.02982 15.625 9.375Z" fill="#32373D" stroke="#32373D"/>
                        <path d="M15 21.25V12.5" stroke="#32373D" stroke-width="2"/>
                    </g>
                </svg>
            </i>
        </div>

        <section>
            <form id="itemRegisterForm" novalidate>
                <div class="insert">
                    <label for="title">Título:</label>
                    <input type="text" name="title" id="title" value="" required>
                </div>

                <div class="insert">
                    <div>
                        <label for="price">Preço:</label>
                        <input type="text" name="price" id="price" value="" required>
                    </div>

                    <div>
                        <label for="category">Categoria:</label>
                        <input type="text" name="category" id="category" value="" required>
                    </div>
                </div>

                <div class="insert">
                    <label for="description">Descrição:</label>
                    <input type="text" name="description" id="description" value="" required>
                </div>

                <div class="insert">
                    <label for="image">Imagem:</label>
                    <input type="text" name="image" id="image" value="" required placeholder="Insira o link da imagem">
                </div>

                <button class="submit" type="submit">Cadastrar</button>
            </form>
        </section>

        <div id="message">

        </div>
    </main>
</div>
<nav class="menu">
    <svg
            class="menu_icons"
            width="45"
            height="45"
            viewBox="0 0 45 45"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
    >
        <path
                d="M9.375 23.9243C9.375 21.3785 9.375 20.1056 9.88962 18.9867C10.4042 17.8678 11.3707 17.0394 13.3036 15.3826L15.1786 13.7755C18.6723 10.7809 20.4192 9.28357 22.5 9.28357C24.5808 9.28357 26.3277 10.7809 29.8214 13.7755L31.6964 15.3826C33.6293 17.0394 34.5958 17.8678 35.1104 18.9867C35.625 20.1056 35.625 21.3785 35.625 23.9243V31.875C35.625 35.4106 35.625 37.1783 34.5267 38.2767C33.4283 39.375 31.6605 39.375 28.125 39.375H16.875C13.3395 39.375 11.5717 39.375 10.4734 38.2767C9.375 37.1783 9.375 35.4106 9.375 31.875V23.9243Z"
                stroke="#007444"
                stroke-width="2"
        />
        <path
                d="M27.1875 39.375V29.125C27.1875 28.5727 26.7398 28.125 26.1875 28.125H18.8125C18.2602 28.125 17.8125 28.5727 17.8125 29.125V39.375"
                stroke="#007444"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
        />
    </svg>

    <svg
            class="menu_icons"
            width="41"
            height="40"
            viewBox="0 0 41 40"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
    >
        <circle
                cx="19.005"
                cy="18.3333"
                r="11.6667"
                stroke="#007444"
                stroke-width="2"
        />
        <path
                d="M34.0054 33.3333L29.0054 28.3333"
                stroke="#007444"
                stroke-width="2"
                stroke-linecap="round"
        />
    </svg>

    <svg
            class="menu_icons"
            width="40"
            height="40"
            viewBox="0 0 40 40"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
    >
        <path
                d="M13.3335 13.3333L13.3335 11.6666C13.3335 7.98475 16.3183 4.99998 20.0002 4.99998V4.99998C23.6821 4.99998 26.6668 7.98475 26.6668 11.6666L26.6668 13.3333"
                stroke="#007444"
                stroke-width="2"
                stroke-linecap="round"
        />
        <path
                d="M25 23.3333V20"
                stroke="#007444"
                stroke-width="2"
                stroke-linecap="round"
        />
        <path
                d="M15 23.3333V20"
                stroke="#007444"
                stroke-width="2"
                stroke-linecap="round"
        />
        <path
                d="M6.6665 17.3333C6.6665 15.4477 6.6665 14.5049 7.25229 13.9191C7.83808 13.3333 8.78089 13.3333 10.6665 13.3333H29.3332C31.2188 13.3333 32.1616 13.3333 32.7474 13.9191C33.3332 14.5049 33.3332 15.4477 33.3332 17.3333V27C33.3332 30.7712 33.3332 32.6568 32.1616 33.8284C30.99 35 29.1044 35 25.3332 35H14.6665C10.8953 35 9.00965 35 7.83808 33.8284C6.6665 32.6568 6.6665 30.7712 6.6665 27V17.3333Z"
                stroke="#007444"
                stroke-width="2"
        />
    </svg>

    <svg
            class="menu_icons"
            width="41"
            height="40"
            viewBox="0 0 41 40"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
    >
        <circle
                cx="20.2121"
                cy="11.6667"
                r="6.66666"
                stroke="#007444"
                stroke-width="2"
                stroke-linecap="round"
        />
        <path
                d="M9.99403 27.5693C10.9618 24.8665 13.6505 23.3333 16.5213 23.3333H23.9028C26.7737 23.3333 29.4623 24.8664 30.4301 27.5693C31.0902 29.4127 31.7039 31.6801 31.8473 34.0006C31.8814 34.5518 31.431 35 30.8787 35H9.54541C8.99313 35 8.54278 34.5518 8.57685 34.0006C8.72028 31.6801 9.33394 29.4127 9.99403 27.5693Z"
                stroke="#007444"
                stroke-width="2"
                stroke-linecap="round"
        />
    </svg>
</nav>

<script type="text/javascript" async>
    const form = document.querySelector("#itemRegisterForm");

    form.addEventListener("submit", async (e) => {
        e.preventDefault();
        const dataItem = new FormData(form);
        const data = await fetch("<?= url("app/criar"); ?>",{
            method: "POST",
            body: dataItem,
        });
        const item = await data.json();
        console.log(item);

        document.querySelector("#title").value = "";
        document.querySelector("#price").value = "";
        document.querySelector("#category").value = "";
        document.querySelector("#description").value = "";
        document.querySelector("#image").value = "";
    });
</script>
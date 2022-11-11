<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Category;
use Source\Models\Item;
use Source\Models\User;
use CoffeeCode\Uploader\Image;

class App
{
  private $view;

  public function __construct()
  {
    if(empty($_SESSION["user"]) || empty($_COOKIE["user"])){
      header("Location:http://www.localhost/made-by-me/login");
    }

    $this->view = new Engine(CONF_VIEW_APP,'php');
  }

  public function home() : void
  {
    $item = new Item();
    $items = $item->selectAll();

    echo $this->view->render("home",
      [
        "items" => $items
      ]
    );
  }

  public function profile(array $data) : void
  {
    echo $this->view->render("profile",
      [
        "user" => $_SESSION["user"]
      ]);

  }

  public function list () : void
  {

  }
  public  function criar(array $data) : void
  {
    if (!empty($data)) {
      if(in_array("",$data)){
        $json = [
          "message" => "Informe todos os dados do item!",
          "type" => "warning"
        ];
        echo json_encode($json);
        return;
      }

      $item = new Item(
        null,
        $data["title"],
        $data["price"],
        $data["category"],
        $data["description"],
        $data["image"]
      );

      if(!$item->insert()){
        $json = [
          "message" => $item->getMessage(),
          "type" => "error"
        ];
        echo json_encode($json);
        return;
      } else {
        echo json_encode("DEU TUDO CERTO CARALHO");
        return;
      }

      return;
    }

    echo $this->view->render("criar",
      [
        "user" => $_SESSION["user"]
      ]);
  }

  public function logout()
  {
    session_destroy();
    setcookie("user","Logado",time() - 3600,"/");
    header("Location:http://www.localhost/made-by-me/login");
  }

  public function profileUpdate(array $data) : void
  {
    echo json_encode($data);

    if(!empty($data)){
      $data = filter_var_array($data,FILTER_SANITIZE_FULL_SPECIAL_CHARS);
      if(in_array("",$data)){
        $json = [
          "message" => "Informe Username e Email...",
          "type" => "alert-danger"
        ];
        echo json_encode($json);
        return;
      }
      if(!is_email($data["email"])){
        $json = [
          "message" => "Informe um e-mail válido...",
          "type" => "alert-danger"
        ];
        echo json_encode($json);
        return;
      }
      // se a imagem for alterada, manda a do formulário $_FILES
      if(!empty($_FILES['photo']['tmp_name'])) {
        $upload = uploadImage($_FILES['photo']);
        unlink($_SESSION["user"]["photo"]);
      } else {
        // se não houve alteração da imagem, manda a imagem que está na sessão
        $upload = $_SESSION["user"]["photo"];
      }

      $user = new User(
        $_SESSION["user"]["id"],
        $data["username"],
        $data["email"],
        null,
        $upload
      );

      $user->update();

      $json = [
        "message" => $user->getMessage(),
        "type" => "alert-success",
        "name" => $user->getUsername(),
        "email" => $user->getEmail(),
        "photo" => url($user->getPhoto())
      ];
      echo json_encode($json);
    }
  }
}


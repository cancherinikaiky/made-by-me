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

  public function home () : void
  {
    echo $this->view->render("home");
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

}


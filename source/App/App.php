<?php

namespace Source\App;

use League\Plates\Engine;

class App
{
  private $view;

  public function __construct()
  {
    $this->view = new Engine(CONF_VIEW_APP,'php');
  }

  public function home () : void
  {
    echo $this->view->render("home");
  }

  public function list () : void
  {

  }

}

?>
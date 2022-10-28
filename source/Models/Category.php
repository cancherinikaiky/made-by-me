<?php

namespace Source\Models;

use Source\Core\Connect;

class Category
{
  private $id;
  private $level;
  private $field;

  /**
   * @param $id
   * @param $level
   * @param $field
   */
  public function __construct($id = null, $level = null, $field = null)
  {
    $this->id = $id;
    $this->level = $level;
    $this->field = $field;
  }

  public function selectAll()
  {
    $query = "SELECT * FROM categories";
    $stmt = Connect::getInstance()->prepare($query);
    $stmt->execute();

    if($stmt->rowCount() == 0){
      return false;
    } else {
      return $stmt->fetchAll();
    }
  }

}
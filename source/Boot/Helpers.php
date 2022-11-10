<?php
/**
 * Funções auxiliares
 * Esse script consta no composer.json para ser incluido automaticamente
 */

use CoffeeCode\Uploader\Image;

// ###   VALIDATE   ###

function is_email(string $email): bool
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// ###      URL     ###

/**
 * @param string|null $path
 * @return string
 */
function url(string $path = null): string
{
    if($path) {
        return CONF_URL_BASE . "/{$path}";
    }

    return CONF_URL_BASE;
}

// ###      ASSETS     ###

function theme(string $path = null, string $theme = CONF_VIEW_THEME): string
{
    if(strpos($_SERVER['HTTP_HOST'], "localhost") || $_SERVER['HTTP_HOST'] == 'localhost'){
        if($path){
            return CONF_URL_TEST . "/themes/{$theme}/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
        }
        return CONF_URL_TEST . "/themes/{$theme}";
    }
    if($path){
        return CONF_URL_BASE . "/themes/{$theme}/" . ($path[0] == "/" ? mb_substr($path, 1) : $path);
    }
    return CONF_URL_BASE . "/themes/{$theme}";
}

function uploadImage ($img) : string
{
  $image = new Image(CONF_UPLOAD_DIR, CONF_UPLOAD_IMAGE_DIR);
  return $image->upload($img,md5(time()));
}

function uploadMultipleImages ($images){
  $image = new Image(CONF_UPLOAD_DIR, CONF_UPLOAD_IMAGE_DIR);
  try {
    foreach ($image->multiple("images", $images) as $file) {
      $image->upload($file, md5(time()));
    }
    echo "Success!";
  } catch (Exception $e) {
    echo "<p>(!) {$e->getMessage()}</p>";
  }
}
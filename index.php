<?php
session_start();
ob_start();

require __DIR__ . "/vendor/autoload.php";
use CoffeeCode\Router\Router;

$route = new Router(CONF_URL_BASE, ":");

/**
 * Web Routes
 */

$route->namespace("Source\App");
$route->get("/","Web:home");
$route->get("/sobre","Web:about");
//$route->get("/projeto","Web:project");
$route->get("/contato","Web:contact");
$route->post("/contato","Web:contact");

/**
 *  REGISTER LOGIN
 */
$route->get("/cadastrar","Web:register");
$route->post("/cadastrar","Web:register");

$route->get("/login","Web:login");
$route->post("/login","Web:login");

$route->get('/faq', 'Web:faq');
$route->post('/faq', 'Web:faq');

/**
 * App Routs
 */

$route->group("/app"); // agrupa em /app
$route->get("/", "App:home");
$route->get("/sair","App:logout");

$route->get("/criar", "App:criar");
$route->post("/criar", "App:criar");

$route->get("/home", "App:home");
$route->post("/home", "App:home");

$route->get("/perfil", "App:profile");
$route->post("/perfil", "App:profileUpdate");

$route->group(null); // desagrupo do /app

/*
 * Erros Routes
 */

$route->group("error")->namespace("Source\App");
$route->get("/{errcode}", "Web:error");

$route->dispatch();

/*
 * Error Redirect
 */

if ($route->error()) {
    $route->redirect("/error/{$route->error()}");
}

ob_end_flush();
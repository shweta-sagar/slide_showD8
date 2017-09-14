<?php
use Drupal\Core\DrupalKernel;
use Symfony\Component\HttpFoundation\Request;

$autoloader = require_once 'autoload.php';

$kernel = new DrupalKernel('prod', $autoloader);

$request = Request::createFromGlobals();
$response = $kernel->handle($request);

$current_path = \Drupal::service('path.current')->getPath();
$path_args = explode('/', $current_path);
print_r($current_path);
print_r($path_args);
$node = node_load(10);
print_r('<pre>');
// print_r($node);
// print_r($node->get('field_slider_type')->getValue());
// print_r($node->field_slider_type->getValue());

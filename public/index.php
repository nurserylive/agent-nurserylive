<?php
require_once('../config/constant.php');
require_once(SRC_DIR . '/Resource.php');

require_once 	'../Slim-2.6.2/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new Slim\Slim();

// Get
$app->get('/:resource(/(:id)(/))', function($resource, $id = null) {
    $resource = Resource::load($resource);
    if ($resource === null) {
        Resource::response(Resource::STATUS_NOT_FOUND);
    } else {
		echo 'came here';
        $resource->get($id);
    }
});

// Post
$app->post('/:resource(/)', function($resource) {
    $resource = Resource::load($resource);
    if ($resource === null) {
        Resource::response(Resource::STATUS_NOT_FOUND);
    } else {
        $resource->post();
    }
});

// Put
$app->put('/:resource/:id(/)', function($resource, $id = null) {
    $resource = Resource::load($resource);
    if ($resource === null) {
        Resource::response(Resource::STATUS_NOT_FOUND);
    } else {
        $resource->put($id);
    }
});

// Delete
$app->delete('/:resource/:id(/)', function($resource, $id = null) {
    $resource = Resource::load($resource);
    if ($resource === null) {
        Resource::response(Resource::STATUS_NOT_FOUND);
    } else {
        $resource->delete($id);
    }
});

// Options
$app->options('/:resource(/)', function($resource, $id = null) {
    $resource = Resource::load($resource);
    if ($resource === null) {
        Resource::response(Resource::STATUS_NOT_FOUND);
    } else {
        $resource->options();
    }
});

// Not found
$app->notFound(function() {
    Resource::response(Resource::STATUS_NOT_FOUND);
});

$app->run();
?>

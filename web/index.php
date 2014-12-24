<?php
/**
 * Created by PhpStorm.
 * User: Marco Ferrari <marco.msg.ferrari@gmail.com>
 * Date: 2/12/14
 * Time: 14:18
 */

require_once '../vendor/autoload.php';

use Assetic\AssetWriter;
use Assetic\Extension\Twig\AsseticExtension;
use Assetic\Extension\Twig\TwigFormulaLoader;
use Assetic\Extension\Twig\TwigResource;
use Assetic\Factory\AssetFactory;
use Assetic\Factory\LazyAssetManager;
use Assetic\Factory\Worker\CacheBustingWorker;

$factory = new AssetFactory('./assets/');
$factory->addWorker(new CacheBustingWorker());

$loader = new Twig_Loader_Filesystem(['./', '../templates']);
$twig = new Twig_Environment($loader);
$twig->addExtension(new AsseticExtension($factory));

$template = $twig->loadTemplate('index.html.twig');
$am = new LazyAssetManager($factory);
$am->setLoader('twig', new TwigFormulaLoader($twig));

$templates = [
    'index.html.twig',
    'template.html.twig'
];
foreach ($templates as $templ) {
    $resource = new TwigResource($loader, $templ);
    $am->addResource($resource, 'twig');
}

$resource = new TwigResource($loader, 'index.html.twig');
$am->addResource($resource, 'twig');

$writer = new AssetWriter('./');
$writer->writeManagerAssets($am);

echo $template->render([]);

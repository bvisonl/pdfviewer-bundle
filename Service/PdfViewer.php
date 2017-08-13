<?php

namespace Bvisonl\PdfViewerBundle\Service;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Routing\Router;
use Symfony\Component\Templating\EngineInterface;

class PdfViewer {

    /** @var ContainerAwareInterface $container */
    private $container;

    /** @var EngineInterface $templating */
    private $templating;

    /** @var Router $router */
    private $router;

    public function __construct(ContainerInterface $container, EngineInterface $templating, Router $router) {
        $this->container = $container;
        $this->templating = $templating;
        $this->router = $router;
    }

    public function viewFromRoute($route, $params) {

        $pdf = $this->router->generate($route, $params);

        return $this->templating->render('BvisonlPdfViewerBundle:Viewer:viewer.html.twig', array(
            'file' => $pdf
        ));
    }
}
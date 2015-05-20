<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // exam_tp1_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'exam_tp1_default_index')), array (  '_controller' => 'Exam\\tp1Bundle\\Controller\\DefaultController::indexAction',));
        }

        // Ajouter
        if (rtrim($pathinfo, '/') === '/Ajouter') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'Ajouter');
            }

            return array (  '_controller' => 'Exam\\tp1Bundle\\Controller\\DefaultController::ajouterAction',  '_route' => 'Ajouter',);
        }

        // afficher
        if (rtrim($pathinfo, '/') === '/afficher') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'afficher');
            }

            return array (  '_controller' => 'Exam\\tp1Bundle\\Controller\\DefaultController::afficherAction',  '_route' => 'afficher',);
        }

        // consulter
        if (0 === strpos($pathinfo, '/consulter') && preg_match('#^/consulter/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'consulter')), array (  '_controller' => 'Exam\\tp1Bundle\\Controller\\DefaultController::ConsulterAction',));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}

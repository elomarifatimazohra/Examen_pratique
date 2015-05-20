<?php

namespace Exam\tp1Bundle\Controller;

use Exam\tp1Bundle\Entity\Tache;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}")
     * @Template()
     */
    public function indexAction($name)
    {
        return array('name' => $name);
    }
    /**
     * @Route("/Ajouter/ ", name="Ajouter")
     * @Template()
     */
    public function ajouterAction(\Symfony\Component\HttpFoundation\Request $request)
    {
        $p=new Tache();


        $form=$this->createFormBuilder($p)
            ->add('titre','text')
            ->add('description','text')
            ->add('date','datetime')

            ->add('Valider','submit')
            ->add('Retour','submit')
            ->getForm();
        $form->handleRequest($request);



        if($form->isValid())
        {//$a=$form->getData(id);
            $em=$this->getDoctrine()->getManager();
            $em->persist($p);
            $em->flush($p);
            return $this->redirect($this->generateUrl("afficher"));
        }


        return array('f' => $form->createView() );
    }

    /**
     * @Route("/afficher/ " , name="afficher")
     * @Template()
     */
    public function afficherAction()
    {

        $tache=$this->getDoctrine()->getRepository("tacheBundle:Tache")->findAll();

        return array('Tache' => $tache );
    }
    /**
     * @Route("/consulter/{id} " , name="consulter")
     * @Template()
     */
    public function ConsulterAction($id)
    {
        $p= new Tache();




        $em = $this->getDoctrine()->getManager();
        $tache = $em->getRepository('tacheBundle:Tache')->findOneBy(array('id' => $id));




        return array('Tache' => $tache ,'id'=>$id);
    }




}

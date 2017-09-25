<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cylindree;
use AppBundle\Entity\Modele;
use AppBundle\Entity\Puissance;
use AppBundle\Entity\Type_moteur;
use AppBundle\Form\CylindreeForm;
use AppBundle\Form\ModeleForm;
use AppBundle\Form\PuissanceForm;
use AppBundle\Form\TypeMoteurForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use AppBundle\Entity\Marque;
use AppBundle\Form\MarqueForm;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $dql = "SELECT m "
            . "FROM AppBundle:Marque m " ;
        $query = $em->createQuery($dql);
        $results = $query->getResult();
        return $this->render("default/dash.html.twig",array('pagination' => $results));
    }

    public function indexModeleAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $dql = "SELECT m "
            . "FROM AppBundle:Modele m " ;
        $query = $em->createQuery($dql);
        $results = $query->getResult();
        return $this->render("default/modele.html.twig",array('pagination' => $results));
    }

    public function indexCylindreeAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $dql = "SELECT m "
            . "FROM AppBundle:Cylindree m " ;
        $query = $em->createQuery($dql);
        $results = $query->getResult();
        return $this->render("default/cylindree.html.twig",array('pagination' => $results));
    }

    public function indexPuissanceAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $dql = "SELECT m "
            . "FROM AppBundle:Puissance m " ;
        $query = $em->createQuery($dql);
        $results = $query->getResult();
        return $this->render("default/puissance.html.twig",array('pagination' => $results));
    }

    public function indexTypeMoteurAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $dql = "SELECT m "
            . "FROM AppBundle:Type_moteur  m " ;
        $query = $em->createQuery($dql);
        $results = $query->getResult();
        return $this->render("default/typeMoteur.html.twig",array('pagination' => $results));
    }

    public function ajoutMarqueAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $marque = new Marque();
        $form = $this->createForm(MarqueForm::class, $marque);
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            $file = $marque->getFile();
            if($file!=null)
            {
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                // Move the file to the directory where brochures are stored
                $file->move($this->container->getParameter('kernel.root_dir').'/../web/image/marque',
                    $fileName
                );
                $marque->setLogo($fileName);
                $marque->setFile(null);
            }
            $em->persist($marque);
            $em->flush();
            $flash = array(
                'key' => 'success',
                'title' => 'Succès',
                'msg' => "Marque ajoutée avec succés");
            $this->setFlash($flash);
            return $this->redirect($this->generateUrl('kalitys_crm_homepage'));
        }
        return $this->render('default/ajoutMarque.html.twig', array('form' => $form->createView(),'logo'=>null));
    }

    public function ajoutModeleAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $modele = new Modele();
        $form = $this->createForm(ModeleForm::class, $modele);
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            $file = $modele->getFile();
            if($file!=null)
            {
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                // Move the file to the directory where brochures are stored
                $file->move($this->container->getParameter('kernel.root_dir').'/../web/image/modele',
                    $fileName
                );
                $modele->setLogo($fileName);
                $modele->setFile(null);
            }
            $em->persist($modele);
            $em->flush();
            $flash = array(
                'key' => 'success',
                'title' => 'Succès',
                'msg' => "Marque ajoutée avec succés");
            $this->setFlash($flash);
            return $this->redirect($this->generateUrl('kalitys_crm_modele'));
        }
        return $this->render('default/ajoutModele.html.twig', array('form' => $form->createView(),'logo'=>null));
    }

    public function ajoutCylindreeAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $cylindree = new Cylindree();
        $form = $this->createForm(CylindreeForm::class, $cylindree);
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            $file = $cylindree->getFile();
            if($file!=null)
            {
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                // Move the file to the directory where brochures are stored
                $file->move($this->container->getParameter('kernel.root_dir').'/../web/image/cylindree',
                    $fileName
                );
                $cylindree->setLogo($fileName);
                $cylindree->setFile(null);
            }
            $em->persist($cylindree);
            $em->flush();
            $flash = array(
                'key' => 'success',
                'title' => 'Succès',
                'msg' => "Cylindrée ajoutée avec succés");
            $this->setFlash($flash);
            return $this->redirect($this->generateUrl('kalitys_crm_cylindree'));
        }
        return $this->render('default/ajoutCylindree.html.twig', array('form' => $form->createView(),'logo'=>null));
    }

    public function ajoutPuissanceAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $puissance = new Puissance();
        $form = $this->createForm(PuissanceForm::class, $puissance);
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            $file = $puissance->getFile();
            if($file!=null)
            {
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                // Move the file to the directory where brochures are stored
                $file->move($this->container->getParameter('kernel.root_dir').'/../web/image/puissance',
                    $fileName
                );
                $puissance->setLogo($fileName);
                $puissance->setFile(null);
            }
            $em->persist($puissance);
            $em->flush();
            $flash = array(
                'key' => 'success',
                'title' => 'Succès',
                'msg' => "Puissance ajoutée avec succés");
            $this->setFlash($flash);
            return $this->redirect($this->generateUrl('kalitys_crm_puissance'));
        }
        return $this->render('default/ajoutPuissance.html.twig', array('form' => $form->createView(),'logo'=>null));
    }

    public function ajoutTypeMoteurAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $type = new Type_moteur();
        $form = $this->createForm(TypeMoteurForm::class, $type);
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            $file = $type->getFile();
            if($file!=null)
            {
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                // Move the file to the directory where brochures are stored
                $file->move($this->container->getParameter('kernel.root_dir').'/../web/image/typeMoteur',
                    $fileName
                );
                $type->setLogo($fileName);
                $type->setFile(null);
            }
            $em->persist($type);
            $em->flush();
            $flash = array(
                'key' => 'success',
                'title' => 'Succès',
                'msg' => "Type Moteur ajoutée avec succés");
            $this->setFlash($flash);
            return $this->redirect($this->generateUrl('kalitys_crm_type_moteur'));
        }
        return $this->render('default/ajoutTypeMoteur.html.twig', array('form' => $form->createView(),'logo'=>null));
    }

    protected function setFlash($value) {
        $this->container->get('session')->getFlashBag()->add('alert', $value);
    }

    public function deleteMarqueAction(Request $request , $id){
        $em = $this->getDoctrine()->getManager();
        $marque = $em->getRepository('AppBundle:Marque')->find($id);
        $em->remove($marque);
        $em->flush();
        return $this->redirect($this->generateUrl("kalitys_crm_homepage"));
    }

    public function deleteModeleAction(Request $request , $id){
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('AppBundle:Modele')->find($id);
        $em->remove($modele);
        $em->flush();
        return $this->redirect($this->generateUrl("kalitys_crm_modele"));
    }

    public function deleteCylindreeAction(Request $request , $id){
        $em = $this->getDoctrine()->getManager();
        $cylindree = $em->getRepository('AppBundle:Cylindree')->find($id);
        $em->remove($cylindree);
        $em->flush();
        return $this->redirect($this->generateUrl("kalitys_crm_cylindree"));
    }

    public function deletePuissanceAction(Request $request , $id){
        $em = $this->getDoctrine()->getManager();
        $puissance = $em->getRepository('AppBundle:Puissance')->find($id);
        $em->remove($puissance);
        $em->flush();
        return $this->redirect($this->generateUrl("kalitys_crm_puissance"));
    }

    public function deleteTypeMoteurAction(Request $request , $id){
        $em = $this->getDoctrine()->getManager();
        $type = $em->getRepository('AppBundle:Type_moteur')->find($id);
        $em->remove($type);
        $em->flush();
        return $this->redirect($this->generateUrl("kalitys_crm_type_moteur"));
    }

    public function updateMarqueAction(Request $request,$id) {
        $em = $this->getDoctrine()->getManager();
        $marque = $em->getRepository('AppBundle:Marque')->find($id);
        $form = $this->createForm(MarqueForm::class, $marque);
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            $file = $marque->getFile();
            if($file!=null)
            {
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                // Move the file to the directory where brochures are stored
                $file->move($this->container->getParameter('kernel.root_dir').'/../web/image/marque',
                    $fileName
                );
                $marque->setLogo($fileName);
                $marque->setFile(null);
            }
            $em->persist($marque);
            $em->flush();
            $flash = array(
                'key' => 'success',
                'title' => 'Succès',
                'msg' => "Marque modofiée avec succés");
            $this->setFlash($flash);
            return $this->redirect($this->generateUrl("kalitys_crm_homepage"));

        }
        return $this->render('default/ajoutMarque.html.twig', array('form' => $form->createView(),'logo'=>$marque->getLogo()));
    }

    public function updateModeleAction(Request $request,$id) {
        $em = $this->getDoctrine()->getManager();
        $modele = $em->getRepository('AppBundle:Modele')->find($id);
        $form = $this->createForm(ModeleForm::class, $modele);
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            $file = $modele->getFile();
            if($file!=null)
            {
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                // Move the file to the directory where brochures are stored
                $file->move($this->container->getParameter('kernel.root_dir').'/../web/image/modele',
                    $fileName
                );
                $modele->setLogo($fileName);
                $modele->setFile(null);
            }
            $em->persist($modele);
            $em->flush();
            $flash = array(
                'key' => 'success',
                'title' => 'Succès',
                'msg' => "Modèle modofiée avec succés");
            $this->setFlash($flash);
            return $this->redirect($this->generateUrl("kalitys_crm_modele"));

        }
        return $this->render('default/ajoutModele.html.twig', array('form' => $form->createView(),'logo'=>$modele->getLogo()));
    }

    public function updateCylindreeAction(Request $request,$id) {
        $em = $this->getDoctrine()->getManager();
        $cylindree = $em->getRepository('AppBundle:Cylindree')->find($id);
        $form = $this->createForm(CylindreeForm::class, $cylindree);
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            $file = $cylindree->getFile();
            if($file!=null)
            {
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                // Move the file to the directory where brochures are stored
                $file->move($this->container->getParameter('kernel.root_dir').'/../web/image/cylindree',
                    $fileName
                );
                $cylindree->setLogo($fileName);
                $cylindree->setFile(null);
            }
            $em->persist($cylindree);
            $em->flush();
            $flash = array(
                'key' => 'success',
                'title' => 'Succès',
                'msg' => "Cylindée modofiée avec succés");
            $this->setFlash($flash);
            return $this->redirect($this->generateUrl("kalitys_crm_cylindree"));

        }
        return $this->render('default/ajoutCylindree.html.twig', array('form' => $form->createView(),'logo'=>$cylindree->getLogo()));
    }

    public function updatePuissanceAction(Request $request,$id) {
        $em = $this->getDoctrine()->getManager();
        $puissance = $em->getRepository('AppBundle:Puissance')->find($id);
        $form = $this->createForm(CylindreeForm::class, $puissance);
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            $file = $puissance->getFile();
            if($file!=null)
            {
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                // Move the file to the directory where brochures are stored
                $file->move($this->container->getParameter('kernel.root_dir').'/../web/image/puissance',
                    $fileName
                );
                $puissance->setLogo($fileName);
                $puissance->setFile(null);
            }
            $em->persist($puissance);
            $em->flush();
            $flash = array(
                'key' => 'success',
                'title' => 'Succès',
                'msg' => "Puissance modofiée avec succés");
            $this->setFlash($flash);
            return $this->redirect($this->generateUrl("kalitys_crm_puissance"));

        }
        return $this->render('default/ajoutCylindree.html.twig', array('form' => $form->createView(),'logo'=>$puissance->getLogo()));
    }

    public function updateTypeMoteurAction(Request $request,$id) {
        $em = $this->getDoctrine()->getManager();
        $type = $em->getRepository('AppBundle:Type_moteur')->find($id);
        $form = $this->createForm(TypeMoteurForm::class, $type);
        if ($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            $file = $type->getFile();
            if($file!=null)
            {
                $fileName = md5(uniqid()).'.'.$file->guessExtension();
                // Move the file to the directory where brochures are stored
                $file->move($this->container->getParameter('kernel.root_dir').'/../web/image/typeMoteur',
                    $fileName
                );
                $type->setLogo($fileName);
                $type->setFile(null);
            }
            $em->persist($type);
            $em->flush();
            $flash = array(
                'key' => 'success',
                'title' => 'Succès',
                'msg' => "Type moteur modofiée avec succés");
            $this->setFlash($flash);
            return $this->redirect($this->generateUrl("kalitys_crm_type_moteur"));

        }
        return $this->render('default/ajoutTypeMoteur.html.twig', array('form' => $form->createView(),'logo'=>$type->getLogo()));
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Client;
use App\Entity\Produit;
use App\Entity\Technicien;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
class GestionController extends AbstractController
{
    /**
     * @Route("/gestion1", name="app_acceuil1")
     */
    public function indexCl(): Response
    { $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(client::class);
        $lesClients = $repo->findAll();
        return $this->render('gestion/indexCl.html.twig', ['lesClients' =>$lesClients]);
}
 /**
     * @Route("/gestion11", name="app_acceuil11")
     */
    public function indexCl2(): Response
    { $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(client::class);
        $lesClients = $repo->findAll();
        return $this->render('gestion/indexCl2.html.twig', ['lesClients' =>$lesClients]);
}

 /**
     * @Route("/gestion2", name="app_acceuil2")
     */
    public function indexP(): Response
    { $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(produit::class);
        $lesProduits = $repo->findAll();
        return $this->render('gestion/indexP.html.twig', ['lesProduits' =>$lesProduits]);
}
 /**
     * @Route("/gestion22", name="app_acceuil22")
     */
    public function indexP2(): Response
    { $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(produit::class);
        $lesProduits = $repo->findAll();
        return $this->render('gestion/indexP2.html.twig', ['lesProduits' =>$lesProduits]);
}
/**
     * @Route("/gestion3", name="app_acceuil3")
     */
    public function indexT(): Response
    { $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(technicien::class);
        $lesTechniciens = $repo->findAll();
        return $this->render('gestion/indexT.html.twig', ['lesTechniciens' =>$lesTechniciens]);
}
/**
     * @Route("/gestion33", name="app_acceuil33")
     */
    public function indexT2(): Response
    { $em = $this->getDoctrine()->getManager();
        $repo = $em->getRepository(technicien::class);
        $lesTechniciens = $repo->findAll();
        return $this->render('gestion/indexT2.html.twig', ['lesTechniciens' =>$lesTechniciens]);
}
     /**
     * @Route("/home", name="gestion_home")
     */
    public function home(): Response
    {
        return $this->render('gestion/home.html.twig', [
            'controller_name' => 'GestionController',
        ]);
    }

     /**
     * @Route("/gestion/login", name="gestion_login")
     */
    public function login(): Response
    {
        return $this->render('gestion/login.html.twig', [
            'controller_name' => 'GestionController',
        ]);
    }
      /**
     * @Route("/gestion/login1", name="gestion_login2")
     */
    public function login1(): Response
    {
        return $this->render('gestion/login2.html.twig', [
            'controller_name' => 'GestionController',
        ]);
    }
     /**
     * @Route("/gestion/ajouter1", name="gestion_ajouter1")
     */
    public function ajouter1(Request $request)
    {
         $client = new client();
         $fb= $this->createFormBuilder($client)
         ->add('codeclt', TextType::class)
         ->add('nom', TextType::class)
         ->add('prenom', TextType::class)
         ->add('adresse',TextType::class)
         ->add('CP', TextType::class)
         ->add('Valider', SubmitType::class);
         $form = $fb->getForm();
        
         $form->handleRequest($request);
         if($form->isSubmitted()) {
         $em = $form ->getData() ;
         $em=$this->getDoctrine()->getManager();
         $em->persist($client);
         $em->flush();
         $session = new Session();
         $session->getFlashBag()->add('notice','client bien ajouté');
         return $this->redirectToRoute('app_acceuil1');
        }
       
        // Utiliser la méthode createView() pour que l'objet soit exploitable par la vue
         return $this->render('gestion/ajouterCl.html.twig', ['f' => $form->createView()]);
        }
         /**
     * @Route("/gestion/ajouter2", name="gestion_ajouter2")
     */
    public function ajouter2(Request $request)
    {
         $produit = new produit();
         $fb= $this->createFormBuilder($produit)
         ->add('designation', TextType::class)
         ->add('prix', TextType::class)
         ->add('Valider', SubmitType::class);
         $form = $fb->getForm();
        
         $form->handleRequest($request);
         if($form->isSubmitted()) {
         $em = $form ->getData() ;
         $em=$this->getDoctrine()->getManager();
         $em->persist($produit);
         $em->flush();
         $session = new Session();
         $session->getFlashBag()->add('notice','produit bien ajouté');
         return $this->redirectToRoute('app_acceuil2');
        }
        
        // Utiliser la méthode createView() pour que l'objet soit exploitable par la vue
         return $this->render('gestion/ajouterP.html.twig', ['f' => $form->createView()]);
        }
         /**
     * @Route("/gestion/ajouter3", name="gestion_ajouter3")
     */
    public function ajouter3(Request $request)
    {
         $technicien = new technicien();
         $fb= $this->createFormBuilder($technicien)
         ->add('nom', TextType::class)
         ->add('prenom', TextType::class)
         ->add('Valider', SubmitType::class);
         $form = $fb->getForm();
        
         $form->handleRequest($request);
         if($form->isSubmitted()) {
         $em = $form ->getData() ;
         $em=$this->getDoctrine()->getManager();
         $em->persist($technicien);
         $em->flush();
         $session = new Session();
         $session->getFlashBag()->add('notice','technicien bien ajouté');
         return $this->redirectToRoute('app_acceuil3');
        }
       
        // Utiliser la méthode createView() pour que l'objet soit exploitable par la vue
         return $this->render('gestion/ajouterT.html.twig', ['f' => $form->createView()]);
        }
        
    /**
     * @Route("/gestion/voir1/{id}", name="gestion_voir1")
     */
    public function voir1($id){
        $em = $this->getDoctrine()->getManager();
        $repo=$em->getRepository(client::class);
        // On récupère les données de l'abonné
        $client=$repo->find($id);
        // S'il n'exite pas on lance une exception (erreur 404)
        if($client == null)
        throw $this->createNotFoundException("404- client $id inéxistant !");
        // On le passe à la vue pour l'afficher
        return $this->render('gestion/voirCl.html.twig', ["client"=>$client ]);
    }
    /**
     * @Route("/gestion/voir/{id}", name="gestion_voir11")
     */
    public function voir11($id){
        $em = $this->getDoctrine()->getManager();
        $repo=$em->getRepository(client::class);
        // On récupère les données de l'abonné
        $client=$repo->find($id);
        // S'il n'exite pas on lance une exception (erreur 404)
        if($client == null)
        throw $this->createNotFoundException("404- client $id inéxistant !");
        // On le passe à la vue pour l'afficher
        return $this->render('gestion/voirC2.html.twig', ["client"=>$client ]);
    }
    /**
     * @Route("/gestion/voir2/{id}", name="gestion_voir2")
     */
    public function voir2($id){
        $em = $this->getDoctrine()->getManager();
        $repo=$em->getRepository(produit::class);
        // On récupère les données de l'abonné
        $produit=$repo->find($id);
        // S'il n'exite pas on lance une exception (erreur 404)
        if($produit == null)
        throw $this->createNotFoundException("404- produit $id inéxistant !");
        // On le passe à la vue pour l'afficher
        return $this->render('gestion/voirP.html.twig', ["produit"=>$produit ]);
    }
    /**
     * @Route("/gestion/voir22/{id}", name="gestion_voir22")
     */
    public function voir22($id){
        $em = $this->getDoctrine()->getManager();
        $repo=$em->getRepository(produit::class);
        // On récupère les données de l'abonné
        $produit=$repo->find($id);
        // S'il n'exite pas on lance une exception (erreur 404)
        if($produit == null)
        throw $this->createNotFoundException("404- produit $id inéxistant !");
        // On le passe à la vue pour l'afficher
        return $this->render('gestion/voirP2.html.twig', ["produit"=>$produit ]);
    }
        
    /**
     * @Route("/gestion/voir3/{id}", name="gestion_voir3")
     */
    public function voir3($id){
        $em = $this->getDoctrine()->getManager();
        $repo=$em->getRepository(technicien::class);
        // On récupère les données de l'abonné
        $technicien=$repo->find($id);
        // S'il n'exite pas on lance une exception (erreur 404)
        if($technicien == null)
        throw $this->createNotFoundException("404- technicien $id inéxistant !");
        // On le passe à la vue pour l'afficher
        return $this->render('gestion/voirT.html.twig', ["technicien"=>$technicien ]);
    }
           
    /**
     * @Route("/gestion/voir33/{id}", name="gestion_voir33")
     */
    public function voir33($id){
        $em = $this->getDoctrine()->getManager();
        $repo=$em->getRepository(technicien::class);
        // On récupère les données de l'abonné
        $technicien=$repo->find($id);
        // S'il n'exite pas on lance une exception (erreur 404)
        if($technicien == null)
        throw $this->createNotFoundException("404- technicien $id inéxistant !");
        // On le passe à la vue pour l'afficher
        return $this->render('gestion/voirT2.html.twig', ["technicien"=>$technicien ]);
    }
    /**
     * @Route("/gestion/supprimer1/{id}", name="gestion_supprimer1")
     */
    public function supprimerCl($id)
    {$em = $this->getDoctrine()->getManager();
        $item = $em->getRepository(client::class)->find($id);
        $em->remove($item);
        $em->flush();
        $session =new Session();
        $session->getFlashBag()->add('notice', "Le client $id a bien supprimé");
        return $this->redirectToRoute('app_acceuil1');
    }
    /**
     * @Route("/gestion/supprimer2/{id}", name="gestion_supprimer2")
     */
    public function supprimerP($id)
    {$em = $this->getDoctrine()->getManager();
        $item = $em->getRepository(produit::class)->find($id);
        $em->remove($item);
        $em->flush();
        $session =new Session();
        $session->getFlashBag()->add('notice', "Le produit $id a bien supprimé");
        return $this->redirectToRoute('app_acceuil2');
    }
    /**
     * @Route("/gestion/supprimer3/{id}", name="gestion_supprimer3")
     */
    public function supprimerT($id)
    {$em = $this->getDoctrine()->getManager();
        $item = $em->getRepository(technicien::class)->find($id);
        $em->remove($item);
        $em->flush();
        $session =new Session();
        $session->getFlashBag()->add('notice', "Le technicien $id a bien supprimé");
        return $this->redirectToRoute('app_acceuil3');
    }
     /**
     * @Route("/gestion/modifier1/{id}", name="gestion_modifier1")
     * Method({"GET", "POST"})
     */
    public function ModifierCl($id,Request $request) {
        $client = new client();
        $client = $this->getDoctrine()->getRepository(client::class)->find($id);
        $form = $this->createFormBuilder($client)
        ->add('codeclt', TextType::class)
        ->add('nom', TextType::class)
        ->add('prenom', TextType::class)
        ->add('adresse', TextType::class)
        ->add('CP', TextType::class)
        ->add('Valider', SubmitType::class);
        
        $form = $form->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
  
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->flush();
  
          return $this->redirectToRoute('app_acceuil1');
        }
  
        return $this->render('gestion/modifierCl.html.twig', ['f' => $form->createView()]);
      }
      /**
     * @Route("/gestion/modifier2/{id}", name="gestion_modifier2")
     * Method({"GET", "POST"})
     */
    public function ModifierP($id,Request $request) {
        $produit = new produit();
        $produit = $this->getDoctrine()->getRepository(produit::class)->find($id);
        $form = $this->createFormBuilder($produit)
        ->add('designation', TextType::class)
        ->add('prix', TextType::class)
        ->add('Valider', SubmitType::class);
        
        $form = $form->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
  
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->flush();
        
          return $this->redirectToRoute('app_acceuil2');
        }
  
        return $this->render('gestion/modifierP.html.twig', ['f' => $form->createView()]);
      }
      /**
     * @Route("/gestion/modifier3/{id}", name="gestion_modifier3")
     * Method({"GET", "POST"})
     */
    public function ModifierT($id,Request $request) {
        $technicien = new technicien();
        $technicien = $this->getDoctrine()->getRepository(technicien::class)->find($id);
        $form = $this->createFormBuilder($technicien)
        ->add('nom', TextType::class)
        ->add('prenom', TextType::class)
        ->add('Valider', SubmitType::class);
        
        $form = $form->getForm();
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
  
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->flush();
  
          return $this->redirectToRoute('app_acceuil3');
        }
  
        return $this->render('gestion/modifierT.html.twig', ['f' => $form->createView()]);
      }

}


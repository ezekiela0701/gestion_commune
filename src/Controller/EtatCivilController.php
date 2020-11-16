<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

use App\Entity\Identite;
use App\Form\IdentiteType;
use App\Repository\IdentiteRepository;

use App\Entity\Utilisateur;
use App\Form\ModifierUtilisateurType;
use App\Form\UtilisateurType;
use App\Repository\UtilisateurRepository;

/**
 * @IsGranted("ROLE_ADMIN")
 */
class EtatCivilController extends AbstractController
{

    /**
     * @Route("/" , name="utilisateur")
     */
    public function Utilisateur(Utilisateur $utilisateur=null ){
        $select=$this->getDoctrine()->getRepository(Utilisateur::class);
        $liste=$select->FindAll();
        return $this->render("etat_civil/utilisateur.html.twig" , [
            'ListeUtilisateur' => $liste
        ] );
    }

    /**
     * @Route("/utilisateur/modifier/{id}" , name="modifier_utilisateur")
     */
    public function modifierUtilisateur(Utilisateur $utilisateur=null , Request $request , ObjectManager $manager , $id){
        if(!$utilisateur){
            $utilisateur=new Utilisateur();
        }
        $formUtilisateur=$this->createForm(ModifierUtilisateurType::class , $utilisateur) ; 
        
        $formUtilisateur->handleRequest($request);
        if($formUtilisateur->isSubmitted() && $formUtilisateur->isValid())
        {
            $manager->refresh($utilisateur) ; 
            $manager->flush() ; 
            return $this->redirectToRoute("utilisateur");
        }

        return $this->render("etat_civil/modifier_utilisateur.html.twig" , [
            'ModifierView' => $formUtilisateur->createView() 
        ]) ; 
    }

    /**
     * @Route("/utilisateur/reinitialiser/{id}" , name="reinitialiser_utilisateur")
     */
    public function reinitialiserMdpUtilisateur(){
        return null;
    }

    /**
     * @Route("/utilisateur/supprimer/{id}" , name="supprimer_utilisateur" )
     */
    public function supprimerUtilisateur(Utilisateur $utilisateur=null  , ObjectManager $manager , $id){
        $tirer=$this->getDoctrine()->getRepository(Utilisateur::class); 
        $supprimer=$tirer->findById($id) ; 

        $manager->remove($utilisateur) ; 
        $manager->flush();
        return $this->redirectToRoute("utilisateur"); 

    }


    /**
     * @Route("/etat_civil", name="etat_civil")
     */
    public function EtatCivil(Identite $identite=null , ObjectManager $manager , Request $request)
    {
        if(!$identite){
            $identite=new Identite();
        }
        $form=$this->createForm(IdentiteType::class , $identite);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($identite) ;
            $manager->flush();
            $this->redirectToRoute('etat_civil');
        }
        $trier=$this->getDoctrine()->getRepository(Identite::class);
        $liste=$trier->findAll();
        return $this->render('etat_civil/index.html.twig', [
            'controller_name' => 'EtatCivilController',
            'IdentiteView' => $form->createView(),
            'ListeIdentite' => $liste
        ]);
    }

    /**
     * @Route("/etat_civil/information/{id}" , name="information_personnel")
     */
    public function information_personnel(Identite $identite , $id){
        $liste=$this->getDoctrine()->getRepository(Identite::class);
        $personnel=$liste->findById($id);
        $datenaissance=$liste->findDate($id);
        $today=strtotime(date("Y-m-d"));
        
        // $age=abs(strtotime($donne['fintraitement'])-strtotime($donne['debuttraitement']))
        return $this->render('etat_civil/information_personnel.html.twig' , [
            'Information_personnel' => $personnel , 
            // 'Androany' => $datenaissance 

            // 'test' => $test
            
        ]);
    }

    /**
     * @Route("/etat_civil/modifier/{id}" , name="modifier_information")
     */
    public function modifier_information($id , ObjectManager $manager , Request $request , Identite $identite=null){
        if(!$identite){
            $identite=new Identite();
        }
        $form=$this->createForm(IdentiteType::class , $identite) ; 
        $form->handleRequest($request); 
        
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($identite) ;
            $manager->flush();
            return $this->redirectToRoute('information_personnel' , ['id' => $id]);
        }
        
        return $this->render('etat_civil/modifier_information.html.twig' , [
            'ModificationView' => $form->createView()
        ]);
    }
    /**
     * @Route("/etat_civil/supprimer/{id}" , name="supprimer_personnel")
     * @IsGranted("ROLE_ADMIN")
     */
    public function supprimer_personnel($id , ObjectManager $manager , Request $request , Identite $identite){
        $tirer=$this->getDoctrine()->getRepository(Identite::class) ; 
        $supprimer=$tirer->findById($id) ; 
        $manager->remove($identite) ; 
        $manager->flush();
        return $this->redirectToRoute('etat_civil');

    }
}

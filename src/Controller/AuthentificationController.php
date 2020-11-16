<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;


use App\Form\AuthentificationType;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use App\Repository\UtilisateurRepository;

class AuthentificationController extends AbstractController
{
    /**
     * @Route("/inscription" , name="inscription")
     */
    public function inscription(ObjectManager $manager , Request $request , Utilisateur $utilisateur=null , UserPasswordEncoderInterface $encoder)
    {
        if(!$utilisateur){
            $utilisateur=new Utilisateur();
        }
        $form=$this->createForm(UtilisateurType::class , $utilisateur);
        $form->handleRequest($request) ;
        if($form->isSubmitted() && $form->isValid())
        {
            $hash=$encoder->encodePassword($utilisateur , $utilisateur->getPassword());
            $utilisateur->setPassword($hash);
            $utilisateur->setIsActive(true);
            $utilisateur->addRole("ROLE_ADMIN");
            $manager->persist($utilisateur) ; 
            $manager->flush();
            return $this->redirectToRoute('authentification');
        }
        return $this->render('authentification/inscription.hml.twig' , [
            'InscriptionView' => $form->createView() , 
            'mainNavRegistration' => true
        ]);
    }

    /**
     * @Route("/connexion", name="authentification")
     */
    public function login(AuthenticationUtils $authenticationUtils ): Response
    {
        $error=$authenticationUtils->getLastAuthenticationError();
        $lastUsername=$authenticationUtils->getLastUsername();
        // return $this->redirectToRoute("etat_civil");
        // $form=$this->createForm(AuthentificationType::class , $user);
        return $this->render('authentification/index.html.twig', [
            'controller_name' => 'AuthentificationController',
            // 'AuthentificationView' => $form->createView() ,
            'last_username' => $lastUsername , 
            'error' => $error
        ]);
    }
    /**
     * @Route("/logout" , name="deconnexion")
     */
    public function deconnexion() {
        // throw new \Exception('This should never be reached!');
    }
    
}

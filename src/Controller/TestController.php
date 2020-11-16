<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;

use App\Entity\Test;
use App\Form\TestType;

class TestController extends AbstractController
{
    /**
     * @Route("/test", name="test")
     */
    public function index(Test $test=null , ObjectManager $manager , Request $request )
    {
        if(!$test){
            $test=new Test();
        }
        $form=$this->createForm(TestType::class , $test) ; 
        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
            'formview' => $form->createView()
        ]);
    }
}

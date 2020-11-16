<?php

namespace App\Form;

use App\Entity\Identite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class IdentiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom')
            ->add('Prenom')
            ->add('DateNaissance' , DateType::class , [
                'years'=> range(date('Y')-120 , date('Y')+50)
            ])
            ->add('LieuNaissance')
            ->add('Sexe' , ChoiceType::class , [
                'choices' =>[
                    'Homme' => 'Homme' , 
                    'Femme' => 'Femme'
                ]
            ])
            ->add('NomPere')
            ->add('DateNaissancePere'  , DateType::class , [
                'years'=> range(date('Y')-120 , date('Y')+50)
            ] )
            ->add('LieuNaissancePere')
            ->add('ProfessionPere')
            ->add('AdressePere')
            ->add('NomMere')
            ->add('DateNaissanceMere'  , DateType::class , [
                'years'=> range(date('Y')-120 , date('Y')+50)
            ])
            ->add('LieuNaissanceMere')
            ->add('ProfessionMere')
            ->add('AdresseMere')
            ->add('NomFaitPar')
            ->add('DateNaissanceFaitPar' , DateType::class , [
                'years'=> range(date('Y')-120 , date('Y')+50)
            ] )
            ->add('LieuNaissanceFaitPar')
            ->add('ProfessionFaitPar')
            ->add('AdresseFaitPar')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Identite::class,
        ]);
    }
}

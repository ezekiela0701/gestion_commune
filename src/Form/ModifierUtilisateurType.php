<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ModifierUtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('Username')
            // ->add('roles' , EntityType::class , [
            //     'class' => Utilisateur::class , 
            //     'choice_label' => 'roles',
            //     // 'choices' => [
            //     //     'ROLE_ADMIN' => 'ROLE_ADMIN' ,
            //     //     'ROLE_SUPER_ADMIN' => 'ROLE_SUPER_ADMIN' , 
            //     //     'ROLE_USER' => 'ROLE_USER'
            //     // ],
            // ])
            ->add('roles', CollectionType::class, [
                'entry_type'   => ChoiceType::class,
                'entry_options'  => [
                    'label' => false,
                    'choices' => [
                                'ROLE_ADMIN' => 'ROLE_ADMIN' ,
                                'ROLE_SUPER_ADMIN' => 'ROLE_SUPER_ADMIN' , 
                                'ROLE_USER' => 'ROLE_USER'
                            ],
                ],
      ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}

<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ModifierUtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Name')
            ->add('Username')
            ->add('roles' , EntityType::class , [
                'class' => Utilisateur::class , 
                'choice_label' => 'roles',
                // 'choices' => [
                //     'ROLE_ADMIN' => 'ROLE_ADMIN' ,
                //     'ROLE_SUPER_ADMIN' => 'ROLE_SUPER_ADMIN' , 
                //     'ROLE_USER' => 'ROLE_USER'
                // ],
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

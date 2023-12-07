<?php

namespace App\Form;

use App\Entity\UtilisateurPico;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class LoginFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            // ->add('numBadge')
            // ->add('nom')
            // ->add('prenom')
            ->add('email', TextType::class, ['label' => 'email'])
            ->add('mdp', PasswordType::class, ['label' => 'Password'])
            // ->add('dateCreation')
            // ->add('dateUpdate')
            // ->add('idOrganisation')
            // ->add('idPico')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => UtilisateurPico::class,
        ]);
    }
}

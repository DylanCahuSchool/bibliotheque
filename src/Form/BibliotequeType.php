<?php

namespace App\Form;

use App\Entity\Biblioteque;
use App\Entity\Livre;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BibliotequeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('listeEnvie')
            ->add('statutLecture')
            ->add('livreId', EntityType::class, [
                'class' => Livre::class,
'choice_label' => 'id',
            ])
            ->add('userId', EntityType::class, [
                'class' => User::class,
'choice_label' => 'id',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Biblioteque::class,
        ]);
    }
}

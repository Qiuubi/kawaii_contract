<?php

namespace App\Form;

use App\Entity\Amendement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AmendementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('term')
            ->add('dateEffect')
            ->add('dateEnding')
            ->add('createdAt')
            ->add('newProvisions')
            ->add('contract')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Amendement::class,
        ]);
    }
}

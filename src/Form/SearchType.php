<?php

namespace App\Form;

use App\Entity\Status;
use App\Entity\Company;
use App\Entity\Product;
use App\Entity\Category;
use App\Entity\Contract;
use App\Repository\CompanyRepository;
use App\Repository\ProductRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\ChoiceList\ChoiceList;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'name',
                ChoiceType::class,
                [
                    'choices'  => [
                        'Maybe' => null,
                        'Yes' => true,
                        'No' => false,
                    ],
                ]
            )
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
            ])
            ->add('partner', EntityType::class, [
                'class' => Company::class,
                'choice_label' => 'name',
                'query_builder' => function (CompanyRepository $er) {
                    return $er->createQueryBuilder('cat')
                        ->where('cat.id > 3')
                        ->orderBy('cat.id', 'ASC');
                }
            ])
            ->add('product', EntityType::class, [
                'class' => Product::class,
                'multiple' => true,
                'expanded' => true,
                'choice_label' => 'name',
                'query_builder' => function (ProductRepository $er) {
                    return $er->createQueryBuilder('p')
                        ->orderBy('p.id', 'DESC');
                }
            ])

            ->add('status', EntityType::class, [
                'class' => Status::class,
                'choice_label' => 'name',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contract::class,
        ]);
    }
}

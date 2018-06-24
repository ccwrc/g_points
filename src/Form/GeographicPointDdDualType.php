<?php

declare(strict_types=1);

namespace App\Form;

use App\Presenter\GeographicPointDdDualPresenter;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GeographicPointDdDualType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('latitude1', NumberType::class, [
                'label' => 'latitude point 1'
            ])
            ->add('longitude1', NumberType::class, [
                'label' => 'longitude point 1'
            ])
            ->add('latitude2', NumberType::class, [
                'label' => 'latitude point 2'
            ])
            ->add('longitude2', NumberType::class, [
                'label' => 'longitude point 2'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GeographicPointDdDualPresenter::class,
        ]);
    }
}

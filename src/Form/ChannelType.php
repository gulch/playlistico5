<?php

namespace App\Form;

use App\Entity\Channel;
use App\Entity\Group;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChannelType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('url')
            ->add('channel_group', EntityType::class, [
                'class' => Group::class,
                'choice_label' => 'title',
                'placeholder' => 'Choose an group...',
            ])
            ->add('logo_filename')
            ->add('tvg_id')
            ->add('note');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Channel::class,
        ]);
    }
}

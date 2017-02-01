<?php
/**
 * Created by PhpStorm.
 * User: Anamary
 * Date: 27/01/2017
 * Time: 15:48
 */

namespace AppBundle\Form;

use AppBundle\Entity\abcd;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class abcdType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('aaaa')
            ->add('bbbb')
            ->add('cccc')
            ->add('Enviar', SubmitType::class);

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => abcd::class
        ]);

    }

    public function getName()
    {
        return 'app_bundle_abcd_type';
    }

}
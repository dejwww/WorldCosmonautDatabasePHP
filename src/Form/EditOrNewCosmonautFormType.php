<?php
namespace App\Form;

use App\Entity\Superpower;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class EditOrNewCosmonautFormType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       return $builder
            ->add('firstName', TextType::class,[
                'required'      => true,


            ])
            ->add('surname', TextType::class,[
                'required'      => true,
            ])
            ->add('dateOfBirth', DateType::class,[
                'required'      => true,
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y')-100),
            ])
            ->add('superpower', EntityType::class,[
                    'class'      	=> Superpower::class,
                    'choices'       => $options["data"],
                    'required'      => true,
                    'label'         => 'Superpower',
                    'placeholder'	=> '== Select superpower =='
                ]
            )
            ->add('save', SubmitType::class, ['label' => 'Save data'])
            ->getForm();
    }



}
<?php

namespace App\Form;

use App\Entity\Book;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => array(
                    'placeholder' => 'Enter title...',
                    'class' => 'form-control mb-2',
                    'autocomplete' => 'off'
                ),
            ])
            ->add('author', TextType::class, [
                'attr' => array(
                    'placeholder' => 'Enter author...',
                    'class' => 'form-control mb-2'
                ),
            ])
            ->add('pagecount', IntegerType::class, [
                'attr' => array(
                    'placeholder' => 'Enter number of pages...',
                    'class' => 'form-control mb-2'
                ),
            ])
            ->add('status', ChoiceType::class, [
                'attr' => array(
                    'placeholder' => 'Pick status...',
                    'class' => 'form-control mb-2'
                ),
                'choices' => array(
                    'Reading' => 'Reading',
                    'Completed' => 'Completed',
                    'On-Hold' => 'On-Hold',
                    'Dropped' => 'Dropped',
                    'Plan to Read' => 'Plan to Read'
                )
            ])
            ->add('description', TextareaType::class, [
                'attr' => array(
                    'placeholder' => 'Enter description...',
                    'class' => 'form-control mb-2'
                ),
            ])
            ->add('image', TextType::class, [
                'attr' => array(
                    'placeholder' => 'Enter image link...',
                    'class' => 'form-control mb-2',
                    'autocomplete' => 'off'
                ),
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Book::class,
        ]);
    }
}

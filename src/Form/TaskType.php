<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Task;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Polyfill\Intl\Idn\Resources\unidata\Regex;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Имя:',
                'attr' => [
                    'placeholder' => 'Введите ваше имя',
                    'class' => 'form-control', // Добавьте класс Bootstrap 'form-control'
                ],
                // ... остальные параметры
            ])
            ->add('description', TextType::class, [
                'label' => 'Описание:',
                'attr' => [
                    'placeholder' => 'Введите описание',
                    'class' => 'form-control', // Добавьте класс Bootstrap 'form-control'
                ],
                // ... остальные параметры
            ])
            ->add('data', DateType::class, [
                'placeholder' => [
                    'year' => '2023', 'month' => 'Сентябрь', 'day' => '31',
                ],
                // ... остальные параметры
            ])
            ->add('createdAt', DateTimeType::class, [
                'date_label' => 'Начинается:',
                // ... остальные параметры
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'placeholder' => 'Выберите категорию',
                'attr' => [
                    'class' => 'form-control', // Добавьте класс Bootstrap 'form-control'
                ],
                // ... остальные параметры
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Сохранить',
                'attr' => [
                    'class' => 'btn btn-primary', // Добавьте класс Bootstrap 'btn btn-primary'
                ],
            ]);
    }
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Task::class,
        ]);
    }
}

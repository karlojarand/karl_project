<?php


namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class booking extends AbstractController
{
    /**
     * @Route("/create_booking")
     */
    public function create_booking(): Response
    {
        $form = $this->createFormBuilder()
            ->add('Firstname', TextType::class, [
                'required' => true
                ])

            ->add('Lastname', TextType::class, [
                'required' => true
            ])

            ->add('Phone', TextType::class, [
                'required' => true
            ])

            ->add('Email', TextType::class, [
                'required' => false
            ])

            ->add('birthday', DateType::class, [
                'required' => true,
                'widget' => 'single_text'
            ])

            ->add('startDate', DateType::class, [
                'required' => true,
                'widget' => 'single_text'
            ])


            ->add('endDate', DateType::class, [
                'required' => true,
                'widget' => 'single_text'
            ])

            ->add('arrivalTime', TimeType::class, [
                'required' => true,
                'widget' => 'single_text'
            ])

            ->add('numberOfPeople', IntegerType::class, [
                'required' => true
            ])

            ->add('payingMethod', ChoiceType::class, [
                'choices' => [
                    'cash' => 'cash',
                    'transfer' => 'transfer'
                ],
                'required' => true
            ])


            ->add('additionalInformation', TextareaType::class, [
                'required' => false
            ])



            ->add('save', SubmitType::class, ['label' => 'Send booking data'])
            ->getForm();


        return $this->render('create_booking.html.twig', [
                'form' => $form->createView(),
            ]);
    }

    /**
     * @Route("/bookings")
     */
        public function bookings(): Response
        {
            return $this->render('bookings.html.twig');
        }
}
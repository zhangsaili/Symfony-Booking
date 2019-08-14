<?php

namespace App\Form;

use App\Entity\Ad;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class AdType extends AbstractType
{
    /**
     * Cette fonction retourne un tableau de configuration
     *
     * @param [string] $label
     * @param [string] $placeholder
     * @return array
     */
    private function getConfiguration($label, $placeholder){
        return [
            'label' => $label,
            'attr' => [
                'placeholder'=>$placeholder
            ]
        ];
    } 

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
                ->add("title", TextType::class, $this->getConfiguration("Titre","Tapez le titre de votre super annonce"))
                ->add("slug", TextType::class, $this->getConfiguration("Adresse web","Tapez l'adresse web (automatique)"))
                ->add("coverImage", UrlType::class, $this->getConfiguration("url de l'image principale","Donnez l'adresse d'une image qui donne vraiment envie"))
                ->add("introduction", TextType::class, $this->getConfiguration("Introduction","Donnez une description globale de l'annonce"))
                ->add("content", TextareaType::class , $this->getConfiguration("Description detaillée","Taper une description qui donne vraimment envie de venir chez vous!"))
                ->add("rooms", IntegerType::class, $this->getConfiguration("Nombre de chambres", "Indiquez le nombre de chambre disponible de votre annonce"))
                ->add("price", MoneyType::class,$this->getConfiguration("Prix par nuit","Indiquez le prix par nuit que vous voulez"));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Ad::class,
        ]);
    }
}

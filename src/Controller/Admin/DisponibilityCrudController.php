<?php

namespace App\Controller\Admin;

use App\Entity\Disponibility;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DisponibilityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Disponibility::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}

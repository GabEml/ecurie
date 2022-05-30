<?php

namespace App\Controller\Admin;

use App\Entity\Healthy;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HealthyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Healthy::class;
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

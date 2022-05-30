<?php

namespace App\Controller\Admin;

use App\Entity\Horse;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class HorseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Horse::class;
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

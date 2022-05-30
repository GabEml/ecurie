<?php

namespace App\Controller\Admin;

use App\Entity\PlanningHealthy;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PlanningHealthyCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PlanningHealthy::class;
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

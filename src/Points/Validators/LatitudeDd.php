<?php

declare(strict_types=1);

namespace App\Points\Validators;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
final class LatitudeDd extends Constraint
{
    public function validatedBy(): string
    {
        return LatitudeDdValidator::class;
    }

    public function getTargets()
    {
        return self::PROPERTY_CONSTRAINT;
    }
}

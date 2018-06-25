<?php

declare(strict_types=1);

namespace App\Points\Validators;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
final class LongitudeDd extends Constraint
{
    public function validatedBy(): string
    {
        return LongitudeDdValidator::class;
    }

    public function getTargets(): string
    {
        return self::PROPERTY_CONSTRAINT;
    }
}

<?php

declare(strict_types=1);

namespace App\Points\Validators;

use App\Points\ValueObject\LatitudeDd;
use Symfony\Component\Validator\{
    Constraint, ConstraintValidator
};

final class LatitudeDdValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint): void
    {
        try {
            new LatitudeDd($value);
        } catch (\Throwable $throwable) {
            $this->context->buildViolation('Invalid latitude.')->addViolation();
        }
    }
}

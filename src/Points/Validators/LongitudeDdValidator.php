<?php

declare(strict_types=1);

namespace App\Points\Validators;

use App\Points\ValueObject\LongitudeDd;
use Symfony\Component\Validator\{
    Constraint, ConstraintValidator
};

final class LongitudeDdValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint): void
    {
        try {
            new LongitudeDd($value);
        } catch (\Throwable $throwable) {
            $this->context->buildViolation('Invalid longitude.')->addViolation();
        }
    }
}

<?php

namespace Tests\Feature\Todo\Constraint;

use App\Models\Todo\Task;
use PHPUnit\Framework\Constraint\Constraint;

/**
 * Taskが等価であるか検証
 */
class TaskConstraint extends Constraint
{
    private Task $expected;

    public function __construct(Task $expected)
    {
        $this->expected = $expected;
    }

    public function matches(mixed $other): bool
    {
        if ($this->expected->name !== $other->name) {
            echo 'name is not match';
            return false;
        }

        return true;
    }

    public function toString(): string
    {
        return <<<EOF
expected:
id: {$this->expected->id}
name: {$this->expected->name}
EOF;
    }
}

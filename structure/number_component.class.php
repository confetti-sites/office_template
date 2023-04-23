<?php /** @noinspection DuplicatedCode */

declare(strict_types=1);

namespace Confetti\Components;

use Confetti\Helpers\ComponentStandard;

return new class extends ComponentStandard {
    public function get(): string
    {
        return (string)$this->toInt();
    }

    public function toInt(): int
    {
        $component = $this->componentStore->find($this->key);
        if ($component->hasDecoration('default')) {
            return (int)$component->getDecoration('default')['value'];
        }

        $min = $component->getDecoration('min')['value'] ?? -10000;
        $max = $component->getDecoration('max')['value'] ?? 10000;
        return (int)$this->faker->numberBetween($min, $max);
    }
};

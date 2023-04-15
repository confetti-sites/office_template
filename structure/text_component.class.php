<?php /** @noinspection DuplicatedCode */

declare(strict_types=1);

namespace Confetti\Components;

use Confetti\Helpers\ComponentStandard;

return new class extends ComponentStandard {
    public function get(): string
    {
        $component = $this->componentStore->find($this->key);
        if ($component->hasDecorations('default')) {
            return $component->getDecoration('default')->data['value'];
        }

        $label = $component->getDecoration('label')?->data['value'] ?? '';

        $haystack = strtolower($component->key . $label);
        if (str_contains($haystack, 'address')) {
            return $this->faker->address();
        }
        if (str_contains($haystack, 'first') && str_contains($haystack, 'name')) {
            return $this->faker->firstName();
        }
        if (str_contains($haystack, 'last') && str_contains($haystack, 'name')) {
            return $this->faker->lastName();
        }
        if (str_contains($haystack, 'company') || str_contains($haystack, 'business')) {
            return $this->faker->company();
        }
        if (str_contains($haystack, 'mail')) {
            return $this->faker->email();
        }
        if (str_contains($haystack, 'phone')) {
            return $this->faker->phoneNumber();
        }
        if (str_contains($haystack, 'city')) {
            return $this->faker->city();
        }

        if (str_contains($haystack, 'name')) {
            return $this->faker->name();
        }

        $min = $component->getDecoration('min')['value'] ?? 6;
        $max = $component->getDecoration('max')['value'] ?? 255;
        if ($min > $max) {
            $min = $max;
        }

        return $this->faker->text(random_int($min, $max));
    }
};

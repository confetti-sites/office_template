<?php /** @noinspection DuplicatedCode */

declare(strict_types=1);

namespace Confetti\Components;

use Confetti\Helpers\ComponentStandard;

return new class extends ComponentStandard {
    public function get(): string
    {
        $component = $this->componentStore->find($this->key);
        if ($component->hasDecorations('default')) {
            return $component->getDecoration('default')['value'];
        }

        return $this->faker->hexColor();
    }
};

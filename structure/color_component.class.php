<?php /** @noinspection DuplicatedCode */

declare(strict_types=1);

namespace Confetti\Components;

use Confetti\Helpers\ComponentStandard;

return new class extends ComponentStandard {
    public function get(): string
    {
        $component = $this->componentStore->find($this->key);
        if ($component->hasDecoration('default')) {
            return $component->getDecoration('default')['value'];
        }

        return sprintf('#%06X', random_int(0, 0xFFFFFF));
    }
};

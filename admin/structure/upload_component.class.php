<?php /** @noinspection DuplicatedCode */

declare(strict_types=1);

namespace Confetti\Components;

use Confetti\Helpers\ComponentStandard;

return new class extends ComponentStandard {
    public function get(): string
    {
        // Get saved value
        $content = $this->contentStore->find($this->id);
        if ($content !== null) {
            return $content->value;
        }

        return 'https://picsum.photos/200/300';
    }
};
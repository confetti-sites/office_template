<?php /** @noinspection DuplicatedCode */

declare(strict_types=1);

namespace Confetti\Components;

use Confetti\Helpers\ComponentEntity;
use Confetti\Helpers\ComponentStandard;
use Confetti\Helpers\ComponentStore;
use Confetti\Helpers\ContentRepository;
use Confetti\Helpers\HasMapInterface;

return new class extends ComponentStandard implements HasMapInterface {
    public function get(): string
    {
        return json_encode($this->getOptions(), JSON_THROW_ON_ERROR);
    }

    private function getOptions(): array
    {
        $component = $this->componentStore->find($this->key);
        $options = $component->getDecoration('options')['options'];
        if (count($options) === 0) {
            return [];
        }
        return $component->getDecoration('options')['options'][0]['id'];
    }

    public function getPathToView(ComponentEntity $component): string
    {
        $default = $component->getDecoration('default')['value'];
        $view    = str_replace('.blade.php', '', $default);

        $target = $component->getDecoration('byDirectory')['target'];
        $dir    = ltrim($target, '/object/');
        $dir    = str_replace('/', '.', $dir);

        return "$dir.$view";
    }

    public function toMap(): Map
    {
        return new Map(
            $this->key . '/-',
            new ComponentStore($this->key . '/-'),
            new ContentRepository(),
            $this->faker,
        );
    }
};

<?php /** @noinspection DuplicatedCode */

declare(strict_types=1);

namespace Confetti\Components;

use Confetti\Helpers\ComponentEntity;
use Confetti\Helpers\ComponentStandard;
use Confetti\Helpers\ComponentStore;
use Confetti\Helpers\ContentStore;
use Confetti\Helpers\HasMapInterface;

return new class extends ComponentStandard implements HasMapInterface {
    public function get(): string
    {
        $component = $this->componentStore->findOrNull($this->key);
        if ($component !== null) {
            return $this->getValueFromOptions($component);
        }
        $component = $this->componentStore->find($this->key . '/-');
        if ($component !== null) {
            return $this->getValueFromByDirectory($component);
        }
        return '!!! Error: Component with type `select` need to have decoration `options` or `byDirectory` !!!';
    }

    private function getValueFromOptions(ComponentEntity $component): string
    {
        $options = $component->getDecoration('options')['options'];
        if (count($options) === 0) {
            return '';
        }
        return $component->getDecoration('options')['options'][0]['id'];
    }

    public function getValueFromByDirectory(ComponentEntity $component): string
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
            new ContentStore(),
        );
    }
};

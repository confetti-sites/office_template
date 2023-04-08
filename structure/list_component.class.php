<?php

declare(strict_types=1);

namespace Confetti\Components;

use IteratorAggregate;

return new class implements IteratorAggregate {
    /**
     * The items contained in the collection.
     *
     * @var array<string, \Map>
     */
    protected $items = [];

    public function __construct(protected \Faker\Generator $faker, private string $key)
    {
        $component = (new \App\Services\ComponentRepository())->find($this->key);

        $max = $component->maxApply ? $component->max : 100;

        $amount = random_int($component->min, $max);

        $i = 1;
        while ($i <= $amount) {
            $i++;

            $this->items[] = new Component($this->faker, $component->key);
        }
    }

    /**
     * Get an iterator for the items.
     *
     * @return \ArrayIterator<string, Map>
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }

    /**
     * Count the number of items in the collection.
     *
     * @return int
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * Determine if an item exists at an offset.
     *
     * @param string $key
     * @return bool
     */
    public function offsetExists($key): bool
    {
        return isset($this->items[$key]);
    }

    /**
     * Get an item at a given offset.
     *
     * @param string $key
     * @return Map
     */
    public function offsetGet($key): mixed
    {
        return $this->items[$key];
    }

    /**
     * Set the item at a given offset.
     *
     * @param string $key
     * @param Map    $value
     * @return void
     */
    public function offsetSet($key, $value): void
    {
        if (is_null($key)) {
            $this->items[] = $value;
        } else {
            $this->items[$key] = $value;
        }
    }

    /**
     * Unset the item at a given offset.
     *
     * @param string $key
     * @return void
     */
    public function offsetUnset($key): void
    {
        unset($this->items[$key]);
    }
};

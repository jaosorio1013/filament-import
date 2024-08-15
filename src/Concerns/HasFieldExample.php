<?php

namespace Jaosorio1013\FilamentImport\Concerns;

use Closure;
use Illuminate\Support\Arr;

trait HasFieldExample
{
    /**
     * @var array<mixed> | Closure
     */
    protected array|Closure $examples = [];

    protected string|Closure|null $exampleHeader = null;


    public function examples(mixed $examples): static
    {
        if (
            (!is_array($examples)) &&
            (!$examples instanceof Closure)
        ) {
            $examples = Arr::wrap($examples);
        }

        $this->examples = $examples;

        return $this;
    }

    public function exampleHeader(string|Closure|null $header): static
    {
        $this->exampleHeader = $header;

        return $this;
    }

    /**
     * @return array<mixed>
     */
    public function getExamples(): array
    {
        return Arr::wrap($this->evaluate($this->examples));
    }

    public function getExampleHeader(): string
    {
        return $this->evaluate($this->exampleHeader) ?? $this->getName();
    }
}

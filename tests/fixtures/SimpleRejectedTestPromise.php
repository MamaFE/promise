<?php

namespace React\Promise;

class SimpleRejectedTestPromise implements PromiseInterface
{
    public function then(callable $onFulfilled = null, callable $onRejected = null)
    {
        try {
            if ($onRejected) {
                $onRejected('foo');
            }

            return new self();
        } catch (\Throwable $exception) {
            return new RejectedPromise($exception);
        } catch (\Exception $exception) {
            return new RejectedPromise($exception);
        }
    }

    public function when(callable $onResolved)
    {
        $onResolved('foo');
    }
}

<?php

namespace spec\League\Pipeline;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CallableOperationSpec extends ObjectBehavior
{
    function let()
    {
        $callable = function ($payload) {return $payload; };
        $this->beConstructedThrough('forCallable', [$callable]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('League\Pipeline\CallableOperation');
        $this->shouldHaveType('League\Pipeline\OperationInterface');
    }

    function it_should_process_a_payload()
    {
        $this->beConstructedThrough('forCallable', [function ($payload) {
            return $payload * 4;
        }]);

        $this->process(2)->shouldBe(8);
    }
}

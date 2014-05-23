<?php

namespace spec\Gunpowder\Output;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TermNoColorSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Gunpowder\Output\TermNoColor');
        $this->shouldImplement('Gunpowder\Output\Output');
    }

    function it_should_echo_something()
    {
        $this->message('')->shouldReturn(null);
        $this->title('ramsam')->shouldReturn(null);
        $this->message('test123')->shouldReturn(null);
        $this->success('bla')->shouldReturn(null);
        $this->failure('bla')->shouldReturn(null);
    }
}


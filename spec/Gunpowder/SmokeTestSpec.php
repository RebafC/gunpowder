<?php

namespace spec\Gunpowder;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SmokeTestSpec extends ObjectBehavior
{
    function let(
        \GuzzleHttp\Message\Response $response,
        \GuzzleHttp\Client $client,
        \Gunpowder\Output\Output $output
    ) {
        $response->getStatusCode()->willReturn('200');
        $response->getBody()->willReturn('This is a test response');
        $response->json()->willReturn(array('foo' => 'bar'));
        $client->get('test')->willReturn($response);
        $this->beConstructedWith($client, $output);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Gunpowder\SmokeTest');
    }

    function it_should_have_exit_status_0_without_failed_assertions()
    {
        $this->visit('test')->getStatusCode()->shouldReturn('200');
        $this->assertResponseCode(200)->shouldReturn(true);
        $this->assertBodyContains('test')->shouldReturn(true);
        $this->assertJsonResponseContainsKey('foo')->shouldReturn(true);
        $this->getExitStatus()->shouldReturn(0);
    }

    function it_should_have_exit_status_1_with_failed_assertions()
    {
        $this->visit('test')->getStatusCode()->shouldReturn('200');
        $this->assertResponseCode(404)->shouldReturn(false);
        $this->assertBodyContains('bla')->shouldReturn(false);
        $this->assertJsonResponseContainsKey('bar')->shouldReturn(false);
        $this->getExitStatus()->shouldReturn(1);
    }
}

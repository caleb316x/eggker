<?php

namespace Tests\Feature\View;

use Tests\TestCase;

class EggTest extends TestCase
{
    /**
     * A basic view test example.
     */
    public function test_it_can_render(): void
    {
        $contents = $this->view('egg', [
            //
        ]);

        $contents->assertSee('');
    }
}

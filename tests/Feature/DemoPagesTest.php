<?php

namespace Tests\Feature;

use Tests\TestCase;

class DemoPagesTest extends TestCase
{
    public function test_overview_page_loads(): void
    {
        $this->get('/')->assertOk();
    }

    public function test_creator_ops_page_loads(): void
    {
        $this->get('/creator-ops')->assertOk();
    }

    public function test_engineering_page_loads(): void
    {
        $this->get('/engineering-workflow')->assertOk();
    }
}

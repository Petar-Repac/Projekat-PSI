<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SearchSortTest extends TestCase
{
    // use RefreshDatabase;
    // private $seed = true;

    public function test_sort_newest()
    {
        $this->get('/')
            ->assertHeader('X-First-Post', 1)
            ->assertHeader('X-Post-Count', 9);
    }

    public function test_sort_best() {
        $this->get('/search?type=best')
            ->assertHeader('X-First-Post', 5)
            ->assertHeader('X-Post-Count', 9);
    }

    public function test_sort_worst() {
        $this->get('/search?type=worst')
            ->assertHeader('X-First-Post', 2)
            ->assertHeader('X-Post-Count', 9);
    }

    public function test_filter_hall_of_fame() {
        $this->get('/search?type=worst&state=hall')
            ->assertHeader('X-First-Post', 8)
            ->assertHeader('X-Post-Count', 2);
    }

    public function test_filter_purgatory() {
        $this->get('/search?type=worst&state=purgatory')
            ->assertHeader('X-First-Post', 2)
            ->assertHeader('X-Post-Count', 7);
    }

    public function test_keyword_invalid() {
        $this->get('/search?keywords=foobar')
            ->assertHeaderMissing('X-First-Post')
            ->assertHeader('X-Post-Count', 0);
    }

    public function test_keyword_valid() {
        $this->get('/search?keywords=razumna')
            ->assertHeader('X-First-Post', 1)
            ->assertHeader('X-Post-Count', 1);
    }
}

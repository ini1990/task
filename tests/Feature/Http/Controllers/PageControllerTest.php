<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PageController
 */
class PageControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;


    public function testIndexBehavesAsExpected(): void
    {
        Page::factory()->times(3)->create();

        $response = $this->get(route('page.index'));

        $response->assertOk();
    }


    public function testStoreSaves(): void
    {
        $page = Page::factory()->make();

        $response = $this->post(route('page.store'), $page->toArray());

        $response->assertCreated();

        $pages = Page::query()
            ->where('id', $response['data']['id'])
            ->get();
        $this->assertCount(1, $pages);
    }


    public function testShowBehavesAsExpected(): void
    {
        $page = Page::factory()->create();

        $response = $this->get(route('page.show', $page));

        $response->assertOk();
    }


    public function testUpdateBehavesAsExpected(): void
    {
        $page = Page::factory()->create();
        $update = Page::factory()->make();

        $response = $this->put(route('page.update', $page), $update->toArray());

        $response->assertOk();
    }


    public function testDestroyDeletesAndRespondsWith(): void
    {
        $page = Page::factory()->create();

        $response = $this->delete(route('page.destroy', $page));

        $response->assertNoContent();

        $this->assertSoftDeleted($page);
    }
}

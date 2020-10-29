<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CategoryController
 */
class CategoryControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;


    public function testIndexBehavesAsExpected(): void
    {
        Category::factory()->times(3)->create();

        $response = $this->get(route('category.index'));

        $response->assertOk();
    }


    public function testStoreSaves(): void
    {
        $category = Category::factory()->make();

        $response = $this->post(route('category.store'), $category->toArray());

        $response->assertCreated();

        $categories = Category::query()
            ->where('id', $response['data']['id'])
            ->get();
        $this->assertCount(1, $categories);
    }


    public function testShowBehavesAsExpected(): void
    {
        $category = Category::factory()->create();

        $response = $this->get(route('category.show', $category));

        $response->assertOk();
    }


    public function testUpdateBehavesAsExpected(): void
    {
        $category = Category::factory()->create();
        $update = Category::factory()->make();

        $response = $this->put(route('category.update', $category), $update->toArray());

        $response->assertOk();
    }


    public function testDestroyDeletesAndRespondsWith(): void
    {
        $category = Category::factory()->create();

        $response = $this->delete(route('category.destroy', $category));

        $response->assertNoContent();

        $this->assertSoftDeleted($category);
    }
}

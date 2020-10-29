<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;
use App\Http\Resources\PageCollection;
use App\Http\Resources\PageResource;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PageController extends Controller
{
    /**
     * @return PageCollection
     */
    public function index(Request $request)
    {
        $pages = Page::all();

        return new PageCollection($pages);
    }

    /**
     * @return PageResource
     */
    public function store(PageStoreRequest $request)
    {
        $page = Page::create($request->validated());

        return new PageResource($page);
    }

    /**
     * @return PageResource
     */
    public function show(Request $request, Page $page)
    {
        return new PageResource($page);
    }

    /**
     * @return PageResource
     */
    public function update(PageUpdateRequest $request, Page $page)
    {
        $page->update($request->validated());

        return new PageResource($page);
    }

    /**
     * @return Response
     */
    public function destroy(Request $request, Page $page)
    {
        $page->delete();

        return response()->noContent();
    }
}

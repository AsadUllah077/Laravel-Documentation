<?php

namespace App\Http\Controllers;

use App\Models\DocumentationCategory;
use App\Models\DocumentationTopic;
use Inertia\Inertia;

class DocumentationController extends Controller
{
    public function index()
    {
        $categories = DocumentationCategory::with(['topics' => function ($query) {
            $query->where('is_published', true)->orderBy('order');
        }])
        ->whereHas('topics', function ($query) {
            $query->where('is_published', true);
        })
        ->orderBy('order')
        ->get();

        return Inertia::render('Documentation/Index', [
            'categories' => $categories,
        ]);
    }

    public function show($category, $topic)
    {
        $category = DocumentationCategory::where('slug', $category)->firstOrFail();
        $topic = DocumentationTopic::where('slug', $topic)
            ->where('category_id', $category->id)
            ->firstOrFail();

        $categories = DocumentationCategory::with(['topics' => function ($query) {
            $query->where('is_published', true)->orderBy('order');
        }])
        ->whereHas('topics', function ($query) {
            $query->where('is_published', true);
        })
        ->orderBy('order')
        ->get();

        return Inertia::render('Documentation/Show', [
            'categories' => $categories,
            'currentTopic' => $topic->load('category'),
        ]);
    }

    public function search()
    {
        $query = request('q', '');

        $results = DocumentationTopic::where('is_published', true)
            ->where(function ($q) use ($query) {
                $q->where('title', 'like', "%{$query}%")
                  ->orWhere('description', 'like', "%{$query}%")
                  ->orWhere('content', 'like', "%{$query}%");
            })
            ->with('category')
            ->limit(10)
            ->get()
            ->map(function ($topic) {
                return [
                    'title' => $topic->title,
                    'description' => $topic->description,
                    'url' => "/docs/{$topic->category->slug}/{$topic->slug}",
                    'category' => $topic->category->name,
                ];
            });

        return response()->json(['results' => $results]);
    }
}

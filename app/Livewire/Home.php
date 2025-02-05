<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\SchemaOrg\Schema;
use romanzipp\Seo\Structs\Meta\Twitter;
use romanzipp\Seo\Structs\Meta\OpenGraph;

class Home extends Component
{
    use WithPagination;

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $title = 'Home - ' . config('app.name');
        $description = 'Explore the portfolio of a talented Graphic & Motion Designer based in Leeuwarden. Discover creative works and projects.';
        $url = route('home');

        seo()
            ->title($title)
            ->description($description)
            ->canonical($url)
            ->addSchema(
                Schema::webPage()
                    ->name($title)
                    ->description($description)
                    ->url($url)
                    ->author(Schema::organization()->name(config('app.name')))
                    ->potentialAction(
                        Schema::searchAction()
                            ->setTarget($url . '/search?q={search_term_string}')
                            ->setQueryInput('required name=search_term_string')
                    )
            )
            ->addMany([
                OpenGraph::make()->property('title')->content($title),
                OpenGraph::make()->property('description')->content($description),
                OpenGraph::make()->property('type')->content('website'),
                OpenGraph::make()->property('url')->content($url),
                Twitter::make()->name('card')->content('summary_large_image'),
                Twitter::make()->name('title')->content($title),
                Twitter::make()->name('description')->content($description),
            ]);

        $posts = Post::published()
            ->latest('published_at')
            ->paginate(6);

        return view('livewire.home', compact('posts'));
    }
}
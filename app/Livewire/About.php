<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\SchemaOrg\Schema;
use romanzipp\Seo\Structs\Meta\Twitter;
use romanzipp\Seo\Structs\Meta\OpenGraph;

class About extends Component
{
    public $count = 1;
    public $rotations = [];
    public $isRotating = false;

    public function mount()
    {
        $this->rotations[] = 0;
    }

    public function increment()
    {
        $this->isRotating = true;
        $this->rotations[] = (count($this->rotations) * 90) % 360;
        $this->count++;
    }
    
    use WithPagination;

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $title = 'About - ' . config('app.name');
        $description = 'Learn more about me, a Graphic & Motion Designer based in Leeuwarden. Discover my background, skills, and creative journey.';
        $url = route('about');

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
                        Schema::readAction()
                            ->setTarget($url)
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

        return view('livewire.about');
    }
}
<?php

namespace App\Livewire\Post;

use App\Concerns\HasPreview;
use App\Models\Post;
use Livewire\Component;
use Spatie\SchemaOrg\Schema;
use Illuminate\Support\Str;

class Show extends Component
{
    use HasPreview;

    /**
     * The post instance.
     *
     * @var \App\Models\Post
     */
    public $post;

    /**
     * Mount the component.
     *
     * @param  \App\Models\Post  $post
     * @return void
     */
    public function mount($post)
    {
        $this->post = Post::whereSlug($post)->firstOrFail();

        $this->handlePreview();

        abort_unless($this->isPreview || $this->post->is_published, 404);
    }

    /**
     * Render the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $translatedTitle = $this->post->getTranslated('title') ?? $this->post->title;
        $translatedDescription = $this->post->getTranslated('description') ?? $this->post->description;

        seo()
            ->title($translatedTitle)
            ->description(Str::limit((string) $translatedDescription, 160))
            ->canonical($this->post->url)
            ->addSchema(
                Schema::article()
                    ->headline($translatedTitle)
                    ->articleBody(Str::limit((string) $translatedDescription, 160))
                    ->image($this->post->image?->url)
                    ->datePublished($this->post->published_at)
                    ->dateModified($this->post->updated_at)
                    ->author(Schema::person()->name($this->post->user->name))
            );

        if ($this->post->image) {
            seo()->image($this->post->image->url);
        }

        return view('livewire.post.show');
    }
}

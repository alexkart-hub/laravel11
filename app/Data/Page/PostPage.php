<?php

namespace App\Data\Page;

use App\Data\Page\Dto\MainPageDto;
use App\Data\Page\Dto\PageDto;
use App\Data\Page\Dto\PostPageDto;
use App\Models\BlogPost;

class PostPage extends Page
{
    private string $categoryCode;
    private $postCode;

    public function getData(): PageDto
    {
        return PostPageDto::createFromArray($this->getPageData());
    }

    public function setPostCode(string $postCode): static
    {
        $this->postCode = $postCode;
        return $this;
    }

    public function setCategoryCode(string $categoryCode): static
    {
        $this->categoryCode = $categoryCode;
        return $this;
    }

    private function getPost()
    {
        return BlogPost::where('slug', $this->postCode)->first();
    }

    private function getPageData()
    {
        $post = $this->getPost();
        if (is_null($post)) {
            abort(404);
        }
        return [
            'post' => $post,
            'category' => $post->category,
            'categoryChain' => $this->categoryCode,
        ];
    }
}

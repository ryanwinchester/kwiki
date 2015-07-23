<?php

namespace Fungku\Kwiki\Http\Controllers;

use Fungku\Postmark\Postmark;

class WikiController extends Controller
{
    /**
     * The path to the directory containing your markdown files
     * relative to the project root.
     */
    private $wikiPath = 'wiki';

    /**
     * The view to use for the wiki pages relative to the resources/views
     * folder and separated by dot notation
     */
    private $wikiView = 'wiki.page';

    /**
     * @var Postmark
     */
    private $postmark;

    /**
     * @param Postmark $postmark
     */
    public function __construct(Postmark $postmark)
    {
        $this->postmark = $postmark;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function makePage()
    {
        $wikiPath = base_path($this->wikiPath);

        $post = implode('/', func_get_args());

        $content = $this->postmark->getContent($wikiPath, $post);

        return view($this->wikiView, $content);
    }
}

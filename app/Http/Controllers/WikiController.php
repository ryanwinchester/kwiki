<?php

namespace Fungku\Kwiki\Http\Controllers;

use Fungku\Postmark\Postmark;

class WikiController extends Controller
{
    /**
     * The path to the directory containing your markdown files
     * relative to the project root.
     */
    const WIKI_PATH = '/wiki';

    /**
     * The view to use for the wiki pages relative to the resources/views
     * folder and separated by dot notation
     */
    const WIKI_VIEW_PAGE = 'wiki.page';

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
    public function index()
    {
        return $this->makePage();
    }

    /**
     * @param string $one
     * @return \Illuminate\View\View
     */
    public function one($one)
    {
        return $this->makePage($one);
    }

    /**
     * @param string $one
     * @param string $two
     * @return \Illuminate\View\View
     */
    public function two($one, $two)
    {
        return $this->makePage($one.'/'.$two);
    }

    /**
     * @param string $one
     * @param string $two
     * @param string $three
     * @return \Illuminate\View\View
     */
    public function three($one, $two, $three)
    {
        return $this->makePage($one.'/'.$two.'/'.$three);
    }

    /**
     * @param string $one
     * @param string $two
     * @param string $three
     * @param string $four
     * @return \Illuminate\View\View
     */
    public function four($one, $two, $three, $four)
    {
        return $this->makePage($one.'/'.$two.'/'.$three.'/'.$four);
    }

    /**
     * @param string $post
     * @return \Illuminate\View\View
     */
    private function makePage($post = null)
    {
        $wikiPath = base_path() . self::WIKI_PATH;

        $content = $this->postmark->getContent($wikiPath, $post);

        return view(self::WIKI_VIEW_PAGE, $content);
    }
}

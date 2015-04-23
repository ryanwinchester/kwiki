<?php namespace Fungku\Kwiki\Http\Controllers;

use Fungku\Postmark\Postmark;

class WikiController extends Controller
{
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
        return $this->getPage($one);
    }

    /**
     * @param string $one
     * @param string $two
     * @return \Illuminate\View\View
     */
    public function two($one, $two)
    {
        return $this->getPage($one, $two);
    }

    /**
     * @param string $one
     * @param string $two
     * @param string $three
     * @return \Illuminate\View\View
     */
    public function three($one, $two, $three)
    {
        return $this->getPage($one, $two, $three);
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
        return $this->getPage($one, $two, $three, $four);
    }

    /**
     * @param string $one
     * @param string $two
     * @param string $three
     * @param string $four
     * @return \Illuminate\View\View
     */
    private function getPage($one, $two = null, $three = null, $four = null)
    {
        if (is_null($two)) {
            return $this->makePage($one);
        }

        if (is_null($three)) {
            return $this->makePage($one.'/'.$two);
        }

        if (is_null($four)) {
            return $this->makePage($one.'/'.$two.'/'.$three);
        }

        return $this->makePage($one.'/'.$two.'/'.$three.'/'.$four);
    }

    /**
     * @param string $post
     * @return \Illuminate\View\View
     */
    private function makePage($post = null)
    {
        $wikiPath = base_path() . '/wiki';

        $content = $this->postmark->getContent($wikiPath, $post);

        return view('wiki.page', $content);
    }
}

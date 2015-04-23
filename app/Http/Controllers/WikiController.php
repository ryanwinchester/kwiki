<?php namespace Fungku\Kwiki\Http\Controllers;

use Fungku\Postmark\Parser;

class WikiController extends Controller
{
    /**
     * @var Parser
     */
    private $parser;

    /**
     * @param Parser $parser
     */
    public function __construct(Parser $parser)
    {
        $this->parser = $parser;
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
     * @return \Illuminate\View\View
     */
    public function three($one, $two, $three)
    {
        return $this->getPage($one, $two, $three);
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
     * @return \Illuminate\View\View
     */
    public function one($one)
    {
        return $this->getPage($one);
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
    private function makePage($post)
    {
        $wikiPath = base_path() . '/wiki';

        $content = $this->parser->parse($wikiPath, $post);

        if (! empty($content['index'])) {
            $content['post'] = view('wiki.category-list', $content['index']) . $content['post'];
        }

        return view('wiki.page', [
            'breadcrumb' => explode('/', $post),
            'index'      => $content['index'],
            'post'       => $content['post'],
        ]);
    }
}

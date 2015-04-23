<?php namespace Fungku\Kwiki\Http\Controllers;

use Illuminate\Filesystem\Filesystem;
use Parsedown;

class WikiController extends Controller
{
    /**
     * @var Filesystem
     */
    private $filesystem;
    /**
     * @var Parsedown
     */
    private $parser;

    /**
     * @param Filesystem $filesystem
     * @param Parsedown $parser
     */
    public function __construct(Filesystem $filesystem, Parsedown $parser)
    {
        $this->filesystem = $filesystem;
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
     * TODO: Extract most of this to a separate class
     *
     * @param string $post
     * @return \Illuminate\View\View
     */
    private function makePage($post)
    {
        $wikiPath = base_path() . '/wiki';
        $postPath = $wikiPath .'/'. $post;
        $breadcrumb = explode('/', $post);
        $isDir = false;

        if ($this->filesystem->isDirectory($postPath)) {
            $isDir = true;
            $index['subcategories'] = $this->filesystem->directories($postPath);
            $index['files'] = $this->filesystem->files($postPath);
            $postPath .= '/index';
        }

        $file = $postPath .'.md';
        if ($this->filesystem->exists($file)) {
            $post = $this->parser->text($this->filesystem->get($file));
        } else {
            $post = '';
        }

        if ($isDir) {
            foreach ($index['subcategories'] as $i => $item) {
                $item = str_replace($wikiPath, '', $item);
                $paths = explode('/', $item);
                $index['subcategories'][$i] = [
                    'href' => $item,
                    'name' => array_pop($paths),
                ];
            }
            foreach ($index['files'] as $i => $item) {
                $item = str_replace($wikiPath, '', $item);
                $item = str_replace('.md', '', $item);
                $paths = explode('/', $item);
                $index['files'][$i] = [
                    'href' => $item,
                    'name' => array_pop($paths),
                ];
                if ($index['files'][$i]['name'] === 'index') {
                    unset($index['files'][$i]);
                }
            }
            $post = view('wiki.category-list', $index) . $post;
        }

        $content = [
            'breadcrumb' => $breadcrumb,
            'post'       => $post,
        ];

        return view('wiki.page', $content);
    }
}

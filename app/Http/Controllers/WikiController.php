<?php

namespace Fungku\Kwiki\Http\Controllers;

use Fungku\Pagemark\Pagemark;

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
     * @var Pagemark
     */
    private $pagemark;

    /**
     * @param Pagemark $pagemark
     */
    public function __construct(Pagemark $pagemark)
    {
        $this->pagemark = $pagemark;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function makePage()
    {
        $wikiPath = base_path($this->wikiPath);

        $post = implode('/', func_get_args());

        $content = $this->pagemark->getContent($wikiPath, $post);

        return view($this->wikiView, $content);
    }
}

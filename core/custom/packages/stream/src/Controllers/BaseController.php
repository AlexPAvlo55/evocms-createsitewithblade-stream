<?php
namespace EvolutionCMS\Stream\Controllers;

use Illuminate\Support\Facades\Cache;

class BaseController
{
    public $data = [];
    public $evo = '';
    public $cache = false;
    public $parents = [];

    public function __construct()
    {
        $this->evo = EvolutionCMS();
        $this->globalElements();
        $cacheid = md5(json_encode($_GET));
        if ($this->cache) {
            $this->data = Cache::get($cacheid);
            if (is_null($this->data)) {
                $this->ourelements();
                $this->render();
                Cache::forever($cacheid, $this->data);
            }
        } else {
            $this->ourelements();
            $this->render();
        }
        $this->nocacheRender();
        $this->sendToView();
    }

    public function render()
    {
    }

    public function globalElements()
    {
        $this->data['menu'] = json_decode($this->evo->runSnippet('DLMenu', ['parents' => 0,
            'showParent' => 1, 'maxDepth' => 4, 'api' => 1]), true)[0];

    }

    public function ourelements()
    {
        $this->data['crumbs'] = json_decode($this->evo->runSnippet('DLCrumbs', ['api' => 1, 'showCurrent' => 1, 'addWhereList' => 'alias_visible=1']), true);
    }

    public function nocacheRender()
    {
    }

    public function sendToView()
    {
        $this->evo->addDataToView($this->data);
    }
}

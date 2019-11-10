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

        $this->render();

        $this->nocacheRender();
        $this->sendToView();
    }

    public function globalElements()
    {
        $this->data['title'] = 'asdasdasdasd';
        $this->data['menutop'] = json_decode($this->evo->runSnippet('DLMenu', ['parents' => '0', 'showParent' => 1, 'maxDepth' => 4, 'api' => 1]), true)[0];
        $this->data['crumbs'] = json_decode($this->evo->runSnippet('DLCrumbs', ['api' => 1, 'showCurrent' => 1, 'addWhereList' => 'alias_visible=1']), true);
    }

    public function render()
    {
    }


    public function nocacheRender()
    {
    }

    public function sendToView()
    {
        $this->evo->addDataToView($this->data);
    }
}
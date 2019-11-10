<?php

namespace EvolutionCMS\Stream\Controllers;

use EvolutionCMS\Stream\Models\TestTable;

class BloglistController extends BaseController
{
    public function render()
    {
        $this->data['dataFromTable'] = TestTable::paginate(2);
        $this->data['paginate'] = $this->data['dataFromTable']->links('blocks.paginate')->toHtml();

        $this->data['blognews'] = $this->evo->runSnippet('DocLister', ['jotcount'=>'1',
    'parents'=>'2',
    'display'=>'2',
    'tvPrefix'=>'',
    'tvList'=>'image',
    'prepare'=>'prepareBlog',
    'summary'=>'notags,len:350',
    'tpl'=>'@CODE:
		<div class="dl_summaryPost">
			[+blog-image+]	
			<h3><a href="[~[+id+]~]" title="[+e.title+]">[+e.title+]</a></h3>
			<div class="dl_info">
				By <strong>[+author+]</strong> on [+date+].
				<a href="[+url+]#commentsAnchor">Comments <span class="badge">[+jotcount+]</span></a>
			</div>
			[+summary+]
			<p class="dl_link">[+link+]</p>
		</div>',
    'paginate'=>'1', ]);
    }
    public function nocacheRender()
    {
        if($_POST['formid'] == 'testform') {
            TestTable::create($_POST);
        }
    }
}
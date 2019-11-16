<?php

namespace EvolutionCMS\Stream\Controllers;

use EvolutionCMS\Stream\Models\Comments;

class FormtemplateController extends BaseController
{
    function nocacheRender()
    {
        if(isset($_POST['formid']) && $_POST['formid']=='comments') {
            $_POST['content_id'] = EvolutionCMS()->documentIdentifier;
            Comments::create($_POST);
        }

        $this->data['comments'] = Comments::resource()->published()->paginate(1)->onEachSide(1);
    }
}
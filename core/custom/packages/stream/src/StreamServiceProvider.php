<?php namespace EvolutionCMS\Stream;

use EvolutionCMS\ServiceProvider;

class StreamServiceProvider extends ServiceProvider
{
    /**
     * Если указать пустую строку, то сниппеты и чанки будут иметь привычное нам именование
     * Допустим, файл test создаст чанк/сниппет с именем test
     * Если же указан namespace то файл test создаст чанк/сниппет с именем stream#test
     * При этом поддерживаются файлы в подпапках. Т.е. файл test из папки subdir создаст элемент с именем subdir/test
     */
    protected $namespace = 'stream';
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        /*$this->loadSnippetsFrom(
            dirname(__DIR__). '/snippets/',
            $this->namespace
        );*/
        /*$this->loadChunksFrom(
            dirname(__DIR__) . '/chunks/',
            $this->namespace
        );*/
        /*$this->loadPluginsFrom(
            dirname(__DIR__) . '/plugins/'
        );*/
        //use this code for each module what you want add
        $this->app->registerModule(
            'Комменатрии',
            dirname(__DIR__).'/modules/module.php'
        );
    }
}
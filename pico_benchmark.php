<?php

/**
 * Pico Benchmark Plugin
 * Pico動作開始時から終了時までの時間を計測し、表示するプラグイン
 *
 * @author  Takami Chie
 * @link    http://onpu-tamago.net/
 * @license http://opensource.org/licenses/MIT The MIT License
 * @version 1.0
 */
final class Pico_Benchmark extends AbstractPicoPlugin
{
  protected $enabled = false;

  private $time;

  public function onPluginsLoaded(array &$plugins)
  {
    $this->time = microtime();
  }

  /**
    * @ref: http://qiita.com/koriym/items/0c8987faecc2782f2c8a
    */
  public function onPageRendered(&$output)
  {
    $bench = array(
      "worktime" => (microtime() - $this->time) * 1000,
      "memory_usage" => number_format(memory_get_usage()),
      "memory_peak" => number_format(memory_get_peak_usage()),
      "declared_class" => count(get_declared_classes()),
      "include_files" => count(get_included_files())
    );
    
    $output = 
      preg_replace_callback("|<!--bench.(\w+)-->|", 
        function($matches) use ($bench){
          if(isset($bench[$matches[1]]))
          {
            return $bench[$matches[1]];
          }else{
            return "";
          }
        }, $output);
  }
}

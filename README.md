# pico-benchmark
Pico Plugin:Pico実行開始から終了までの処理時間を計測、表示するプラグイン

## 追加コード
本プラグインは少しでも正確な値を表示するため、Twigによるレンダリング終了後に処理を行います。そのため、タグの記法は他と異なります。

 * <!--bench.worktime--> 実行時間をミリ秒で表示します。
 * <!--bench.memory_usage--> プログラム終了時に実行されているメモリ量をバイト単位で表示します。
 * <!--bench.memory_peak--> ピーク時に利用されているメモリ量をバイト単位で表示します。
 * <!--bench.declared_class--> プログラムで利用しているクラス数を数値で表示します。
 * <!--bench.include_files--> プログラムで利用しているファイル(PHPファイル)数を数値で表示します。

 ### 利用例

 ```html
   <div class="panel panel-info">
    <h2 class="panel-heading">ベンチマーク</h2>
    <ul class="benchmark list-group">
      <li class="list-group-item">実行時間： <!--bench.worktime-->ms</li>
      <li class="list-group-item">メモリ利用量： <!--bench.memory_usage--> Byte(Peak: <!--bench.memory_peak--> Byte)</li>
      <li class="list-group-item">利用PHPクラス数：<!--bench.declared_class--></li>
      <li class="list-group-item">利用PHPファイル数：<!--bench.include_files--></li>
    </ul>
  </div>
```

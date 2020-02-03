<?php
// 区分けの指定（"App\Controller"内の関数は名前被り不可）
namespace App\Controller;

// インポート（namespaceの拡張機能）
use Cake\Controller\Controller;
use Cake\Event\Event;

// 以下のクラスにアプリケーション全体のメソッドを追加する
// → コントローラーがそれらを継承する（デフォルトのコメント）
class AppController extends Controller
{
    /**
     * @return void
     */
    // 初期化用メソッド
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');

        // CakePHPセキュリティ設定
        //$this->loadComponent('Security');
    }
}

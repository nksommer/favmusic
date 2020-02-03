<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * FavMlist Controller
 *
 * @property \App\Model\Table\FavMlistTable $FavMlist
 *
 * @method \App\Model\Entity\FavMlist[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FavMlistController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // Youtube動画URL一覧取得
        $favMlist = $this->paginate($this->FavMlist);

        $urlList = array();
        $cnt = 0;

        foreach($favMlist as $fav){
            $urlList[$cnt] = $fav->url;
            $cnt++;
        }

        // 一覧の動画URL項目の表示遷移
        foreach($favMlist as $index=>$fav){
            $fav->url = $this->createvideotag($fav->url);
            if($fav->url) {
                $fav->url = '<i class="fab fa-youtube fa-fw fa-3x"></i>';
            } else {
                $fav->url = "-";
                $urlList[$index] = "";
            }
        }

        $this->set(compact('favMlist','urlList'));
    }

    /**
     * View method
     *
     * @param string|null $id Fav Mlist id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $favMlist = $this->FavMlist->get($id, [
            'contain' => [],
        ]);

        // youtubeを埋め込み式に変換する処理
        $favMlist->url = $this->createvideotag($favMlist->url);
        if(!$favMlist->url) {
            $favMlist->url = "（YouTubeリンクなし）";
        }
        $this->set('favMlist', $favMlist);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $favMlist = $this->FavMlist->newEntity();
        if ($this->request->is('post')) {
            $favMlist = $this->FavMlist->patchEntity($favMlist, $this->request->getData());
            if ($this->FavMlist->save($favMlist)) {
                $this->Flash->success(__('追加しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('追加できませんでした。もう一度やり直してください。'));
        }
        $this->set(compact('favMlist'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Fav Mlist id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $favMlist = $this->FavMlist->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $favMlist = $this->FavMlist->patchEntity($favMlist, $this->request->getData());
            if ($this->FavMlist->save($favMlist)) {
                $this->Flash->success(__('変更が保存されました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('変更が保存できませんでした。もう一度やり直してください。'));
        }
        $this->set(compact('favMlist'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Fav Mlist id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $favMlist = $this->FavMlist->get($id);
        if ($this->FavMlist->delete($favMlist)) {
            $this->Flash->success(__('削除しました。'));
        } else {
            $this->Flash->error(__('削除に失敗しました。もう一度やり直してください。'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * youtubeのURLから埋め込みタグを生成する処理
     *
     * @param   string $param youtubeのURL
     * @return  string        埋め込みタグ
     */
    public function createvideotag($param)
    {
        //とりあえずURLがyoutubeのURLであるかをチェック
        //preg_match(/正規表現パターン/,検索対象の文字列,[配列],[動作フラグ],[検索開始位置])
        if(preg_match('#https?://www.youtube.com/.*#i',$param,$matches)){
            //parse_urlでhttps://www.youtube.com/watch以下のパラメータを取得
            $parse_url = parse_url($param);
            // 動画IDを取得
            if (preg_match('#v=([-\w]{11})#i', $parse_url['query'], $v_matches)) {
                $video_id = $v_matches[1];
            } else {
                // 万が一動画のIDの存在しないURLだった場合は埋め込みコードを生成しない。
                return false;
            }
            // 埋め込みコードを返す
            return '<iframe width="600" height="338" src="https://www.youtube.com/embed/' . $video_id . '?autoplay=1" frameborder="0" allowfullscreen></iframe>';
        }
        // パラメータが不正(youtubeのURLではない)ときは埋め込みコードを生成しない。
        return false;
    }
}

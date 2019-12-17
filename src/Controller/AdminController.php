<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;

use App\Utils\AppUtility;

/**
 * Admin Controller
 *
 *
 * @method \App\Model\Entity\Admin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AdminController extends AppController
{
    public function initialize()
    {
        parent::initialize();

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');


        $this->loadComponent('Auth', [
            'loginAction' => [
                'controller' => 'Admin',
                'action' => 'login'
            ],
            'loginRedirect' => [
                'controller' => 'Admin',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Admin',
                'action' => 'login',
            ],
            'authenticate' => [
                'Form' => [
                    'userModel' => 'AdminUsers',
                    'fields' => ['username' => 'username', 'password' => 'password']
                ]
            ],
        ]);
    }

    /**
     * 認証スルー設定
     * @param Event $event
     * @return \Cake\Http\Response|null|void
     */
    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow(['downCsvCus']);
    }

    /**
     * ログイン
     * @return \Cake\Http\Response|null
     */
    public function login()
    {
        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
            if ($user) {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            $this->Flash->error(__('ユーザ名もしくはパスワードが間違っています'));
        }
    }

    /**
     * ログアウト
     * @return \Cake\Http\Response|null
     */
    public function logout()
    {
      return $this->redirect($this->Auth->logout());
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        // Debugger::log(var_export(AppUtility::convSjis("aaaaああ"), true));
        $this->paginate = [
            'limit' => 1
        ];

        $this->helpers = [
            // ページ送り独自テンプレートの読み込み config/paginator-templates.php
            // .php は不要！
            'Paginator' => ['templates' => 'paginator-templates'],
        ];

        $query = TableRegistry::get('Customers')->find()->contain(['Prefs']);
        // $query = $query->join([
        //     'table' => 'prefs',
        //     'alias' => 'Prefs',
        //     'type' => 'INNER',
        //     'conditions' => 'Prefs.id = Customers.pref_id',
        // ])->select(["Customers.id", "Customers.name", "Customers.tel", "Customers.pref_id", "pref_name"=>"Prefs.name"]);
        $customers = $this->paginate($query);

        $this->set(compact('customers'));
    }

    /**
     * View method
     *
     * @param string|null $id AdminUsers id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customer = TableRegistry::get('Customers')->get($id, [
            'contain' => ["Prefs"],
        ]);

        $this->set('customer', $customer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $cPrefs = TableRegistry::get('Prefs')->SelectChoicePrefs(true);
        //Debugger::log(var_export($prefs2, true));
        $customer = TableRegistry::get('Customers')->newEntity();
        if ($this->request->is('post')) {
            $customer = TableRegistry::get('Customers')->patchEntity($customer, $this->request->getData());
            if (TableRegistry::get('Customers')->save($customer)) {
                $this->Flash->success(__('The admin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }

            // ob_start();
            // var_dump($customer->errors());
            // Debugger::log(ob_get_contents());
            // ob_end_clean();
            $this->Flash->error(__('The admin could not be saved. Please, try again.'));
        }
        $this->set(compact('customer', 'cPrefs'));
    }

    /**
     * Edit method
     *
     * @param string|null $id AdminUsers id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $cPrefs = TableRegistry::get('Prefs')->SelectChoicePrefs(true);
        $customer = TableRegistry::get('Customers')->get($id, [
            'contain' => ["Prefs"],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customer = TableRegistry::get('Customers')->patchEntity($customer, $this->request->getData());
            if (TableRegistry::get('Customers')->save($customer)) {
                $this->Flash->success(__('The admin has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The admin could not be saved. Please, try again.'));
        }
        $this->set(compact('customer', 'cPrefs'));
    }

    /**
     * Delete method
     *
     * @param string|null $id AdminUsers id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customer = TableRegistry::get('Customers')->get($id);
        if (TableRegistry::get('Customers')->delete($customer)) {
            $this->Flash->success(__('The admin has been deleted.'));
        } else {
            $this->Flash->error(__('The admin could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function downCsvCus(){
        $this->autoRender = false;
        //$this->request->session()->destroy();

        //ファイルダウンロード目的のアクションの為、手動でログイン中であるかの判断を行う
        $loginUser = $this->Auth->user();
        //非ログイン中の為、ログインページへ遷移
        if(is_null($loginUser)){
            return $this->redirect(['action' => 'login']);
        }

        mb_language("Japanese");
	    $fName = "orders_data.csv";
        $fPath = TMP.$fName;
        $fNo = fopen($fPath, 'w');

        $midasiAry = [];
		$midasiAry[] = AppUtility::convSjis("id");
        $midasiAry[] = AppUtility::convSjis("氏名");
        $midasiAry[] = AppUtility::convSjis("電話番号");
        $midasiAry[] = AppUtility::convSjis("都道府県");
        fputcsv($fNo, $midasiAry);

        $query = TableRegistry::get('Customers')->find()->contain(['Prefs']);
        foreach($query as $row){
            // ob_start();
            // var_dump($row);
            // Debugger::log(ob_get_contents());
            // ob_end_clean();

            $dataWAry = [];
            $dataWAry[] = AppUtility::convSjis($row->id);
            $dataWAry[] = AppUtility::convSjis($row->name);
            $dataWAry[] = AppUtility::convSjis($row->tel);
            $dataWAry[] = AppUtility::convSjis( (!empty($row->pref) ? $row->pref->name:"") );
            fputcsv($fNo, $dataWAry);
        }

        $fName = AppUtility::convSjis($fName);

        header("Cache-Control: public");
		header("Pragma: public");
		header("Content-Type: application/octet-stream");
		header("Content-Disposition: attachment; filename={$fName}");
		header("Content-type: application/octet-stream-dammy; name={$fName}");
		header("Content-Transfer-Encoding: binary");
		header("Content-Length: ".filesize($fPath));
		readfile($fPath);
    }
}

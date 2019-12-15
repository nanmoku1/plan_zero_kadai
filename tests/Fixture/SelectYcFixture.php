<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SelectYcFixture
 */
class SelectYcFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'select_yc';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'yc' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'yc_id' => ['type' => 'string', 'length' => 200, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => 'youtubeチャンネルID', 'precision' => null, 'fixed' => null],
        'yc_list_id' => ['type' => 'string', 'length' => 200, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'new' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => '2001-01-01 00:00:00', 'comment' => '', 'precision' => null],
        'check_ymd' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => '2001-01-01 00:00:00', 'comment' => '', 'precision' => null],
        'auto_read' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => 'YC自動登録を行うか否か', 'precision' => null],
        'pic_gen_id' => ['type' => 'biginteger', 'length' => 20, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'send_tw' => ['type' => 'boolean', 'length' => null, 'null' => false, 'default' => '0', 'comment' => 'YC自動登録時にTwitterに投稿するか否か', 'precision' => null],
        'add_ymd' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'add_prg' => ['type' => 'string', 'length' => 40, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'add_ip' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'upd_ymd' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'upd_prg' => ['type' => 'string', 'length' => 40, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'upd_ip' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'del_flg' => ['type' => 'tinyinteger', 'length' => 4, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'del_flg' => ['type' => 'index', 'columns' => ['del_flg'], 'length' => []],
            'new' => ['type' => 'index', 'columns' => ['new'], 'length' => []],
            'upd_prg' => ['type' => 'index', 'columns' => ['upd_prg'], 'length' => []],
            'check_ymd' => ['type' => 'index', 'columns' => ['check_ymd'], 'length' => []],
            'auto_read' => ['type' => 'index', 'columns' => ['auto_read'], 'length' => []],
            'pic_gen_id' => ['type' => 'index', 'columns' => ['pic_gen_id'], 'length' => []],
            'send_tw' => ['type' => 'index', 'columns' => ['send_tw'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'yc_id' => ['type' => 'unique', 'columns' => ['yc_id'], 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'yc' => 'Lorem ipsum dolor sit amet',
                'yc_id' => 'Lorem ipsum dolor sit amet',
                'yc_list_id' => 'Lorem ipsum dolor sit amet',
                'new' => '2019-12-13 02:38:06',
                'check_ymd' => '2019-12-13 02:38:06',
                'auto_read' => 1,
                'pic_gen_id' => 1,
                'send_tw' => 1,
                'add_ymd' => '2019-12-13 02:38:06',
                'add_prg' => 'Lorem ipsum dolor sit amet',
                'add_ip' => 'Lorem ipsum dolor sit amet',
                'upd_ymd' => '2019-12-13 02:38:06',
                'upd_prg' => 'Lorem ipsum dolor sit amet',
                'upd_ip' => 'Lorem ipsum dolor sit amet',
                'del_flg' => 1,
            ],
        ];
        parent::init();
    }
}

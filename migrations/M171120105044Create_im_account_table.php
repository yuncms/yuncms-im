<?php

namespace yuncms\im\migrations;

use yii\db\Migration;

class M171120105044Create_im_account_table extends Migration
{

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%im_account}}', [
            'id' => $this->primaryKey()->unsigned()->comment('ID'),
            'user_id' => $this->integer()->unsigned()->comment('User Id'),
            'type' => $this->smallInteger(1)->defaultValue(0)->comment('Account Type'),
        ], $tableOptions);

        $this->addForeignKey('{{%im_account_fk_1}}', '{{%im_account}}', 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function safeDown()
    {
        $this->dropTable('{{%im_account}}');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "M171120105044Create_im_account_table cannot be reverted.\n";

        return false;
    }
    */
}

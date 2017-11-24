<?php

namespace yuncms\im\migrations;

use yii\db\Migration;

class M171120105415Create_im_account_table extends Migration
{

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%im_account}}', [
            'user_id' => $this->integer()->unsigned()->notNull()->comment('User ID'),
            'Tag_Profile_IM_Nick' => $this->string(100)->comment('昵称'),
            'Tag_Profile_IM_Gender' => $this->string(50)->defaultValue('Gender_Type_Unknown')->comment('性别'),
            'Tag_Profile_IM_BirthDay' => $this->integer(10)->unsigned()->comment('生日'),
            'Tag_Profile_IM_Location' => $this->string(50)->notNull()->comment('所在地'),
            'Tag_Profile_IM_SelfSignature' => $this->string(500)->notNull()->comment('个性签名'),
            'Tag_Profile_IM_AllowType' => $this->string(100)->notNull()->comment('加好友验证方式'),
            'Tag_Profile_IM_Language' => $this->integer(10)->unsigned()->notNull()->comment('语言'),
            'Tag_Profile_IM_Image' => $this->string(500)->notNull()->comment('头像URL'),
            'Tag_Profile_IM_MsgSettings' => $this->smallInteger(1)->unsigned()->defaultValue(0b1)->comment('消息设置'),
            'Tag_Profile_IM_AdminForbidType' => $this->string(50)->defaultValue('AdminForbid_Type_None')->comment('管理员禁止加好友标识'),
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
        echo "M171120105415Create_im_account__table cannot be reverted.\n";

        return false;
    }
    */
}

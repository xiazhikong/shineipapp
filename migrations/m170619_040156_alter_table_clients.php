<?php

use yii\db\Migration;

class m170619_040156_alter_table_clients extends Migration
{
    public function safeUp()
    {

    }

    public function safeDown()
    {
        echo "m170619_040156_alter_table_clients cannot be reverted.\n";

        return false;
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('clients', 'authKey', $this->string(32)->notNull());

    }

    public function down()
    {
        $this->dropColumn('clients', 'authKey');
    }

}

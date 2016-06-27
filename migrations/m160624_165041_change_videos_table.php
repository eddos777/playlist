<?php

use yii\db\Migration;

class m160624_165041_change_videos_table extends Migration
{
    public function up()
    {
        $this->dropColumn('videos', 'uri');
        $this->dropColumn('videos', 'domain');
        $this->dropColumn('videos', 'poster');
        $this->addColumn('videos', 'url', $this->string());
    }

    public function down()
    {
        echo "m160624_165041_change_videos_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

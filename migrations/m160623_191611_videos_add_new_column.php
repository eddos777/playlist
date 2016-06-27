<?php

use yii\db\Migration;

class m160623_191611_videos_add_new_column extends Migration
{
    public function up()
    {
       $this->addColumn('videos','poster',$this->string());
    }

    public function down()
    {
        echo "m160623_191611_videos_add_new_column cannot be reverted.\n";

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

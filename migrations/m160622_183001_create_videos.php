<?php

use yii\db\Migration;

/**
 * Handles the creation for table `videos`.
 */
class m160622_183001_create_videos extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('videos', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'uri' => $this->string(),
            'domain' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('videos');
    }
}

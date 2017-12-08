<?php

use yii\db\Migration;

/**
 * Handles the creation of table `experience`.
 */
class m170430_101655_create_experience_table extends Migration {

    /**
     * @inheritdoc
     */
    public function up() {
        $this->createTable('experience', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->null(),
            'company' => $this->string()->null(),
            'date_from' => $this->string()->null(),
            'date_to' => $this->string()->null(),
            
            'description' => $this->text()->null(),

            'experience_owner_id' => $this->integer(),
        ]);

        $this->createIndex('FK_experience_owner_id', '{{%experience}}', 'experience_owner_id');
        $this->addForeignKey(
                'FK_experience_owner_id', '{{%experience}}', 'experience_owner_id', '{{%user}}', 'id', 'SET NULL', 'CASCADE'
        );
        
        
        
        
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropTable('experience');
    }

}

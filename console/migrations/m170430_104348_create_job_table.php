<?php

use yii\db\Migration;

/**
 * Handles the creation of table `job`.
 */
class m170430_104348_create_job_table extends Migration {

    /**
     * @inheritdoc
     */
    public function up() {
        $this->createTable('job', [
            'id' => $this->primaryKey(),
            'position' => $this->string()->null(),
            'category' => $this->string()->notNull()->defaultValue('other'),
            'city' => $this->string()->null(),
            'salary' => $this->string()->null(),
            'education' => $this->string()->notNull()->defaultValue('No matter'),
            'experience' => $this->string()->notNull()->defaultValue('No matter'),
            'employment_type' => $this->string()->notNull()->defaultValue('No matter'),
            'description' => $this->text()->null(),
            'public' => $this->smallInteger()->notNull()->defaultValue('1'),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'firm_id' => $this->integer(),
            'owner_id' => $this->integer(),
        ]);

        $this->createIndex('FK_firm_id', '{{%job}}', 'firm_id');
        $this->addForeignKey(
                'FK_firm_id', '{{%job}}', 'firm_id', '{{%firm}}', 'id', 'SET NULL', 'CASCADE'
        );
        
        $this->createIndex('FK_owner_id', '{{%job}}', 'owner_id');
        $this->addForeignKey(
                'FK_owner_id', '{{%job}}', 'owner_id', '{{%user}}', 'id', 'SET NULL', 'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropTable('job');
    }

}

<?php

use yii\db\Migration;

/**
 * Handles the creation of table `firm`.
 */
class m170430_101651_create_firm_table extends Migration {

    /**
     * @inheritdoc
     */
    public function up() {
        $this->createTable('firm', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->null(),
            'city' => $this->string()->null(),
            'category' => $this->string()->notNull()->defaultValue('other'),
            'website' => $this->string()->null(),
            'email' => $this->string()->null(),
            'phone' => $this->string()->null(),
            'show_website' => $this->smallInteger()->null(),
            'show_email' => $this->smallInteger()->null(),
            'show_phone' => $this->smallInteger()->null(),
            'title' => $this->string()->null(),
            'logo' => $this->string()->notNull()->defaultValue('nologo.png'),
            'description' => $this->text()->null(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'user_id' => $this->integer(),
        ]);

        $this->createIndex('FK_user_id', '{{%firm}}', 'user_id');
        $this->addForeignKey(
                'FK_user_id', '{{%firm}}', 'user_id', '{{%user}}', 'id', 'SET NULL', 'CASCADE'
        );
    }

    /**
     * @inheritdoc
     */
    public function down() {
        $this->dropTable('firm');
    }

}

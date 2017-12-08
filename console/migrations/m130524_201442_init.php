<?php

use yii\db\Migration;

class m130524_201442_init extends Migration {

    public function up() {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'contact_email' => $this->string()->null(),
            'objective' => $this->string()->null(),
            'salary' => $this->string()->null(),
            'employment_type' => $this->string()->null(),
            'first_name' => $this->string()->null(),
            'last_name' => $this->string()->null(),
            'photo' => $this->string()->notNull()->defaultValue('nophoto.png'),
            'city' => $this->string()->null(),
            'sex' => $this->string()->null(),
            'phone' => $this->string()->null(),
            'birth' => $this->string()->null(),
            'education_qualification' => $this->string()->null(),
            'education_occupation' => $this->string()->null(),
            'education_university' => $this->string()->null(),
            'education_from_month' => $this->string()->null(),
            'education_from_year' => $this->string()->null(),
            'education_to_month' => $this->string()->null(),
            'education_to_year' => $this->string()->null(),
            'public' => $this->smallInteger()->notNull()->defaultValue('1'),
            'description' => $this->text()->null(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
                ], $tableOptions);
    }

    public function down() {
        $this->dropTable('{{%user}}');
    }

}

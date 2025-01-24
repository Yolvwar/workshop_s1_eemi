<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250124122506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE card_id_seq');
        $this->addSql('SELECT setval(\'card_id_seq\', (SELECT MAX(id) FROM card))');
        $this->addSql('ALTER TABLE card ALTER id SET DEFAULT nextval(\'card_id_seq\')');
        $this->addSql('CREATE SEQUENCE evenement_id_seq');
        $this->addSql('SELECT setval(\'evenement_id_seq\', (SELECT MAX(id) FROM evenement))');
        $this->addSql('ALTER TABLE evenement ALTER id SET DEFAULT nextval(\'evenement_id_seq\')');
        $this->addSql('CREATE SEQUENCE order_id_seq');
        $this->addSql('SELECT setval(\'order_id_seq\', (SELECT MAX(id) FROM "order"))');
        $this->addSql('ALTER TABLE "order" ALTER id SET DEFAULT nextval(\'order_id_seq\')');
        $this->addSql('CREATE SEQUENCE order_item_id_seq');
        $this->addSql('SELECT setval(\'order_item_id_seq\', (SELECT MAX(id) FROM order_item))');
        $this->addSql('ALTER TABLE order_item ALTER id SET DEFAULT nextval(\'order_item_id_seq\')');
        $this->addSql('CREATE SEQUENCE products_id_seq');
        $this->addSql('SELECT setval(\'products_id_seq\', (SELECT MAX(id) FROM products))');
        $this->addSql('ALTER TABLE products ALTER id SET DEFAULT nextval(\'products_id_seq\')');
        $this->addSql('CREATE SEQUENCE rules_id_seq');
        $this->addSql('SELECT setval(\'rules_id_seq\', (SELECT MAX(id) FROM rules))');
        $this->addSql('ALTER TABLE rules ALTER id SET DEFAULT nextval(\'rules_id_seq\')');
        $this->addSql('CREATE SEQUENCE user_id_seq');
        $this->addSql('SELECT setval(\'user_id_seq\', (SELECT MAX(id) FROM "user"))');
        $this->addSql('ALTER TABLE "user" ALTER id SET DEFAULT nextval(\'user_id_seq\')');
        $this->addSql('CREATE SEQUENCE messenger_messages_id_seq');
        $this->addSql('SELECT setval(\'messenger_messages_id_seq\', (SELECT MAX(id) FROM messenger_messages))');
        $this->addSql('ALTER TABLE messenger_messages ALTER id SET DEFAULT nextval(\'messenger_messages_id_seq\')');
        $this->addSql('ALTER TABLE messenger_messages ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE messenger_messages ALTER available_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE messenger_messages ALTER delivered_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS \'(DC2Type:datetime_immutable)\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE "order" ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE messenger_messages ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE messenger_messages ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE messenger_messages ALTER available_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE messenger_messages ALTER delivered_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('COMMENT ON COLUMN messenger_messages.created_at IS NULL');
        $this->addSql('COMMENT ON COLUMN messenger_messages.available_at IS NULL');
        $this->addSql('COMMENT ON COLUMN messenger_messages.delivered_at IS NULL');
        $this->addSql('ALTER TABLE card ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE order_item ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE evenement ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE products ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE "user" ALTER id DROP DEFAULT');
        $this->addSql('ALTER TABLE rules ALTER id DROP DEFAULT');
    }
}

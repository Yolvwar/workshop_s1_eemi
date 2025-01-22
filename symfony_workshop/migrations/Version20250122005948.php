<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250122005948 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('INSERT INTO order_item (id, product_id, order_id, quantity) VALUES (1, 1, 1, 1)');
        $this->addSql('INSERT INTO order_item (id, product_id, order_id, quantity) VALUES (2, 2, 1, 2)');
        $this->addSql('INSERT INTO order_item (id, product_id, order_id, quantity) VALUES (3, 3, 1, 3)');
        $this->addSql('INSERT INTO order_item (id, product_id, order_id, quantity) VALUES (4, 1, 2, 1)');
        $this->addSql('INSERT INTO order_item (id, product_id, order_id, quantity) VALUES (5, 2, 2, 2)');
        $this->addSql('INSERT INTO order_item (id, product_id, order_id, quantity) VALUES (6, 3, 2, 3)');
        $this->addSql('INSERT INTO order_item (id, product_id, order_id, quantity) VALUES (7, 1, 3, 1)');
        $this->addSql('INSERT INTO order_item (id, product_id, order_id, quantity) VALUES (8, 2, 3, 2)');
        $this->addSql('INSERT INTO order_item (id, product_id, order_id, quantity) VALUES (9, 3, 3, 3)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
    }
}

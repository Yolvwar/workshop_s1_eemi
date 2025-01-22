<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250122000645 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE "order" (id SERIAL NOT NULL, client_id INT DEFAULT NULL, quantity INT NOT NULL, ordered_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F529939819EB6921 ON "order" (client_id)');
        $this->addSql('CREATE TABLE order_products (order_id INT NOT NULL, products_id INT NOT NULL, PRIMARY KEY(order_id, products_id))');
        $this->addSql('CREATE INDEX IDX_5242B8EB8D9F6D38 ON order_products (order_id)');
        $this->addSql('CREATE INDEX IDX_5242B8EB6C8A81A9 ON order_products (products_id)');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT FK_F529939819EB6921 FOREIGN KEY (client_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE order_products ADD CONSTRAINT FK_5242B8EB8D9F6D38 FOREIGN KEY (order_id) REFERENCES "order" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE order_products ADD CONSTRAINT FK_5242B8EB6C8A81A9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');

        $this->addSql('INSERT INTO "order" (id, client_id, quantity, ordered_at) VALUES (1, 1, 1, \'2025-01-22 00:00:00\')');
        $this->addSql('INSERT INTO "order" (id, client_id, quantity, ordered_at) VALUES (2, 1, 2, \'2025-01-22 00:00:00\')');
        $this->addSql('INSERT INTO "order" (id, client_id, quantity, ordered_at) VALUES (3, 1, 3, \'2025-01-22 00:00:00\')');
        $this->addSql('INSERT INTO order_products (order_id, products_id) VALUES (1, 1)');
        $this->addSql('INSERT INTO order_products (order_id, products_id) VALUES (1, 2)');
        $this->addSql('INSERT INTO order_products (order_id, products_id) VALUES (1, 3)');
        $this->addSql('INSERT INTO order_products (order_id, products_id) VALUES (2, 1)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "order" DROP CONSTRAINT FK_F529939819EB6921');
        $this->addSql('ALTER TABLE order_products DROP CONSTRAINT FK_5242B8EB8D9F6D38');
        $this->addSql('ALTER TABLE order_products DROP CONSTRAINT FK_5242B8EB6C8A81A9');
        $this->addSql('DROP TABLE "order"');
        $this->addSql('DROP TABLE order_products');
    }
}

<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250122005116 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_item (id SERIAL NOT NULL, product_id INT NOT NULL, order_id INT NOT NULL, quantity INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_52EA1F094584665A ON order_item (product_id)');
        $this->addSql('CREATE INDEX IDX_52EA1F098D9F6D38 ON order_item (order_id)');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F094584665A FOREIGN KEY (product_id) REFERENCES products (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE order_item ADD CONSTRAINT FK_52EA1F098D9F6D38 FOREIGN KEY (order_id) REFERENCES "order" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE order_products DROP CONSTRAINT fk_5242b8eb8d9f6d38');
        $this->addSql('ALTER TABLE order_products DROP CONSTRAINT fk_5242b8eb6c8a81a9');
        $this->addSql('DROP TABLE order_products');
        $this->addSql('ALTER TABLE "order" DROP quantity');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE order_products (order_id INT NOT NULL, products_id INT NOT NULL, PRIMARY KEY(order_id, products_id))');
        $this->addSql('CREATE INDEX idx_5242b8eb6c8a81a9 ON order_products (products_id)');
        $this->addSql('CREATE INDEX idx_5242b8eb8d9f6d38 ON order_products (order_id)');
        $this->addSql('ALTER TABLE order_products ADD CONSTRAINT fk_5242b8eb8d9f6d38 FOREIGN KEY (order_id) REFERENCES "order" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE order_products ADD CONSTRAINT fk_5242b8eb6c8a81a9 FOREIGN KEY (products_id) REFERENCES products (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE order_item DROP CONSTRAINT FK_52EA1F094584665A');
        $this->addSql('ALTER TABLE order_item DROP CONSTRAINT FK_52EA1F098D9F6D38');
        $this->addSql('DROP TABLE order_item');
        $this->addSql('ALTER TABLE "order" ADD quantity INT NOT NULL');
    }
}

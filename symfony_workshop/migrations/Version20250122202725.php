<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250122202725 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE products ADD description TEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE products ADD affiliate_link VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD shipping_address VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE "user" ADD billing_address VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE "user" DROP shipping_address');
        $this->addSql('ALTER TABLE "user" DROP billing_address');
        $this->addSql('ALTER TABLE products DROP description');
        $this->addSql('ALTER TABLE products DROP affiliate_link');
    }
}

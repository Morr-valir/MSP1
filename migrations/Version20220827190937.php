<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220827190937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, producteur_id INT DEFAULT NULL, name VARCHAR(50) NOT NULL, description VARCHAR(255) DEFAULT NULL, prix DOUBLE PRECISION NOT NULL, INDEX IDX_29A5EC27AB9BB300 (producteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit_category (produit_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_2F532BD2F347EFB (produit_id), INDEX IDX_2F532BD212469DE2 (category_id), PRIMARY KEY(produit_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27AB9BB300 FOREIGN KEY (producteur_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE produit_category ADD CONSTRAINT FK_2F532BD2F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_category ADD CONSTRAINT FK_2F532BD212469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27AB9BB300');
        $this->addSql('ALTER TABLE produit_category DROP FOREIGN KEY FK_2F532BD2F347EFB');
        $this->addSql('ALTER TABLE produit_category DROP FOREIGN KEY FK_2F532BD212469DE2');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE produit_category');
    }
}

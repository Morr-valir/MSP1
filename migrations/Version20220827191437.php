<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220827191437 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produit_category DROP FOREIGN KEY FK_2F532BD212469DE2');
        $this->addSql('ALTER TABLE produit_category DROP FOREIGN KEY FK_2F532BD2F347EFB');
        $this->addSql('DROP TABLE produit_category');
        $this->addSql('ALTER TABLE produit DROP FOREIGN KEY FK_29A5EC27AB9BB300');
        $this->addSql('DROP INDEX IDX_29A5EC27AB9BB300 ON produit');
        $this->addSql('ALTER TABLE produit DROP producteur_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produit_category (produit_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_2F532BD212469DE2 (category_id), INDEX IDX_2F532BD2F347EFB (produit_id), PRIMARY KEY(produit_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE produit_category ADD CONSTRAINT FK_2F532BD212469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit_category ADD CONSTRAINT FK_2F532BD2F347EFB FOREIGN KEY (produit_id) REFERENCES produit (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE produit ADD producteur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE produit ADD CONSTRAINT FK_29A5EC27AB9BB300 FOREIGN KEY (producteur_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_29A5EC27AB9BB300 ON produit (producteur_id)');
    }
}

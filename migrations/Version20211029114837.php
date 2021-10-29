<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211029114837 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE proprietaire (id INT AUTO_INCREMENT NOT NULL, restaurant_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_69E399D6B1E7706E (restaurant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE restaurant (id INT AUTO_INCREMENT NOT NULL, ville_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, image VARCHAR(255) NOT NULL, INDEX IDX_EB95123FA73F0036 (ville_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ville (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE proprietaire ADD CONSTRAINT FK_69E399D6B1E7706E FOREIGN KEY (restaurant_id) REFERENCES restaurant (id)');
        $this->addSql('ALTER TABLE restaurant ADD CONSTRAINT FK_EB95123FA73F0036 FOREIGN KEY (ville_id) REFERENCES ville (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE proprietaire DROP FOREIGN KEY FK_69E399D6B1E7706E');
        $this->addSql('ALTER TABLE restaurant DROP FOREIGN KEY FK_EB95123FA73F0036');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE restaurant');
        $this->addSql('DROP TABLE ville');
    }
}

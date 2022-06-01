<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220531093137 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE box (id INT AUTO_INCREMENT NOT NULL, access TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disponibility (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, place INT NOT NULL, INDEX IDX_38BB9260A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE healthy (id INT AUTO_INCREMENT NOT NULL, date_id INT NOT NULL, user_id INT NOT NULL, horse_id INT NOT NULL, bilan VARCHAR(255) DEFAULT NULL, patologie VARCHAR(255) DEFAULT NULL, INDEX IDX_7FABBDE8B897366B (date_id), INDEX IDX_7FABBDE8A76ED395 (user_id), INDEX IDX_7FABBDE876B275AD (horse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horse (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, age INT NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_629A2F18A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning_box (id INT AUTO_INCREMENT NOT NULL, box_id INT NOT NULL, horse_id INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_9F08608D8177B3F (box_id), INDEX IDX_9F0860876B275AD (horse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning_healthy (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, description VARCHAR(255) DEFAULT NULL, address VARCHAR(255) NOT NULL, date_sante DATE NOT NULL, INDEX IDX_A2C6E003A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, role_id INT NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, bio VARCHAR(255) DEFAULT NULL, INDEX IDX_8D93D649D60322AC (role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE disponibility ADD CONSTRAINT FK_38BB9260A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE healthy ADD CONSTRAINT FK_7FABBDE8B897366B FOREIGN KEY (date_id) REFERENCES planning_healthy (id)');
        $this->addSql('ALTER TABLE healthy ADD CONSTRAINT FK_7FABBDE8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE healthy ADD CONSTRAINT FK_7FABBDE876B275AD FOREIGN KEY (horse_id) REFERENCES horse (id)');
        $this->addSql('ALTER TABLE horse ADD CONSTRAINT FK_629A2F18A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE planning_box ADD CONSTRAINT FK_9F08608D8177B3F FOREIGN KEY (box_id) REFERENCES box (id)');
        $this->addSql('ALTER TABLE planning_box ADD CONSTRAINT FK_9F0860876B275AD FOREIGN KEY (horse_id) REFERENCES horse (id)');
        $this->addSql('ALTER TABLE planning_healthy ADD CONSTRAINT FK_A2C6E003A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649D60322AC FOREIGN KEY (role_id) REFERENCES role (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planning_box DROP FOREIGN KEY FK_9F08608D8177B3F');
        $this->addSql('ALTER TABLE healthy DROP FOREIGN KEY FK_7FABBDE876B275AD');
        $this->addSql('ALTER TABLE planning_box DROP FOREIGN KEY FK_9F0860876B275AD');
        $this->addSql('ALTER TABLE healthy DROP FOREIGN KEY FK_7FABBDE8B897366B');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649D60322AC');
        $this->addSql('ALTER TABLE disponibility DROP FOREIGN KEY FK_38BB9260A76ED395');
        $this->addSql('ALTER TABLE healthy DROP FOREIGN KEY FK_7FABBDE8A76ED395');
        $this->addSql('ALTER TABLE horse DROP FOREIGN KEY FK_629A2F18A76ED395');
        $this->addSql('ALTER TABLE planning_healthy DROP FOREIGN KEY FK_A2C6E003A76ED395');
        $this->addSql('DROP TABLE box');
        $this->addSql('DROP TABLE disponibility');
        $this->addSql('DROP TABLE healthy');
        $this->addSql('DROP TABLE horse');
        $this->addSql('DROP TABLE planning_box');
        $this->addSql('DROP TABLE planning_healthy');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE user');
    }
}

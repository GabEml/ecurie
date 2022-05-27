<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220527103317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE box (id INT AUTO_INCREMENT NOT NULL, access TINYINT(1) NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, photo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE disponibility (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, place INT NOT NULL, INDEX IDX_38BB926079F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE healthy (id INT AUTO_INCREMENT NOT NULL, id_date_id INT NOT NULL, id_user_id INT NOT NULL, id_horse_id INT NOT NULL, bilan VARCHAR(255) DEFAULT NULL, patologie VARCHAR(255) DEFAULT NULL, INDEX IDX_7FABBDE8660A9F1B (id_date_id), INDEX IDX_7FABBDE879F37AE5 (id_user_id), INDEX IDX_7FABBDE826699938 (id_horse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE horse (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, name VARCHAR(255) NOT NULL, age INT NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_629A2F1879F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning_box (id INT AUTO_INCREMENT NOT NULL, id_box_id INT NOT NULL, id_horse_id INT NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_9F08608FE20CED2 (id_box_id), INDEX IDX_9F0860826699938 (id_horse_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE planning_healthy (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, description VARCHAR(255) DEFAULT NULL, address VARCHAR(255) NOT NULL, date_sante DATE NOT NULL, INDEX IDX_A2C6E00379F37AE5 (id_user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE disponibility ADD CONSTRAINT FK_38BB926079F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE healthy ADD CONSTRAINT FK_7FABBDE8660A9F1B FOREIGN KEY (id_date_id) REFERENCES planning_healthy (id)');
        $this->addSql('ALTER TABLE healthy ADD CONSTRAINT FK_7FABBDE879F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE healthy ADD CONSTRAINT FK_7FABBDE826699938 FOREIGN KEY (id_horse_id) REFERENCES horse (id)');
        $this->addSql('ALTER TABLE horse ADD CONSTRAINT FK_629A2F1879F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE planning_box ADD CONSTRAINT FK_9F08608FE20CED2 FOREIGN KEY (id_box_id) REFERENCES box (id)');
        $this->addSql('ALTER TABLE planning_box ADD CONSTRAINT FK_9F0860826699938 FOREIGN KEY (id_horse_id) REFERENCES horse (id)');
        $this->addSql('ALTER TABLE planning_healthy ADD CONSTRAINT FK_A2C6E00379F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE cheval');
        $this->addSql('DROP TABLE medecin');
        $this->addSql('DROP TABLE news');
        $this->addSql('DROP TABLE planning');
        $this->addSql('DROP TABLE sante');
        $this->addSql('ALTER TABLE user ADD id_role_id INT NOT NULL, ADD lastname VARCHAR(255) NOT NULL, ADD adress VARCHAR(255) NOT NULL, ADD email VARCHAR(255) NOT NULL, ADD bio VARCHAR(255) DEFAULT NULL, DROP prenom, DROP adresse, CHANGE password password VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64989E8BDC FOREIGN KEY (id_role_id) REFERENCES role (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64989E8BDC ON user (id_role_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planning_box DROP FOREIGN KEY FK_9F08608FE20CED2');
        $this->addSql('ALTER TABLE healthy DROP FOREIGN KEY FK_7FABBDE826699938');
        $this->addSql('ALTER TABLE planning_box DROP FOREIGN KEY FK_9F0860826699938');
        $this->addSql('ALTER TABLE healthy DROP FOREIGN KEY FK_7FABBDE8660A9F1B');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64989E8BDC');
        $this->addSql('CREATE TABLE admin (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE cheval (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, age INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE medecin (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, specialite VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, adresse VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE news (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, texte VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, image VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE planning (id INT AUTO_INCREMENT NOT NULL, rendu VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE sante (id INT AUTO_INCREMENT NOT NULL, texte VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE box');
        $this->addSql('DROP TABLE disponibility');
        $this->addSql('DROP TABLE healthy');
        $this->addSql('DROP TABLE horse');
        $this->addSql('DROP TABLE planning_box');
        $this->addSql('DROP TABLE planning_healthy');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP INDEX IDX_8D93D64989E8BDC ON user');
        $this->addSql('ALTER TABLE user ADD prenom VARCHAR(255) NOT NULL, ADD adresse VARCHAR(255) NOT NULL, DROP id_role_id, DROP lastname, DROP adress, DROP email, DROP bio, CHANGE password password VARCHAR(25) NOT NULL');
    }
}

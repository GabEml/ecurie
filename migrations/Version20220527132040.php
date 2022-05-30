<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220527132040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, id_role_id INT NOT NULL, name VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, bio VARCHAR(255) DEFAULT NULL, INDEX IDX_8D93D64989E8BDC (id_role_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64989E8BDC FOREIGN KEY (id_role_id) REFERENCES role (id)');
        $this->addSql('ALTER TABLE disponibility ADD CONSTRAINT FK_38BB926079F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE healthy ADD CONSTRAINT FK_7FABBDE8660A9F1B FOREIGN KEY (id_date_id) REFERENCES planning_healthy (id)');
        $this->addSql('ALTER TABLE healthy ADD CONSTRAINT FK_7FABBDE879F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE healthy ADD CONSTRAINT FK_7FABBDE826699938 FOREIGN KEY (id_horse_id) REFERENCES horse (id)');
        $this->addSql('ALTER TABLE horse ADD CONSTRAINT FK_629A2F1879F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE planning_box ADD CONSTRAINT FK_9F08608FE20CED2 FOREIGN KEY (id_box_id) REFERENCES box (id)');
        $this->addSql('ALTER TABLE planning_box ADD CONSTRAINT FK_9F0860826699938 FOREIGN KEY (id_horse_id) REFERENCES horse (id)');
        $this->addSql('ALTER TABLE planning_healthy ADD CONSTRAINT FK_A2C6E00379F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE disponibility DROP FOREIGN KEY FK_38BB926079F37AE5');
        $this->addSql('ALTER TABLE healthy DROP FOREIGN KEY FK_7FABBDE879F37AE5');
        $this->addSql('ALTER TABLE horse DROP FOREIGN KEY FK_629A2F1879F37AE5');
        $this->addSql('ALTER TABLE planning_healthy DROP FOREIGN KEY FK_A2C6E00379F37AE5');
        $this->addSql('DROP TABLE user');
        $this->addSql('ALTER TABLE healthy DROP FOREIGN KEY FK_7FABBDE8660A9F1B');
        $this->addSql('ALTER TABLE healthy DROP FOREIGN KEY FK_7FABBDE826699938');
        $this->addSql('ALTER TABLE planning_box DROP FOREIGN KEY FK_9F08608FE20CED2');
        $this->addSql('ALTER TABLE planning_box DROP FOREIGN KEY FK_9F0860826699938');
    }
}

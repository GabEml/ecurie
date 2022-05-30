<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220527143310 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE disponibility DROP FOREIGN KEY FK_38BB926079F37AE5');
        $this->addSql('DROP INDEX IDX_38BB926079F37AE5 ON disponibility');
        $this->addSql('ALTER TABLE disponibility CHANGE id_user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE disponibility ADD CONSTRAINT FK_38BB9260A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_38BB9260A76ED395 ON disponibility (user_id)');
        $this->addSql('ALTER TABLE healthy DROP FOREIGN KEY FK_7FABBDE826699938');
        $this->addSql('ALTER TABLE healthy DROP FOREIGN KEY FK_7FABBDE8660A9F1B');
        $this->addSql('ALTER TABLE healthy DROP FOREIGN KEY FK_7FABBDE879F37AE5');
        $this->addSql('DROP INDEX IDX_7FABBDE826699938 ON healthy');
        $this->addSql('DROP INDEX IDX_7FABBDE8660A9F1B ON healthy');
        $this->addSql('DROP INDEX IDX_7FABBDE879F37AE5 ON healthy');
        $this->addSql('ALTER TABLE healthy ADD date_id INT NOT NULL, ADD user_id INT NOT NULL, ADD horse_id INT NOT NULL, DROP id_date_id, DROP id_user_id, DROP id_horse_id');
        $this->addSql('ALTER TABLE healthy ADD CONSTRAINT FK_7FABBDE8B897366B FOREIGN KEY (date_id) REFERENCES planning_healthy (id)');
        $this->addSql('ALTER TABLE healthy ADD CONSTRAINT FK_7FABBDE8A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE healthy ADD CONSTRAINT FK_7FABBDE876B275AD FOREIGN KEY (horse_id) REFERENCES horse (id)');
        $this->addSql('CREATE INDEX IDX_7FABBDE8B897366B ON healthy (date_id)');
        $this->addSql('CREATE INDEX IDX_7FABBDE8A76ED395 ON healthy (user_id)');
        $this->addSql('CREATE INDEX IDX_7FABBDE876B275AD ON healthy (horse_id)');
        $this->addSql('ALTER TABLE horse DROP FOREIGN KEY FK_629A2F1879F37AE5');
        $this->addSql('DROP INDEX IDX_629A2F1879F37AE5 ON horse');
        $this->addSql('ALTER TABLE horse CHANGE id_user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE horse ADD CONSTRAINT FK_629A2F18A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_629A2F18A76ED395 ON horse (user_id)');
        $this->addSql('ALTER TABLE planning_box DROP FOREIGN KEY FK_9F0860826699938');
        $this->addSql('ALTER TABLE planning_box DROP FOREIGN KEY FK_9F08608FE20CED2');
        $this->addSql('DROP INDEX IDX_9F0860826699938 ON planning_box');
        $this->addSql('DROP INDEX IDX_9F08608FE20CED2 ON planning_box');
        $this->addSql('ALTER TABLE planning_box ADD box_id INT NOT NULL, ADD horse_id INT NOT NULL, DROP id_box_id, DROP id_horse_id');
        $this->addSql('ALTER TABLE planning_box ADD CONSTRAINT FK_9F08608D8177B3F FOREIGN KEY (box_id) REFERENCES box (id)');
        $this->addSql('ALTER TABLE planning_box ADD CONSTRAINT FK_9F0860876B275AD FOREIGN KEY (horse_id) REFERENCES horse (id)');
        $this->addSql('CREATE INDEX IDX_9F08608D8177B3F ON planning_box (box_id)');
        $this->addSql('CREATE INDEX IDX_9F0860876B275AD ON planning_box (horse_id)');
        $this->addSql('ALTER TABLE planning_healthy DROP FOREIGN KEY FK_A2C6E00379F37AE5');
        $this->addSql('DROP INDEX IDX_A2C6E00379F37AE5 ON planning_healthy');
        $this->addSql('ALTER TABLE planning_healthy CHANGE id_user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE planning_healthy ADD CONSTRAINT FK_A2C6E003A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_A2C6E003A76ED395 ON planning_healthy (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE disponibility DROP FOREIGN KEY FK_38BB9260A76ED395');
        $this->addSql('DROP INDEX IDX_38BB9260A76ED395 ON disponibility');
        $this->addSql('ALTER TABLE disponibility CHANGE user_id id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE disponibility ADD CONSTRAINT FK_38BB926079F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_38BB926079F37AE5 ON disponibility (id_user_id)');
        $this->addSql('ALTER TABLE healthy DROP FOREIGN KEY FK_7FABBDE8B897366B');
        $this->addSql('ALTER TABLE healthy DROP FOREIGN KEY FK_7FABBDE8A76ED395');
        $this->addSql('ALTER TABLE healthy DROP FOREIGN KEY FK_7FABBDE876B275AD');
        $this->addSql('DROP INDEX IDX_7FABBDE8B897366B ON healthy');
        $this->addSql('DROP INDEX IDX_7FABBDE8A76ED395 ON healthy');
        $this->addSql('DROP INDEX IDX_7FABBDE876B275AD ON healthy');
        $this->addSql('ALTER TABLE healthy ADD id_date_id INT NOT NULL, ADD id_user_id INT NOT NULL, ADD id_horse_id INT NOT NULL, DROP date_id, DROP user_id, DROP horse_id');
        $this->addSql('ALTER TABLE healthy ADD CONSTRAINT FK_7FABBDE826699938 FOREIGN KEY (id_horse_id) REFERENCES horse (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE healthy ADD CONSTRAINT FK_7FABBDE8660A9F1B FOREIGN KEY (id_date_id) REFERENCES planning_healthy (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE healthy ADD CONSTRAINT FK_7FABBDE879F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_7FABBDE826699938 ON healthy (id_horse_id)');
        $this->addSql('CREATE INDEX IDX_7FABBDE8660A9F1B ON healthy (id_date_id)');
        $this->addSql('CREATE INDEX IDX_7FABBDE879F37AE5 ON healthy (id_user_id)');
        $this->addSql('ALTER TABLE horse DROP FOREIGN KEY FK_629A2F18A76ED395');
        $this->addSql('DROP INDEX IDX_629A2F18A76ED395 ON horse');
        $this->addSql('ALTER TABLE horse CHANGE user_id id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE horse ADD CONSTRAINT FK_629A2F1879F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_629A2F1879F37AE5 ON horse (id_user_id)');
        $this->addSql('ALTER TABLE planning_box DROP FOREIGN KEY FK_9F08608D8177B3F');
        $this->addSql('ALTER TABLE planning_box DROP FOREIGN KEY FK_9F0860876B275AD');
        $this->addSql('DROP INDEX IDX_9F08608D8177B3F ON planning_box');
        $this->addSql('DROP INDEX IDX_9F0860876B275AD ON planning_box');
        $this->addSql('ALTER TABLE planning_box ADD id_box_id INT NOT NULL, ADD id_horse_id INT NOT NULL, DROP box_id, DROP horse_id');
        $this->addSql('ALTER TABLE planning_box ADD CONSTRAINT FK_9F0860826699938 FOREIGN KEY (id_horse_id) REFERENCES horse (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE planning_box ADD CONSTRAINT FK_9F08608FE20CED2 FOREIGN KEY (id_box_id) REFERENCES box (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_9F0860826699938 ON planning_box (id_horse_id)');
        $this->addSql('CREATE INDEX IDX_9F08608FE20CED2 ON planning_box (id_box_id)');
        $this->addSql('ALTER TABLE planning_healthy DROP FOREIGN KEY FK_A2C6E003A76ED395');
        $this->addSql('DROP INDEX IDX_A2C6E003A76ED395 ON planning_healthy');
        $this->addSql('ALTER TABLE planning_healthy CHANGE user_id id_user_id INT NOT NULL');
        $this->addSql('ALTER TABLE planning_healthy ADD CONSTRAINT FK_A2C6E00379F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_A2C6E00379F37AE5 ON planning_healthy (id_user_id)');
    }
}

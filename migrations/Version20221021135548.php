<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221021135548 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE message_prive ADD util_mp_id_id INT NOT NULL');
        // $this->addSql('ALTER TABLE message_prive ADD CONSTRAINT FK_2DB3B2621724753 FOREIGN KEY (util_mp_id_id) REFERENCES user (id)');
        // $this->addSql('CREATE UNIQUE INDEX UNIQ_2DB3B2621724753 ON message_prive (util_mp_id_id)');
        $this->addSql("INSERT INTO `user` (`id`, `email`, `roles`, `password`, `nom_util`, `prenom_util`, `pseudo_util`, `age_util`, `date_crea_util`, `actif_util`, `pfp_user`) VALUES
        (1, 'admin@gmail.fr', '[\"ROLE_ADMIN\"]', '\$2\$13\$yv3sYeX/AVb4VCeOMV/pdO1ZbMU9syQuRse3IOGZJBo1ViW7A7MJ6', 'AdminNom', 'AdminPrenom', 'Admin', 1, '2022-09-19 06:30:20', 1, 'image/logo.png'),
        (3, 'exemple@gmail.fr', '[\"ROLE_ADMIN\"]', '\$2y\$13\$.caKrsoSJdDNFq1vvV.g4OuEKEbBhZAWBCOUZXr.us0svnm.C6sWq', 'exempleNom1', 'exemplePre1', 'exemple1', 1, '2017-01-01 00:00:00', 1, 'image/pfp.png'),
        (18, 'xXPseudoXx@gmail.fr', '[]', '\$2y\$13\$MVRRjIuiTsC92jJ.fZOjbOek58DmQB8r2tLFn.PUmp2vcDWeYC6s.', 'Henry', 'Jesaispas', 'xXPseudoXx', 1, '2022-10-13 16:34:10', 1, 'image/photofunky.gif'),
        (19, 'John@gmail.fr', '[]', '\$2y\$13\$WKGfYV9o17Azh1avGQlkcegVsVgEak41Jn8lvmjBQygxSIadtg5sO', 'John', 'Test', 'Pseudo1', 1, '2022-10-15 20:31:59', 1, 'image/Cat03.jpg'),
        (20, 'JackPierre1@gmail.com', '[]', '\$2y\$13\$zPWPqLcgWGsJlGFVV2RBeeaZOQg4xdHlQw8TDdbtrTtJzhqhpWe5q', 'Jack', 'Pierre', 'Jack Pierre', 1, '2022-10-15 23:16:00', 1, 'image/bg-01.jpg'),
        (21, 'Gabriel@gmail.com', '[]', '\$2y\$13\$2hmXMGrwedS1NT2c4vj9.eUCdOzwsC2uv..scWD7UX1ZLWDMZLnI.', 'Yoann', 'Andréas', 'Gabriel', 1, '2022-10-16 16:04:32', 1, 'image/pfp.png'),
        (23, 'JackPierre2@gmail.com', '[\"ROLE_ADMIN\"]', '\$2y\$13\$rqfOuNg6GcOMa0XDXuq/hO90ba7kgh5RAVYiodB0reZm/aurdnP1a', 'Admin 3', 'Admin 3', 'Admin 3', 1, '2022-10-20 13:43:03', 1, 'image/pfp.png'),
        (24, 'OuiTest@gmail.com', '[]', '\$2y\$13\$k/DkktzFRPIjiSfntyFIHeCOczZYA.40lEl5nW6h4mZ8CYY8uSIJm', 'OuiTest', 'OuiTest', 'OuiTest', 1, '2022-10-21 14:36:15', 1, 'image/pfp.png'),
        (25, 'exempleApi@gmail.com', '[\"\"]', 'API', 'API', 'API', 'API', 1, '2022-12-02 12:44:54', 1, ''),
        (26, 'API2@gmail.com', '[]', 'API2', 'API2', 'API2', 'Test api 2', 1, '2022-12-02 15:16:02', 1, ''),
        (27, 'API3@gmail.com', '[]', 'API3#', 'API3', 'API3', 'API3', 1, '2022-12-05 07:30:00', 1, '');");
        $this->addSql("INSERT INTO `message_public` (`id`, `texte_message`, `like_message`, `rt_message`, `image`, `date_crea_message`, `util_id`) VALUES
        (110, 'Bonjour, je suis nouveau ! ', 0, 0, NULL, '2022-10-15 18:40:13', 18),
        (112, 'Je suis l\'administrateur de ce site ! ', 999, 999, NULL, '2022-10-15 21:37:54', 1),
        (113, 'Je ne sais pas quoi écrire. ', 2, 35, NULL, '2022-10-15 21:38:49', 20),
        (114, 'J\'ai aucune idée de tweet', 23, 59, NULL, '2022-10-17 07:45:13', 21),
        (117, 'Suspendisse interdum, odio eget porta euismod, nunc sem vestibulum libero, ut laoreet metus diam non turpis. Interdum et malesuada fames ac', 0, 0, NULL, '2022-10-20 14:28:02', 20),
        (118, 'Suspendisse interdum, odio eget porta euismod, nunc sem vestibulum libero, ut laoreet metus diam non turpis. Interdum et malesuada fames ac', 0, 0, NULL, '2022-10-20 14:28:02', 20),
        (119, 'Suspendisse interdum, odio eget porta euismod, nunc sem vestibulum libero, ut laoreet metus diam non turpis. Interdum et malesuada fames ac', 0, 0, NULL, '2022-10-20 14:28:02', 20),
        (120, 'Suspendisse interdum, odio eget porta euismod, nunc sem vestibulum libero, ut laoreet metus diam non turpis. Interdum et malesuada fames ac', 0, 0, NULL, '2022-10-20 14:28:02', 20),
        (121, 'Suspendisse interdum, odio eget porta euismod, nunc sem vestibulum libero, ut laoreet metus diam non turpis. Interdum et malesuada fames ac', 0, 0, NULL, '2022-10-20 14:28:02', 20),
        (122, 'Suspendisse interdum, odio eget porta euismod, nunc sem vestibulum libero, ut laoreet metus diam non turpis. Interdum et malesuada fames ac', 0, 0, NULL, '2022-10-20 14:28:02', 20),
        (125, 'Ceci est un est pour la pagination N°1.', 0, 0, NULL, '2022-10-20 16:43:05', 20),
        (126, 'Ceci est un est pour la pagination N°1.', 0, 0, NULL, '2022-10-20 16:43:12', 20),
        (127, 'Ceci est un est pour la pagination N°1.', 0, 0, NULL, '2022-10-20 16:43:12', 20),
        (128, 'Ceci est un est pour la pagination N°1.', 0, 0, NULL, '2022-10-20 16:43:12', 20),
        (129, 'Ceci est un est pour la pagination N°1.', 0, 0, NULL, '2022-10-20 16:43:12', 20),
        (130, 'Ceci est un est pour la pagination N°1.', 0, 0, NULL, '2022-10-20 16:43:12', 20),
        (131, 'Ceci est un est pour la pagination N°1.', 0, 0, NULL, '2022-10-20 16:43:12', 20),
        (132, 'Bonjouuuuuuuuur', 0, 0, NULL, '2022-11-06 11:28:15', 20);");
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        // $this->addSql('ALTER TABLE message_prive DROP FOREIGN KEY FK_2DB3B2621724753');
        // $this->addSql('DROP INDEX UNIQ_2DB3B2621724753 ON message_prive');
        // $this->addSql('ALTER TABLE message_prive DROP util_mp_id_id');
    }
}

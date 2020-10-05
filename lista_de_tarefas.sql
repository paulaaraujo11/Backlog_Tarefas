/*
SQLyog Ultimate
MySQL - 10.4.6-MariaDB : Database - lista_de_tarefas
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `status_tarefa` */

CREATE TABLE `status_tarefa` (
  `id_status` int(11) DEFAULT NULL,
  `descricao_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `status_tarefa` */

insert  into `status_tarefa`(`id_status`,`descricao_status`) values (1,'A FAZER');
insert  into `status_tarefa`(`id_status`,`descricao_status`) values (2,'EM DESENVOLVIMENTO');
insert  into `status_tarefa`(`id_status`,`descricao_status`) values (3,'TESTE');
insert  into `status_tarefa`(`id_status`,`descricao_status`) values (4,'APROVADO');
insert  into `status_tarefa`(`id_status`,`descricao_status`) values (5,'FINALIZADO/EM PRODUÇÃO');

/*Table structure for table `tarefas` */

CREATE TABLE `tarefas` (
  `id_tarefa` int(11) NOT NULL AUTO_INCREMENT,
  `titulo_tarefa` varchar(255) DEFAULT NULL,
  `descricao_tarefa` varchar(255) DEFAULT NULL,
  `tempo_inicio_tarefa` datetime DEFAULT NULL,
  `tempo_termino_tarefa` datetime DEFAULT NULL,
  `usuario_tarefa` int(11) DEFAULT NULL,
  `status_tarefa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_tarefa`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `tarefas` */

/*Table structure for table `usuarios` */

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `login_usuario` varchar(255) NOT NULL,
  `senha_usuario` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `usuarios` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

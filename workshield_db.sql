-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-11-2025 a las 00:29:07
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `workshield_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `audits`
--

CREATE TABLE `audits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `action` varchar(255) NOT NULL,
  `target_model` varchar(255) DEFAULT NULL,
  `target_id` bigint(20) UNSIGNED DEFAULT NULL,
  `changes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`changes`)),
  `ip` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `hire_date` date DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `bank_account` varchar(255) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `first_name`, `last_name`, `email`, `phone`, `area`, `position`, `hire_date`, `salary`, `bank_account`, `notes`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'Carlos', 'Ramírez', 'carlos.ramirez@workshield.cr', '+506 88001122', 'Administración', 'Director General', '2020-01-15', 2500000.00, 'CR120001001234567890123', 'Director General de la empresa', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(2, 'Ana', 'Jiménez', 'ana.jimenez@workshield.cr', '+506 88002233', 'Recursos Humanos', 'Gerente de RRHH', '2020-03-10', 1800000.00, 'CR120001002345678901234', 'Gerente del departamento de RRHH', 2, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(3, 'Luis', 'Mora', 'luis.mora@workshield.cr', '+506 88003344', 'Contabilidad', 'Contador Principal', '2020-06-01', 1600000.00, 'CR120001003456789012345', 'Contador certificado CPA', 3, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(4, 'Patricia', 'Solís', 'patricia.solis@workshield.cr', '+506 88004455', 'TI', 'Jefa de Tecnología', '2020-08-15', 1900000.00, 'CR120001004567890123456', 'Líder del departamento de TI', 2, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(5, 'Roberto', 'Vargas', 'roberto.vargas@workshield.cr', '+506 88005566', 'Ventas', 'Gerente de Ventas', '2021-01-20', 1700000.00, 'CR120001005678901234567', 'Gerente del equipo de ventas', 2, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(6, 'María', 'Hernández', 'maria.hernandez@workshield.cr', '+506 88006677', 'Recursos Humanos', 'Analista de RRHH', '2021-03-05', 1200000.00, 'CR120001006789012345678', 'Especialista en reclutamiento', 3, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(7, 'Diego', 'Castro', 'diego.castro@workshield.cr', '+506 88007788', 'TI', 'Desarrollador Senior', '2021-05-10', 1400000.00, 'CR120001007890123456789', 'Desarrollador Full Stack', 4, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(8, 'Laura', 'Pérez', 'laura.perez@workshield.cr', '+506 88008899', 'Contabilidad', 'Asistente Contable', '2021-07-01', 950000.00, 'CR120001008901234567890', 'Asistente en contabilidad general', NULL, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(9, 'Esteban', 'Rojas', 'esteban.rojas@workshield.cr', '+506 88009900', 'Producción', 'Supervisor de Producción', '2021-09-15', 1300000.00, 'CR120001009012345678901', 'Supervisor de línea de producción', 4, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(10, 'Gabriela', 'Monge', 'gabriela.monge@workshield.cr', '+506 88010011', 'Ventas', 'Ejecutiva de Ventas', '2021-11-01', 1100000.00, 'CR120001010123456789012', 'Ventas de productos corporativos', NULL, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(11, 'Fernando', 'Arias', 'fernando.arias@workshield.cr', '+506 88011122', 'TI', 'Desarrollador Junior', '2022-01-10', 900000.00, 'CR120001011234567890123', 'Desarrollador backend', NULL, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(12, 'Silvia', 'Navarro', 'silvia.navarro@workshield.cr', '+506 88012233', 'Atención al Cliente', 'Jefa de Servicio', '2022-03-20', 1250000.00, 'CR120001012345678901234', 'Líder del equipo de soporte', 4, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(13, 'Andrés', 'Villalobos', 'andres.villalobos@workshield.cr', '+506 88013344', 'Producción', 'Operario de Producción', '2022-05-15', 750000.00, 'CR120001013456789012345', 'Operario en línea de ensamblaje', NULL, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(14, 'Valeria', 'Quesada', 'valeria.quesada@workshield.cr', '+506 88014455', 'Marketing', 'Gerente de Marketing', '2022-07-01', 1600000.00, 'CR120001014567890123456', 'Estrategias de marketing digital', 2, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(15, 'Jorge', 'Brenes', 'jorge.brenes@workshield.cr', '+506 88015566', 'Logística', 'Coordinador Logístico', '2022-09-10', 1150000.00, 'CR120001015678901234567', 'Coordinación de envíos y distribución', 4, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(16, 'Daniela', 'Murillo', 'daniela.murillo@workshield.cr', '+506 88016677', 'Atención al Cliente', 'Agente de Soporte', '2023-01-15', 850000.00, 'CR120001016789012345678', 'Soporte técnico al cliente', NULL, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(17, 'Pablo', 'Chacón', 'pablo.chacon@workshield.cr', '+506 88017788', 'TI', 'Analista de Sistemas', '2023-03-20', 1300000.00, 'CR120001017890123456789', 'Análisis y diseño de sistemas', 4, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(18, 'Carolina', 'Fonseca', 'carolina.fonseca@workshield.cr', '+506 88018899', 'Recursos Humanos', 'Coordinadora de Capacitación', '2023-05-10', 1100000.00, 'CR120001018901234567890', 'Programas de desarrollo profesional', 3, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(19, 'Mauricio', 'Loría', 'mauricio.loria@workshield.cr', '+506 88019900', 'Ventas', 'Ejecutivo de Ventas', '2023-07-01', 1050000.00, 'CR120001019012345678901', 'Ventas B2B', NULL, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(20, 'Tatiana', 'Esquivel', 'tatiana.esquivel@workshield.cr', '+506 88020011', 'Marketing', 'Especialista en Redes Sociales', '2023-09-15', 950000.00, 'CR120001020123456789012', 'Gestión de redes sociales corporativas', NULL, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(21, 'Ricardo', 'Zamora', 'ricardo.zamora@workshield.cr', '+506 88021122', 'Producción', 'Técnico de Mantenimiento', '2024-01-10', 900000.00, 'CR120001021234567890123', 'Mantenimiento preventivo y correctivo', NULL, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(22, 'Melissa', 'Cordero', 'melissa.cordero@workshield.cr', '+506 88022233', 'Contabilidad', 'Analista Financiero', '2024-03-05', 1350000.00, 'CR120001022345678901234', 'Análisis financiero y presupuestos', 3, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(23, 'Alejandro', 'Salas', 'alejandro.salas@workshield.cr', '+506 88023344', 'Logística', 'Asistente de Bodega', '2024-05-20', 800000.00, 'CR120001023456789012345', 'Control de inventarios', NULL, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(24, 'Karina', 'Madrigal', 'karina.madrigal@workshield.cr', '+506 88024455', 'Atención al Cliente', 'Agente de Soporte', '2024-07-15', 850000.00, 'CR120001024567890123456', 'Atención telefónica y por chat', NULL, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(25, 'Oscar', 'Vega', 'oscar.vega@workshield.cr', '+506 88025566', 'TI', 'Ingeniero DevOps', '2024-09-01', 1500000.00, 'CR120001025678901234567', 'Infraestructura y despliegue continuo', 4, '2025-11-01 23:28:12', '2025-11-01 23:28:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_10_30_000001_create_roles_table', 1),
(5, '2025_10_30_000002_create_employees_table', 1),
(6, '2025_10_30_000003_create_payments_table', 1),
(7, '2025_10_30_000004_create_audits_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_date` date NOT NULL,
  `method` varchar(255) DEFAULT NULL,
  `reference` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `payments`
--

INSERT INTO `payments` (`id`, `employee_id`, `amount`, `payment_date`, `method`, `reference`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2500000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-001', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(2, 2, 1800000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-002', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(3, 3, 1600000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-003', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(4, 4, 1900000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-004', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(5, 5, 1700000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-005', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(6, 6, 1200000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-006', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(7, 7, 1400000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-007', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(8, 8, 950000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-008', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(9, 9, 1300000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-009', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(10, 10, 1100000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-010', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(11, 11, 900000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-011', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(12, 12, 1250000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-012', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(13, 13, 750000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-013', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(14, 14, 1600000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-014', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(15, 15, 1150000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-015', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(16, 16, 850000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-016', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(17, 17, 1300000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-017', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(18, 18, 1100000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-018', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(19, 19, 1050000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-019', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(20, 20, 950000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-020', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(21, 21, 900000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-021', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(22, 22, 1350000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-022', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(23, 23, 800000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-023', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(24, 24, 850000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-024', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(25, 25, 1500000.00, '2024-10-31', 'Transferencia Bancaria', 'PAY-2024-10-025', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(26, 1, 2500000.00, '2024-09-30', 'Transferencia Bancaria', 'PAY-2024-09-001', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(27, 2, 1800000.00, '2024-09-30', 'Transferencia Bancaria', 'PAY-2024-09-002', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(28, 3, 1600000.00, '2024-09-30', 'Transferencia Bancaria', 'PAY-2024-09-003', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(29, 4, 1900000.00, '2024-09-30', 'Transferencia Bancaria', 'PAY-2024-09-004', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(30, 5, 1700000.00, '2024-09-30', 'Transferencia Bancaria', 'PAY-2024-09-005', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(31, 6, 1200000.00, '2024-09-30', 'Transferencia Bancaria', 'PAY-2024-09-006', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(32, 7, 1400000.00, '2024-09-30', 'Transferencia Bancaria', 'PAY-2024-09-007', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(33, 8, 950000.00, '2024-09-30', 'Transferencia Bancaria', 'PAY-2024-09-008', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(34, 9, 1300000.00, '2024-09-30', 'Transferencia Bancaria', 'PAY-2024-09-009', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(35, 10, 1100000.00, '2024-09-30', 'Transferencia Bancaria', 'PAY-2024-09-010', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(36, 1, 208333.33, '2024-12-01', 'Transferencia Bancaria', 'BON-AGU-2024-001', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(37, 2, 150000.00, '2024-12-01', 'Transferencia Bancaria', 'BON-AGU-2024-002', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(38, 3, 133333.33, '2024-12-01', 'Transferencia Bancaria', 'BON-AGU-2024-003', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(39, 4, 158333.33, '2024-12-01', 'Transferencia Bancaria', 'BON-AGU-2024-004', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(40, 5, 141666.67, '2024-12-01', 'Transferencia Bancaria', 'BON-AGU-2024-005', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(41, 11, 450000.00, '2024-10-15', 'Efectivo', 'ADL-2024-10-001', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(42, 13, 375000.00, '2024-10-15', 'Efectivo', 'ADL-2024-10-002', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(43, 16, 425000.00, '2024-10-15', 'Transferencia Bancaria', 'ADL-2024-10-003', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(44, 9, 150000.00, '2024-10-31', 'Transferencia Bancaria', 'HEX-2024-10-001', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(45, 13, 85000.00, '2024-10-31', 'Transferencia Bancaria', 'HEX-2024-10-002', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(46, 21, 95000.00, '2024-10-31', 'Transferencia Bancaria', 'HEX-2024-10-003', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(47, 5, 250000.00, '2024-10-15', 'Transferencia Bancaria', 'BON-DES-2024-10-001', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(48, 10, 150000.00, '2024-10-15', 'Transferencia Bancaria', 'BON-DES-2024-10-002', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(49, 14, 200000.00, '2024-10-15', 'Transferencia Bancaria', 'BON-DES-2024-10-003', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(50, 19, 125000.00, '2024-10-15', 'Transferencia Bancaria', 'BON-DES-2024-10-004', 1, '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(51, 14, 123452.00, '2025-11-01', 'Cheque', 'PAY-2024-10-035', NULL, '2025-11-02 05:37:03', '2025-11-02 05:38:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Acceso total al sistema, Gestión completa', '2025-11-01 23:28:12', '2025-11-02 06:12:29'),
(2, 'Gerente', 'Gestiona empleados, pagos y reportes', '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(3, 'Recursos Humanos', 'Gestión de personal y nóminas', '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(4, 'Supervisor', 'Supervisa equipos de trabajo', '2025-11-01 23:28:12', '2025-11-01 23:28:12'),
(6, 'Empleado', 'Acceso limitado a información personal', '2025-11-03 04:44:28', '2025-11-03 04:44:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('fgYepsJ7ynkg8P8SrlB3c6iMbUT6iKxrLHfdDsVk', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTzVUd09MVVVUdmNzT094Ujk0Njk5SXNZSnFTdThZNEZpejQ5cnY4aSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9lbXBsb3llZXMiO3M6NToicm91dGUiO3M6MTU6ImVtcGxveWVlcy5pbmRleCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1762123820),
('w3jT0b0Ph0FXOwPIP8uY6bhA5751CHZFcRzA33fN', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiM2VXSzhHZnZDWkIyemxDdVFadHBlbEEzWmp6S3U2VzdzZ1VQd0dZZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yb2xlcyI7czo1OiJyb3V0ZSI7czoxMToicm9sZXMuaW5kZXgiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1762042367);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Randall Madrigal Pérez', 'lpperezo84@gmail.com', NULL, '$2y$12$jeYAJu9y7ldS7e/muNjVqOukA9BGyG3bbz.Cc.BcrfFQCPbkaMEuC', 'PWin002imdGp0FG2E785nhv51daGppJWWl9t1alNBuPcyVEvffPkmKToimbV', '2025-10-31 07:57:17', '2025-10-31 07:57:17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_employee_id_foreign` (`employee_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `audits`
--
ALTER TABLE `audits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

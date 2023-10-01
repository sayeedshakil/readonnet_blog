-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 11, 2021 at 05:57 PM
-- Server version: 8.0.26
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `readonne_readonnet_blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Education', '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(3, 'Technology', '2021-09-12 07:56:19', '2021-09-12 07:56:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_23_143113_create_roles_table', 1),
(6, '2021_08_23_202411_create_categories_table', 1),
(7, '2021_08_28_071650_create_role_user_table', 1),
(8, '2021_08_31_193426_create_permissions_table', 1),
(9, '2021_08_31_194348_create_permission_role_table', 1),
(10, '2021_09_01_190210_create_posts_table', 1),
(11, '2021_09_02_165918_create_tags_table', 1),
(12, '2021_09_02_171203_create_post_tag_table', 1),
(13, '2021_09_04_065156_add_unique_user_id_to_users_table', 1),
(14, '2021_09_04_065225_add_unique_post_id_to_posts_table', 1),
(15, '2021_09_04_080226_create_notifications_table', 1),
(16, '2021_09_04_173541_add_is_active_to_posts_table', 1),
(17, '2021_09_05_201800_add_slug_to_posts_table', 1),
(18, '2021_09_07_034745_add_image_and_others_to_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('abdc3e55-4c0f-4b1a-a7f9-715868716abb', 'App\\Notifications\\NewUserDatabaseNotification', 'App\\Models\\User', 1, '{\"name\":\"Alma Callahan\",\"email\":\"tyjiv@mailinator.com\"}', NULL, '2021-09-12 07:54:58', '2021-09-12 07:54:58');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'user_management_access', NULL, NULL),
(2, 'permission_create', NULL, NULL),
(3, 'permission_edit', NULL, NULL),
(4, 'permission_show', NULL, NULL),
(5, 'permission_delete', NULL, NULL),
(6, 'permission_access', NULL, NULL),
(7, 'role_create', NULL, NULL),
(8, 'role_edit', NULL, NULL),
(9, 'role_show', NULL, NULL),
(10, 'role_delete', NULL, NULL),
(11, 'role_access', NULL, NULL),
(12, 'user_create', NULL, NULL),
(13, 'user_edit', NULL, NULL),
(14, 'user_show', NULL, NULL),
(15, 'user_delete', NULL, NULL),
(16, 'user_access', NULL, NULL),
(17, 'category_create', NULL, NULL),
(18, 'category_edit', NULL, NULL),
(19, 'category_show', NULL, NULL),
(20, 'category_delete', NULL, NULL),
(21, 'category_access', NULL, NULL),
(22, 'change_password_access', NULL, NULL),
(23, 'post_create', NULL, NULL),
(24, 'post_edit', NULL, NULL),
(25, 'post_show', NULL, NULL),
(26, 'post_delete', NULL, NULL),
(27, 'post_access', NULL, NULL),
(28, 'post_review', NULL, NULL),
(29, 'database_notification_access', NULL, NULL),
(30, 'no_permissions', NULL, NULL),
(31, 'post_for_other_access', NULL, NULL),
(32, 'post_for_other_create', NULL, NULL),
(33, 'post_for_other_edit', NULL, NULL),
(34, 'post_for_other_delete', NULL, NULL),
(35, 'profile_access', NULL, NULL),
(36, 'profile_create', NULL, NULL),
(37, 'profile_edit', NULL, NULL),
(38, '	profile_delete', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `role_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 2, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 3, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 4, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 5, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 6, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 7, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 8, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 9, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 10, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 11, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 12, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 13, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 14, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 15, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 16, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 17, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 18, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 19, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 20, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 21, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 22, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 23, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 24, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 25, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 26, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 27, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 28, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 29, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 30, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 31, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 32, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 33, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 34, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 35, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 36, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 37, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 38, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(6, 30, '2021-09-12 07:51:56', '2021-09-12 07:51:56'),
(5, 29, '2021-09-12 07:52:02', '2021-09-12 07:52:02'),
(4, 22, '2021-09-12 07:52:52', '2021-09-12 07:52:52'),
(4, 23, '2021-09-12 07:52:52', '2021-09-12 07:52:52'),
(4, 24, '2021-09-12 07:52:52', '2021-09-12 07:52:52'),
(4, 25, '2021-09-12 07:52:52', '2021-09-12 07:52:52'),
(4, 27, '2021-09-12 07:52:52', '2021-09-12 07:52:52'),
(4, 35, '2021-09-12 07:52:52', '2021-09-12 07:52:52'),
(4, 37, '2021-09-12 07:52:52', '2021-09-12 07:52:52'),
(2, 17, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 18, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 19, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 20, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 21, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 22, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 23, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 24, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 25, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 26, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 27, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 28, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 29, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 30, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 31, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 32, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 33, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 34, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 35, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 36, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 37, '2021-09-12 07:53:31', '2021-09-12 07:53:31'),
(2, 38, '2021-09-12 07:53:31', '2021-09-12 07:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `post` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `unique_post_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `post`, `image`, `user_id`, `category_id`, `deleted_at`, `created_at`, `updated_at`, `unique_post_id`, `is_active`, `slug`) VALUES
(1, 'This is a test post', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>Why do we use it?</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', NULL, 1, 3, NULL, '2021-09-12 07:56:54', '2021-09-12 07:57:00', 'post-220001', 1, 'this-is-a-test-post');

-- --------------------------------------------------------

--
-- Table structure for table `post_tag`
--

CREATE TABLE `post_tag` (
  `post_id` bigint UNSIGNED NOT NULL,
  `tag_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_tag`
--

INSERT INTO `post_tag` (`post_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-09-12 07:56:54', '2021-09-12 07:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', '2021-09-11 21:48:49', '2021-09-11 21:48:49'),
(2, 'Admin', '2021-09-11 21:48:49', '2021-09-11 21:48:49'),
(3, 'Manager', '2021-09-11 21:48:49', '2021-09-11 21:48:49'),
(4, 'Writer', '2021-09-11 21:48:49', '2021-09-11 21:48:49'),
(5, 'Database Notification receiver', '2021-09-11 21:48:49', '2021-09-11 21:48:49'),
(6, 'Deactive', '2021-09-11 21:48:49', '2021-09-11 21:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2021-09-11 21:48:59', '2021-09-11 21:48:59'),
(1, 5, '2021-09-12 07:53:45', '2021-09-12 07:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'tech', '2021-09-12 07:56:54', '2021-09-12 07:56:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `unique_user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `facebook_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expertise` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `interested_in` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `unique_user_id`, `phone`, `image`, `about_title`, `about_description`, `facebook_link`, `instagram_link`, `twitter_link`, `linkedin_link`, `youtube_link`, `website_link`, `expertise`, `interested_in`) VALUES
(1, 'Super Admin', 'admin@admin.com', NULL, '$2y$10$.P0EHDeBSc2wABhmXzsjgePpm1NUVdJU1n2St16/C8b1VaHbaHqxy', NULL, '2021-09-11 21:48:49', '2021-09-12 07:53:45', NULL, 'user-110001', NULL, '1631397083_IMG_20190131_114322_HDR.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Alma Callahan', 'tyjiv@mailinator.com', NULL, '$2y$10$9ljMhWqeazbrbALxcMfqfOptqvdt41mESl5mXywS80NYf3KuY0GYu', NULL, '2021-09-12 07:54:56', '2021-09-12 07:56:09', '2021-09-12 07:56:09', 'user-110002', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD KEY `permission_role_role_id_foreign` (`role_id`),
  ADD KEY `permission_role_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_category_id_foreign` (`category_id`);

--
-- Indexes for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD KEY `post_tag_post_id_foreign` (`post_id`),
  ADD KEY `post_tag_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD KEY `role_user_user_id_foreign` (`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `post_tag`
--
ALTER TABLE `post_tag`
  ADD CONSTRAINT `post_tag_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_tag_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

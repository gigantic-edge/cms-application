-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2025 at 09:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `description` text NOT NULL,
  `featured_image` varchar(255) NOT NULL,
  `ranking` int(11) NOT NULL,
  `is_featured_article` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=No,1=Yes',
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=No,1=Yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `category_id`, `subcategory_id`, `name`, `author`, `slug`, `short_description`, `description`, `featured_image`, `ranking`, `is_featured_article`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Exploring the Future of Web Development: Trends to Watch in 2025', 'Oscar Wilde', 'exploring-the-future-of-web-development-trends-to-watch-in-2025', '<p>Discuss how web development has evolved in recent years and why staying updated on emerging trends is crucial.</p>', '<ol>\r\n	<li><strong>AI Integration</strong>: Explore the rise of AI in web development, such as chatbots, personalization, and predictive analytics.</li>\r\n	<li><strong>Serverless Architectures</strong>: The shift from traditional server management to serverless functions like AWS Lambda, which reduces cost and complexity.</li>\r\n	<li><strong>Low-Code and No-Code Development</strong>: Tools like Webflow, Bubble, and Wix are democratizing web development, allowing non-developers to create apps.</li>\r\n	<li><strong>WebAssembly</strong>: The growing use of WebAssembly for high-performance web applications.</li>\r\n</ol>\r\n\r\n<p> </p>', '1735803129_360_F_214879686_R3HFJlk6WLr1kcdvy6Q9rtNASKN0BZBS.jpg', 10, '1', 'active', '0', '2025-01-02 07:32:12', '2025-01-02 07:32:12'),
(2, 1, 1, 'The Power of Tailwind CSS: Why Developers Are Embracing Utility-First Design', 'Charles Dickens', 'the-power-of-tailwind-css-why-developers-are-embracing-utility-first-design', '<p>A brief overview of Tailwind CSS and its core philosophy.</p>', '<ol>\r\n	<li><strong>Utility-First Design</strong>: The concept of using utility classes (e.g., p-4, bg-blue-500) instead of writing custom CSS.</li>\r\n	<li><strong>Faster Prototyping</strong>: How Tailwind allows for faster development and iteration of designs.</li>\r\n	<li><strong>Customization</strong>: Discussing how Tailwind’s configuration file enables deep customization of your design system.</li>\r\n	<li><strong>Use Cases</strong>: How Tailwind is being used in real-world projects.</li>\r\n	<li><strong>Conclusion</strong>: Tailwind\'s growing adoption in the industry and future potential.</li>\r\n</ol>', '1735803279_0_zeRxucTaTJETPnx6.png', 20, '1', 'active', '0', '2025-01-02 07:34:39', '2025-01-02 07:34:39'),
(3, 1, 1, 'How to Build a Scalable Web Application with Laravel', 'Rudyard Kipling', 'how-to-build-a-scalable-web-application-with-laravel', '<p>Laravel’s robustness and scalability, making it ideal for building large applications.</p>', '<p> </p>\r\n\r\n<ul>\r\n	<li><strong>Database Optimization</strong>: Using Laravel’s Eloquent ORM efficiently, indexing, and query optimization techniques.</li>\r\n	<li><strong>Caching</strong>: Setting up caching for better performance (e.g., Redis, route caching).</li>\r\n	<li><strong>Queues and Jobs</strong>: How Laravel’s queue system helps manage tasks asynchronously for better scalability.</li>\r\n	<li><strong>Testing and Debugging</strong>: Using PHPUnit and Laravel Dusk for automated testing, and Laravel Telescope for debugging.</li>\r\n	<li><strong>Conclusion</strong>: Tips for maintaining a scalable Laravel application long-term.</li>\r\n</ul>', '1735803391_1_eP-KJAthkw68t106qTNhPg.jpg', 30, '1', 'active', '0', '2025-01-02 07:36:31', '2025-01-02 07:36:31'),
(4, 1, 1, 'Web Security Best Practices: Protecting Your Website in 2025', 'John Milton', 'web-security-best-practices-protecting-your-website-in-2025', '<p>The evolving landscape of web security and why developers need to prioritize it.</p>', '<ul>\r\n	<li><strong>Common Threats</strong>:\r\n	<ul>\r\n		<li><strong>Cross-Site Scripting (XSS)</strong>: How to prevent XSS attacks through input sanitization and content security policies.</li>\r\n		<li><strong>SQL Injection</strong>: Importance of using parameterized queries to prevent SQL injection.</li>\r\n		<li><strong>Cross-Site Request Forgery (CSRF)</strong>: How to protect against CSRF attacks with anti-CSRF tokens.</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Best Practices</strong>:\r\n	<ul>\r\n		<li><strong>HTTPS</strong>: Enforcing HTTPS with HTTP Strict Transport Security (HSTS).</li>\r\n		<li><strong>User Authentication</strong>: Implementing secure login systems with multi-factor authentication.</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Conclusion</strong>: How investing in security upfront can save time and money in the long run.</li>\r\n</ul>', '1735803575_cover-Redesign-WebSecurityVulnerabilities-Luke_Newsletter.png', 40, '1', 'active', '0', '2025-01-02 07:38:22', '2025-01-02 07:39:35'),
(5, 1, 2, 'The Impact of AI on Web Development in the Future', 'W.B Yeats', 'the-impact-of-ai-on-web-development-in-the-future', '<p>As AI continues to evolve, its role in web development is expected to expand further. Here are some potential future trends:</p>', '<ul>\r\n	<li><strong>Automated Web Development</strong>: AI may automate even more aspects of web development, from coding to UI/UX design, enabling developers to focus on higher-level tasks.</li>\r\n	<li><strong>Improved User Experience</strong>: AI will continue to personalize user interactions, making websites feel more intuitive and responsive.</li>\r\n	<li><strong>Data-Driven Decisions</strong>: AI will analyze vast amounts of user data to help businesses make smarter, data-driven decisions that enhance user engagement and drive growth.</li>\r\n	<li><strong>Increased Automation</strong>: AI-powered automation tools will allow developers to streamline repetitive tasks, such as testing and code deployment, improving productivity.</li>\r\n</ul>\r\n\r\n<p><strong>Conclusion</strong>:</p>\r\n\r\n<p>AI is reshaping how web developers approach projects, enhancing user experiences and streamlining workflows. The integration of AI in web development provides opportunities for more personalized, efficient, and engaging websites. As AI technology continues to advance, its impact will likely grow, offering even more innovative ways to build, design, and interact with the web.</p>\r\n\r\n<p>Let me know if you\'d like more specific information or examples on any of these points!</p>', '1735803742_images (1).jpeg', 50, '1', 'active', '0', '2025-01-02 07:42:22', '2025-01-02 07:42:22'),
(6, 3, 4, 'Photography: The Art and Science of Capturing Moments', 'Emily Dickinson', 'photography-the-art-and-science-of-capturing-moments', '<p>Photography is a blend of art and science, capturing moments in time and preserving them for eternity. From the early days of the camera obscura to the modern digital DSLRs and smartphones, photography has evolved into a multifaceted medium for artistic expression, storytelling, and documentation. This article explores the history, techniques, and modern applications of photography, highlighting its importance and versatility.</p>', '<p><strong>1. The History and Evolution of Photography</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Early Beginnings</strong>: The concept of photography dates back to the 19th century. The first successful photograph was taken by Joseph Nicéphore Niépce in 1826 using a process called heliography. This was followed by developments in photographic technology by George Eastman, who invented the Kodak camera, making photography accessible to the general public.</li>\r\n	<li><strong>Film Photography</strong>: Film cameras dominated photography for over a century, with notable inventions such as the 35mm film format and iconic cameras like the Leica, Canon, and Nikon SLRs. Film photography remained the primary medium until the early 2000s.</li>\r\n	<li><strong>The Digital Revolution</strong>: With the advent of digital cameras, photography became more accessible, with the ability to instantly review images and store thousands of photos on memory cards. Digital sensors replaced film, and software like Adobe Photoshop revolutionized the editing process, allowing photographers to enhance their images in ways that weren’t possible with traditional film.</li>\r\n</ul>\r\n\r\n<p><strong>2. The Key Elements of Photography</strong></p>\r\n\r\n<ul>\r\n	<li><strong>Composition</strong>: Composition is the arrangement of elements within the frame. A well-composed photograph tells a story, draws the viewer\'s attention to the subject, and creates balance. Key principles include the rule of thirds, leading lines, symmetry, and framing.</li>\r\n	<li><strong>Exposure</strong>: Exposure is the amount of light that reaches the camera sensor, affecting the brightness of an image. It’s controlled by three factors:\r\n	<ul>\r\n		<li><strong>Aperture</strong>: The size of the opening in the lens, which affects the depth of field and the amount of light entering the camera.</li>\r\n		<li><strong>Shutter Speed</strong>: The duration the shutter remains open, controlling how motion is captured. Faster speeds freeze motion, while slower speeds can create motion blur.</li>\r\n		<li><strong>ISO</strong>: The sensitivity of the sensor to light. Higher ISO settings allow for shooting in low-light conditions, but may introduce noise or grain.</li>\r\n	</ul>\r\n	</li>\r\n	<li><strong>Focus</strong>: Sharp focus on the subject is crucial in photography. The focus can be adjusted manually or automatically, depending on the camera settings and desired outcome.</li>\r\n	<li><strong>Lighting</strong>: Lighting is the most important aspect of photography. Natural light, artificial lighting, or a combination of both can dramatically alter the mood, texture, and impact of an image. Photographers often use reflectors, diffusers, and modifiers to shape light and create the desired effect.</li>\r\n</ul>', '1735803988_c820a90082be53366cb841b4a4e4af4a.jpg', 60, '0', 'active', '0', '2025-01-02 07:46:28', '2025-01-02 07:46:28'),
(7, 3, 4, 'The Rise of Smartphones and Photography of Accessibility', 'W.B Yeats Show', 'the-rise-of-smartphones-and-photography-of-accessibility', '<p>The introduction of smartphones with built-in cameras marked a new era for photography. Today, virtually everyone has access to a camera in their pocket. Some key developments.</p>', '<ul>\r\n	<li><strong>Camera&#39;s&nbsp;Evolution</strong>: Smartphone cameras have come a long way, with features like multi-lens systems, AI-enhanced photography, and computational photography capabilities. Cameras on flagship phones like the <strong>iPhone</strong>, <strong>Samsung Galaxy</strong>, and <strong>Google Pixel</strong> can produce professional-quality photos, even in challenging conditions like low light.</li>\r\n	<li><strong>User-Friendly Technology</strong>: Smartphone cameras are designed to be intuitive and easy to use, allowing anyone&mdash;from casual users to budding photographers&mdash;to take great photos without needing to understand the technical aspects of traditional photography.</li>\r\n	<li><strong>Accessibility and Democratization of Photography</strong>: With smartphones, everyone has become a photographer. Social media platforms like <strong>Instagram</strong>, <strong>Snapchat</strong>, and <strong>TikTok</strong> encourage users to share photos and videos instantly, democratizing the art form. People from all walks of life can capture their experiences and perspectives, sharing them with a global audience.</li>\r\n</ul>', '1735804386_images (2).jpeg', 70, '1', 'active', '0', '2025-01-02 07:48:50', '2025-01-02 07:53:06'),
(8, 3, 5, 'Digital Art: Revolutionizing Creativity in the Digital Age', 'John Milton', 'digital-art-revolutionizing-creativity-in-the-digital-age', '<p>Digital art has emerged as one of the most exciting and rapidly evolving fields within the art world. From computer-generated graphics to interactive installations, digital art has opened up new creative possibilities that were once unimaginable with traditional mediums. It combines technology, creativity, and innovation to transform the way we experience and create art. This article explores the rise of digital art, its tools and techniques, its impact on the art world, and its future prospects.</p>', '<ul>\r\n	<li><strong>Digital Painting</strong>: One of the most popular forms of digital art, digital painting involves creating artwork using software that simulates the effect of traditional paint mediums like oils, acrylics, and watercolors. Artists can paint with styluses or brushes on digital canvases, using layers and digital effects to refine their work.</li>\r\n	<li><strong>Digital Illustration</strong>: Digital illustration includes work that uses computer programs to create detailed and stylized artwork. This often includes concept art, character design, book covers, and posters. It can range from highly realistic illustrations to cartoon-like and vector-based work.</li>\r\n	<li><strong>3D Art</strong>: 3D digital art involves the creation of three-dimensional objects and characters, often used in animation, gaming, and virtual reality. Artists use 3D modeling tools to sculpt, texture, and animate objects to bring them to life.</li>\r\n	<li><strong>Pixel Art</strong>: Pixel art is a form of digital art that involves creating images pixel by pixel, often inspired by the graphics of early video games. It&rsquo;s a nostalgic form of art that has gained popularity in contemporary digital culture, especially for indie game development and online communities.</li>\r\n	<li><strong>Motion Graphics and Animation</strong>: Digital artists often work with motion graphics software to create animated visuals, including video clips, commercials, and web animations. Software like <strong>Adobe After Effects</strong> allows artists to combine graphic design and animation techniques to create dynamic and engaging content.</li>\r\n	<li><strong>Generative Art</strong>: This art form uses algorithms and code to create images that can evolve or change based on input, randomness, or external data. Generative art can result in unique, never-before-seen pieces that are constantly in flux, making it a fascinating intersection between art and technology.</li>\r\n	<li><strong>Augmented Reality (AR) and Virtual Reality (VR)</strong>: Digital artists are increasingly using AR and VR to create immersive experiences. AR allows users to interact with digital art in the real world, while VR immerses users in completely virtual environments that they can explore and interact with.</li>\r\n</ul>', '1735804278_generative-ai-illustration-of-an-enthusiastic-young-women-wearing-virtual-reality-goggles-is-inside-the-metaverse-metaverse-concept-and-virtual-world-elements-games-and-entertainment-of-the-digital-photo.jpg', 80, '1', 'active', '0', '2025-01-02 07:51:18', '2025-01-02 07:54:24');

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `ranking` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=No,1=Yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`id`, `name`, `ranking`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'Technology', 10, 'active', '0', '2025-01-02 07:21:35', '2025-01-02 07:21:35'),
(2, 'Lifestyle', 20, 'active', '0', '2025-01-02 07:22:31', '2025-01-02 07:24:33'),
(3, 'Art and Design', 30, 'active', '0', '2025-01-02 07:22:43', '2025-01-02 07:27:30');

-- --------------------------------------------------------

--
-- Table structure for table `article_sub_category`
--

CREATE TABLE `article_sub_category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ranking` int(11) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=No,1=Yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_sub_category`
--

INSERT INTO `article_sub_category` (`id`, `category_id`, `name`, `ranking`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 1, 'Web Development', 10, 'active', '0', '2025-01-02 07:23:29', '2025-01-02 07:23:29'),
(2, 1, 'AI and Machine Learning', 20, 'active', '0', '2025-01-02 07:23:56', '2025-01-02 07:23:56'),
(3, 2, 'Travel and Adventure', 30, 'active', '0', '2025-01-02 07:24:59', '2025-01-02 07:25:06'),
(4, 3, 'Photography', 40, 'active', '0', '2025-01-02 07:25:41', '2025-01-02 07:25:41'),
(5, 3, 'Digital Art', 50, 'active', '0', '2025-01-02 07:26:20', '2025-01-02 07:27:21');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `article_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `is_deleted` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=No,1=Yes',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `article_id`, `comment`, `user_id`, `status`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 3, 'Laravel provides built-in support for authentication, including features like registration, login, password reset, and email verification.', 10, 'approved', '0', '2025-01-02 07:59:56', '2025-01-02 08:00:23'),
(2, 3, 'Views represent the HTML structure that is sent to the browser. They can accept variables passed from controllers and use logic to display dynamic content.', 11, 'approved', '0', '2025-01-02 08:02:43', '2025-01-02 08:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(10, '0001_01_01_000000_create_users_table', 1),
(11, '0001_01_01_000001_create_cache_table', 1),
(12, '0001_01_01_000002_create_jobs_table', 1),
(14, '2024_12_26_174709_create_article_category_table', 2),
(15, '2024_12_27_132525_create_article_sub_category_table', 3),
(22, '2024_12_27_204404_create_articles_table', 4),
(24, '2024_12_30_061808_create_comments_table', 5),
(25, '2024_12_30_171548_add_column_to_article_category', 6),
(27, '2024_12_30_171854_add_column_to_articles', 7),
(29, '2025_01_01_160307_add_column_to_articles', 8),
(30, '2025_01_02_120827_change_is_approved_field_in_users', 9),
(31, '2025_01_02_121857_change_created_at_field_in_article_category', 10),
(32, '2025_01_02_122015_change_created_at_field_in_article_sub_category', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
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
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('fAXdoN0tmCjORdgAs8PfWqbfweN9oINaSV5S6u2y', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieGN5M1N5UE5LWHNqYnR4d0dIck5JbjZ0YmV5MVRjaTlIV25PbGVOMiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6OTc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hcnRpY2xlLWRldGFpbHMvd2ViLXNlY3VyaXR5LWJlc3QtcHJhY3RpY2VzLXByb3RlY3RpbmcteW91ci13ZWJzaXRlLWluLTIwMjUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo2OiJtb2JpbGUiO3M6MTA6Ijg2OTc3MTY5MjgiO3M6MTQ6ImlzX2FkbWluX2xvZ2luIjtpOjE7fQ==', 1735805415),
('GFhA5Gk6yrPZRxa7gXzfh2MVfF5DceqSzN3U7Xwq', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOG1jTWNVR1lySDZha3Jjcndka0hOUUliRDJTNGZjb0JZQnVOWEJDYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735798542),
('gxd6zKhsmh6WMmR8wdy1CcS6JBx4sSihJl5pozJg', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibnBQdkxNT1doVEhnRGtuT3NidkJSanRhNzNZRFZJZENiSWRwSlJRSyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1735800957),
('MHtRNJO53Xunykn5zlp9J3dtdtEyigl7YqDn7vPD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicXdFUWFKRkdpNFNoQmV6RUdvb0t2ZVJKdmZ4NTdKTTlqckxEdVAzYiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9BZG1pbmlzdHJhdG9yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1735801192),
('o0d01U1H0xHE6CJaM4MjbEiBnqlicpUqpZCFWN87', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YToxMDp7czo2OiJfdG9rZW4iO3M6NDA6InNQOGttUTBIYmVRVlFpM0JVQVNSTVlJSlhDSzNYTEhvY1RzNXZYeWsiO3M6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjQ1OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvQWRtaW5pc3RyYXRvci9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjExO3M6NzoidXNlcl9pZCI7aToxMTtzOjQ6Im5hbWUiO3M6OToiRGVlcCBTYWhhIjtzOjU6ImVtYWlsIjtzOjE0OiJkZWVwQGdtYWlsLmNvbSI7czo2OiJtb2JpbGUiO3M6MTA6Ijk4NzQ1NjMyMjIiO3M6OToidXNlcl90eXBlIjtzOjY6IkVESVRPUiI7czoxNDoiaXNfYWRtaW5fbG9naW4iO2k6MTt9', 1735805398),
('QFUNRk42L6yI5brTVKjuGkzVJpc088wCaeTbXqVm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiTU5sVnlZWFBOczI5WGhHWm1lcDUwWHNubjZIcUNHVkxDaWV0TjlOWCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9BZG1pbmlzdHJhdG9yIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1735802027);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_approved` enum('0','1','2') NOT NULL DEFAULT '0' COMMENT '0 = pending, 1 = approved, 2 = rejected',
  `role` enum('ADMIN','EDITOR','USER') NOT NULL DEFAULT 'USER',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `email_verified_at`, `password`, `is_approved`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Avijit Saha', 'admin@admin.com', '7889716928', NULL, '$2y$12$PX7gP3DAk1nSGxLCeZvcLenpDxs7qeUxCXHOP1GVKcYRCdp3dow4e', '1', 'ADMIN', NULL, '2024-12-24 05:48:08', '2025-01-01 13:24:49'),
(10, 'John Snow', 'john@gmail.com', '9632587410', NULL, '$2y$12$YCQiF4sLAFVb1dW5b7Jt0OBlrURhDgbjS.HHonaa.v/kQK7XLOBHi', '1', 'USER', NULL, '2025-01-02 07:58:14', '2025-01-02 07:59:10'),
(11, 'Deep Saha', 'deep@gmail.com', '9874563222', NULL, '$2y$12$RlHRAasyoDjjUaQ/qFW3.eQo.3jvzmEHrq9Dr8E7qWvFlsaanMOHe', '1', 'EDITOR', NULL, '2025-01-02 08:01:49', '2025-01-02 08:09:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_sub_category`
--
ALTER TABLE `article_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `article_category`
--
ALTER TABLE `article_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `article_sub_category`
--
ALTER TABLE `article_sub_category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

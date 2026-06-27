<?php

namespace Database\Seeders;

use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // ---- Admin user ----
        User::updateOrCreate(
            ['email' => 'osamaeidbm1993@gmail.com'],
            ['name' => 'Osama Eid Bakry', 'password' => Hash::make('password')]
        );

        // ---- Projects (from Mostaql portfolio + CV live projects) ----
        $projects = [
            [
                'title' => 'Alertiqa — Accredited Training Platform',
                'category' => 'LMS / EdTech',
                'summary' => 'Government-accredited Saudi training institute platform (30+ years, 25,000+ graduates).',
                'description' => "A full-featured Learning Management System for a Saudi-accredited training institute with over 30 years of history and 25,000+ graduates. Includes diploma programs, course management, student & teacher portals, subscription billing, attendance tracking, digital certification, and a companion mobile app — aligned with Saudi Vision 2030.",
                'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'REST API', 'Sanctum'],
                'url' => 'https://alertiqa.edu.sa',
                'image' => 'Screenshot-2026-03-25-160831.png',
                'featured' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Medad Institute — Quran & Arabic Learning',
                'category' => 'EdTech / Subscriptions',
                'summary' => 'UK-registered non-profit online Quran & Arabic learning platform for global learners.',
                'description' => "A multi-role online learning platform (student / teacher / admin portals) for a UK-registered non-profit. Features flexible subscription plans, session scheduling, tutor profiles, and full course management — serving global learners across all ages and levels.",
                'tech_stack' => ['Laravel', 'Vue.js', 'MySQL', 'Redis', 'Queues'],
                'url' => 'https://medadinstitute.com',
                'image' => 'Screenshot-2026-06-01-140309.png',
                'featured' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Barea Educational Platform',
                'category' => 'LMS / EdTech',
                'summary' => 'E-learning platform with course delivery and student management.',
                'description' => "An educational platform delivering structured courses with enrollment, progress tracking, and content management for students and instructors.",
                'tech_stack' => ['Laravel', 'Vue.js', 'MySQL'],
                'image' => 'Screenshot-2026-06-21-160642.png',
                'featured' => false,
                'sort_order' => 3,
            ],
            [
                'title' => 'Eesh Balash — Discounts & Vendor System',
                'category' => 'Mobile + Admin',
                'summary' => 'Multi-platform discount marketplace with vendor system and admin dashboard.',
                'description' => "A multi-platform solution pairing a customer-facing discount mobile app with a vendor management system and an administrative dashboard. Vendors publish offers; customers redeem discounts; admins oversee the whole marketplace.",
                'tech_stack' => ['Laravel', 'REST API', 'MySQL', 'Sanctum'],
                'image' => 'bandicam-2024-11-23-15-59-41-246.jpg',
                'featured' => false,
                'sort_order' => 4,
            ],
            [
                'title' => 'Real-Time Chat & Calling App',
                'category' => 'Realtime / WebSocket',
                'summary' => 'Messaging and voice-calling application with real-time delivery.',
                'description' => "A real-time communication application supporting instant messaging and voice calls, powered by WebSocket / Laravel Reverb for low-latency delivery and presence.",
                'tech_stack' => ['Laravel', 'Laravel Reverb', 'WebSocket', 'Redis'],
                'image' => 'bandicam-2025-05-10-22-54-27-929.jpg',
                'featured' => false,
                'sort_order' => 5,
            ],
            [
                'title' => 'Multi-Vendor Marketplace',
                'category' => 'E-commerce',
                'summary' => 'Marketplace supporting multiple independent sellers.',
                'description' => "A full e-commerce marketplace where multiple vendors manage their own storefronts, products, and orders, with a unified checkout, commissions, and an admin control panel.",
                'tech_stack' => ['Laravel', 'MySQL', 'REST API', 'Repository Pattern'],
                'image' => 'Capture.PNG',
                'featured' => false,
                'sort_order' => 6,
            ],
            [
                'title' => 'Student Registration System',
                'category' => 'Education Management',
                'summary' => 'Student enrollment and registration management platform.',
                'description' => "A web platform handling student enrollment and registration workflows, including application forms, validation, and administrative review.",
                'tech_stack' => ['Laravel', 'MySQL', 'Blade'],
                'featured' => false,
                'sort_order' => 7,
            ],
            [
                'title' => 'Corporate Informational Website',
                'category' => 'Web',
                'summary' => 'Company presentation and informational website.',
                'description' => "A clean corporate website presenting a company's services, identity, and contact channels with a responsive, content-managed front end.",
                'tech_stack' => ['Laravel', 'Blade', 'Tailwind CSS'],
                'featured' => false,
                'sort_order' => 8,
            ],
        ];

        foreach ($projects as $p) {
            Project::updateOrCreate(
                ['slug' => Str::slug($p['title'])],
                array_merge($p, ['slug' => Str::slug($p['title'])])
            );
        }

        // ---- Skills ----
        $skills = [
            ['Languages', 'PHP', 95], ['Languages', 'Laravel', 95],
            ['Languages', 'JavaScript', 80], ['Languages', 'Vue.js', 78],
            ['APIs', 'RESTful API', 92], ['APIs', 'WebSocket / Reverb', 80],
            ['APIs', 'Sanctum', 88], ['APIs', 'JWT', 85],
            ['Database', 'MySQL', 92], ['Database', 'Eloquent ORM', 92],
            ['Database', 'Query Optimization & Indexing', 88], ['Database', 'Database Design', 88],
            ['Caching & Queues', 'Redis', 85], ['Caching & Queues', 'Laravel Queue & Jobs', 88],
            ['Caching & Queues', 'Events & Listeners', 85],
            ['Architecture', 'SOLID Principles', 90], ['Architecture', 'Repository Pattern', 88],
            ['Architecture', 'Service Layer', 88], ['Architecture', 'Modular Design', 85],
            ['DevOps & Tools', 'Git & GitHub', 90], ['DevOps & Tools', 'Docker', 70],
            ['DevOps & Tools', 'Nginx', 72], ['DevOps & Tools', 'Postman', 88],
        ];

        $order = 0;
        foreach ($skills as [$cat, $name, $level]) {
            Skill::updateOrCreate(
                ['category' => $cat, 'name' => $name],
                ['level' => $level, 'sort_order' => $order++]
            );
        }

        // ---- Experience ----
        $experiences = [
            [
                'company' => 'Squadio (Loop Payment)',
                'role' => 'Mid-Level Backend Developer',
                'period' => 'May 2025 – Present',
                'description' => 'Multi-tenant fintech wallet platform built on a double-entry ledger core.',
                'highlights' => [
                    'Built card top-ups via PayTabs integration.',
                    'Implemented idempotent bank payouts (ANB) with an OTP / approval lifecycle.',
                    'Developed recurring billing and POS settlement using Laravel/Apiato and MySQL.',
                ],
                'sort_order' => 1,
            ],
            [
                'company' => 'Taqnia IT',
                'role' => 'Backend Developer',
                'period' => 'May 2024 – May 2025',
                'description' => 'Backend development with a strong focus on performance and security.',
                'highlights' => [
                    'Reduced MySQL query execution time by 75% (800ms → <200ms) via indexing & Eloquent optimization.',
                    'Deployed a Redis caching layer that cut server load by 40% and improved response time by 60% at peak.',
                    'Led weekly code reviews enforcing security standards across a team of 4 developers.',
                ],
                'sort_order' => 2,
            ],
            [
                'company' => 'E-volve',
                'role' => 'Full Stack Developer',
                'period' => 'Jan 2023 – May 2024',
                'description' => 'Full-stack delivery of REST APIs and automation for mobile and web clients.',
                'highlights' => [
                    'Built Laravel REST APIs with Sanctum & JWT serving 2,000+ active mobile users.',
                    'Automated PDF/Excel reporting with Laravel Jobs, saving clients 10+ hours/week.',
                    'Integrated Twilio SMS and Mailgun email pipelines across 5+ projects.',
                ],
                'sort_order' => 3,
            ],
        ];

        foreach ($experiences as $e) {
            Experience::updateOrCreate(
                ['company' => $e['company'], 'role' => $e['role']],
                $e
            );
        }

        // ---- Testimonials (from Mostaql client reviews — all 5.0/5.0) ----
        $testimonials = [
            [
                'name' => 'Khayra A.',
                'project' => 'Integrated LMS platform for children',
                'rating' => 5,
                'body' => 'A professional engineer and a real asset. Marked by high professionalism, precision in implementation, and great flexibility and patience in understanding requirements.',
            ],
            [
                'name' => 'Jameel A.',
                'project' => 'PHP / Laravel website',
                'rating' => 5,
                'body' => 'One of the best developers I have worked with — peak professionalism, available around the clock, responsive and detailed. Highly recommended.',
            ],
            [
                'name' => 'Rayan M.',
                'project' => 'News website built with Laravel',
                'rating' => 5,
                'body' => 'Exceeded my expectations. Honest, dedicated, and highly experienced — always responsive and fast to deliver.',
            ],
            [
                'name' => 'Mohammed A.',
                'project' => 'Website programming',
                'rating' => 5,
                'body' => 'Excellent work — distinctive and very fast. Professional work in every sense of the word. Highly recommended.',
            ],
            [
                'name' => 'Ahmed A.',
                'project' => 'Private internal web system',
                'rating' => 5,
                'body' => 'Professional work delivered with high efficiency and right on time, with continuous follow-up throughout the project.',
            ],
            [
                'name' => 'Mohammed S.',
                'project' => 'Electronic payment page (PHP / Laravel)',
                'rating' => 5,
                'body' => 'Professional and distinctive work. Exactly what I was looking for.',
            ],
            [
                'name' => 'Jameel A.',
                'project' => 'Internal web system',
                'rating' => 5,
                'body' => 'Skilled and distinctive — responsive and quick to implement every requested modification.',
            ],
            [
                'name' => 'Khalf A.',
                'project' => 'Website design',
                'rating' => 5,
                'body' => 'Very cooperative and patient. I am grateful for your ethics and professionalism throughout the project.',
            ],
        ];

        $order = 0;
        foreach ($testimonials as $t) {
            Testimonial::updateOrCreate(
                ['name' => $t['name'], 'project' => $t['project']],
                array_merge($t, ['source' => 'Mostaql', 'sort_order' => $order++])
            );
        }
    }
}

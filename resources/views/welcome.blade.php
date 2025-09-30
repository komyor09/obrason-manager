<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ObRason CRM - Управление бизнесом доставки воды</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --secondary: #10b981;
            --accent: #f59e0b;
            --dark: #1f2937;
            --light: #f9fafb;
            --border: #e5e7eb;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', sans-serif;
            line-height: 1.6;
            color: var(--dark);
            overflow-x: hidden;
        }

        /* Header */
        .header {
            position: fixed;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            z-index: 1000;
            transition: all 0.3s;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary);
            text-decoration: none;
        }

        .nav {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav a {
            text-decoration: none;
            color: var(--dark);
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav a:hover {
            color: var(--primary);
        }

        .auth-buttons {
            display: flex;
            gap: 1rem;
        }

        .btn {
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            text-decoration: none;
            display: inline-block;
            font-size: 1rem;
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.4);
        }

        .btn-success {
            background: linear-gradient(135deg, var(--secondary), #059669);
            color: white;
        }

        .btn-success:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.4);
        }

        .btn-large {
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
        }

        /* Hero Section */
        .hero {
            margin-top: 80px;
            min-height: 90vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 200%;
            height: 200%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><rect fill="none" width="1200" height="600"/><circle cx="200" cy="150" r="80" fill="white" opacity="0.05"/><circle cx="900" cy="400" r="120" fill="white" opacity="0.05"/><circle cx="600" cy="300" r="100" fill="white" opacity="0.05"/><circle cx="1000" cy="100" r="90" fill="white" opacity="0.05"/></svg>');
            animation: float 20s linear infinite;
        }

        @keyframes float {
            0% { transform: translate(0, 0); }
            100% { transform: translate(-50%, -50%); }
        }

        .hero-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            position: relative;
            z-index: 1;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: bold;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .hero-content p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        .hero-buttons {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .hero-image {
            background: white;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            animation: fadeInUp 1s ease;
        }

        .dashboard-preview {
            width: 100%;
            height: 400px;
            background: linear-gradient(to bottom, var(--light) 0%, white 100%);
            border-radius: 12px;
            padding: 1rem;
            position: relative;
            overflow: hidden;
        }

        .preview-header {
            background: var(--primary);
            height: 40px;
            border-radius: 8px 8px 0 0;
            margin-bottom: 1rem;
        }

        .preview-stats {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .preview-stat {
            background: white;
            padding: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        .preview-chart {
            background: white;
            height: 150px;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            display: flex;
            align-items: flex-end;
            padding: 1rem;
            gap: 0.5rem;
        }

        .preview-bar {
            flex: 1;
            background: var(--primary);
            border-radius: 4px 4px 0 0;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Features Section */
        .features {
            padding: 6rem 2rem;
            background: white;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: bold;
            color: var(--dark);
            margin-bottom: 1rem;
        }

        .section-subtitle {
            text-align: center;
            font-size: 1.2rem;
            color: #6b7280;
            margin-bottom: 4rem;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .feature-card {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            transition: all 0.3s;
            border: 2px solid transparent;
        }

        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(37, 99, 235, 0.15);
            border-color: var(--primary);
        }

        .feature-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            margin-bottom: 1.5rem;
        }

        .feature-card h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .feature-card p {
            color: #6b7280;
            line-height: 1.7;
        }

        /* Benefits Section */
        .benefits {
            padding: 6rem 2rem;
            background: var(--light);
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 4rem;
        }

        .benefit-item {
            text-align: center;
            padding: 2rem;
            background: white;
            border-radius: 16px;
            transition: all 0.3s;
        }

        .benefit-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
        }

        .benefit-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .benefit-item h4 {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            color: var(--dark);
        }

        /* Testimonials */
        .testimonials {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .testimonial {
            background: white;
            padding: 2rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border-left: 4px solid var(--primary);
        }

        .testimonial-text {
            font-style: italic;
            color: #4b5563;
            margin-bottom: 1.5rem;
            line-height: 1.7;
        }

        .testimonial-author {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .testimonial-avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
        }

        .author-info h5 {
            font-weight: 600;
            color: var(--dark);
        }

        .author-info p {
            font-size: 0.9rem;
            color: #6b7280;
        }

        /* Pricing Section */
        .pricing {
            padding: 6rem 2rem;
            background: white;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .pricing-card {
            background: white;
            padding: 2.5rem;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            border: 2px solid var(--border);
            transition: all 0.3s;
            text-align: center;
        }

        .pricing-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 40px rgba(37, 99, 235, 0.15);
            border-color: var(--primary);
        }

        .pricing-card.featured {
            border-color: var(--primary);
            position: relative;
            transform: scale(1.05);
        }

        .pricing-badge {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: linear-gradient(135deg, var(--secondary), #059669);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        .pricing-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
            color: var(--dark);
        }

        .pricing-price {
            font-size: 3rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 0.5rem;
        }

        .pricing-period {
            color: #6b7280;
            margin-bottom: 2rem;
        }

        .pricing-features {
            list-style: none;
            margin-bottom: 2rem;
            text-align: left;
        }

        .pricing-features li {
            padding: 0.7rem 0;
            border-bottom: 1px solid var(--border);
            color: #4b5563;
        }

        .pricing-features li:before {
            content: '✓';
            color: var(--secondary);
            font-weight: bold;
            margin-right: 0.5rem;
        }

        /* CTA Section */
        .cta {
            padding: 6rem 2rem;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .cta::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><circle cx="100" cy="100" r="150" fill="white" opacity="0.05"/><circle cx="1100" cy="500" r="200" fill="white" opacity="0.05"/><circle cx="600" cy="300" r="180" fill="white" opacity="0.05"/></svg>');
        }

        .cta-content {
            position: relative;
            z-index: 1;
            max-width: 800px;
            margin: 0 auto;
        }

        .cta h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .cta p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.95;
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: #d1d5db;
            padding: 4rem 2rem 2rem;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 2rem;
        }

        .footer-section h4 {
            color: white;
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }

        .footer-section p,
        .footer-section a {
            color: #d1d5db;
            text-decoration: none;
            display: block;
            margin-bottom: 0.8rem;
            transition: color 0.3s;
        }

        .footer-section a:hover {
            color: var(--primary);
        }

        .social-icons {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-icon {
            width: 40px;
            height: 40px;
            background: #374151;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
            color: white;
            text-decoration: none;
            font-size: 1.2rem;
        }

        .social-icon:hover {
            background: var(--primary);
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            border-top: 1px solid #374151;
            color: #9ca3af;
        }

        /* Scroll animations */
        .scroll-reveal {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.8s ease;
        }

        .scroll-reveal.active {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive */
        @media (max-width: 768px) {
            .nav {
                display: none;
            }

            .hero-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }

            .hero-content h1 {
                font-size: 2rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .hero-image {
                order: -1;
            }

            .section-title {
                font-size: 2rem;
            }

            .pricing-card.featured {
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="#" class="logo">💧 ObRason CRM</a>
            <nav class="nav">
                <a href="#home">Главная</a>
                <a href="#features">Функции</a>
                <a href="#pricing">Тарифы</a>
                <a href="#cases">Кейсы</a>
                <a href="#contact">Контакты</a>
            </nav>
            <div class="auth-buttons">
                <a href="{{ route('login') }}" class="btn btn-outline">Вход</a>
                <a href="{{ route('register') }}" class="btn btn-primary">Регистрация</a>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-container">
            <div class="hero-content">
                <h1>Управляйте бизнесом доставки воды легко и эффективно</h1>
                <p>ObRason CRM помогает вам следить за заказами, клиентами и доходами в одном месте</p>
                <div class="hero-buttons">
                    <button class="btn btn-success btn-large" onclick="alert('Демо-версия активируется...')">Попробовать демо</button>
                    <button class="btn btn-large" style="background: white; color: var(--primary);" onclick="document.getElementById('features').scrollIntoView({behavior: 'smooth'})">Узнать больше</button>
                </div>
            </div>
            <div class="hero-image">
                <div class="dashboard-preview">
                    <div class="preview-header"></div>
                    <div class="preview-stats">
                        <div class="preview-stat" style="height: 60px; background: linear-gradient(135deg, #dbeafe, #bfdbfe);"></div>
                        <div class="preview-stat" style="height: 60px; background: linear-gradient(135deg, #d1fae5, #a7f3d0);"></div>
                        <div class="preview-stat" style="height: 60px; background: linear-gradient(135deg, #fef3c7, #fde68a);"></div>
                        <div class="preview-stat" style="height: 60px; background: linear-gradient(135deg, #e9d5ff, #d8b4fe);"></div>
                    </div>
                    <div class="preview-chart">
                        <div class="preview-bar" style="height: 40%;"></div>
                        <div class="preview-bar" style="height: 70%;"></div>
                        <div class="preview-bar" style="height: 50%;"></div>
                        <div class="preview-bar" style="height: 90%;"></div>
                        <div class="preview-bar" style="height: 60%;"></div>
                        <div class="preview-bar" style="height: 80%;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features scroll-reveal" id="features">
        <div class="container">
            <h2 class="section-title">Что вы получаете с ObRason CRM</h2>
            <p class="section-subtitle">Полный набор инструментов для эффективного управления бизнесом</p>

            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">👥</div>
                    <h3>Управление клиентами</h3>
                    <p>Храните всю информацию о клиентах в одном месте. История заказов, контакты, предпочтения и заметки.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">📦</div>
                    <h3>Контроль заказов</h3>
                    <p>Отслеживайте заказы от создания до выполнения. Управляйте статусами и уведомлениями автоматически.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🔄</div>
                    <h3>Подписки и тарифы</h3>
                    <p>Настраивайте гибкие планы подписок. Автоматическое продление и напоминания о платежах.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🤖</div>
                    <h3>Автоматизация доставки</h3>
                    <p>Оптимизируйте маршруты курьеров. Автоматическое распределение заказов по зонам.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">📊</div>
                    <h3>Отчёты и аналитика</h3>
                    <p>Визуализация данных в реальном времени. Отслеживайте KPI и принимайте решения на основе данных.</p>
                </div>

                <div class="feature-card">
                    <div class="feature-icon">🔔</div>
                    <h3>Уведомления</h3>
                    <p>Автоматические напоминания для менеджеров и клиентов. Email, SMS и push-уведомления.</p>
                </div>
            </div>

            <div style="text-align: center; margin-top: 3rem;">
                <button class="btn btn-primary btn-large" onclick="alert('Открытие детальной информации о функциях...')">Подробнее о функциях</button>
            </div>
        </div>
    </section>

    <!-- Benefits Section -->
    <section class="benefits scroll-reveal" id="cases">
        <div class="container">
            <h2 class="section-title">Преимущества ObRason CRM</h2>
            <p class="section-subtitle">Почему бизнесы выбирают нашу систему</p>

            <div class="benefits-grid">
                <div class="benefit-item">
                    <div class="benefit-icon">⏱️</div>
                    <h4>Экономия времени</h4>
                    <p>Автоматизация рутинных задач освобождает до 40% времени сотрудников</p>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">🚀</div>
                    <h4>Быстрое внедрение</h4>
                    <p>Начните работу за 1 день. Простая настройка без технических знаний</p>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">🎨</div>
                    <h4>Удобный интерфейс</h4>
                    <p>Интуитивно понятная система. Минимальное обучение персонала</p>
                </div>

                <div class="benefit-item">
                    <div class="benefit-icon">💬</div>
                    <h4>Поддержка 24/7</h4>
                    <p>Команда специалистов готова помочь в любое время суток</p>
                </div>
            </div>

            <!-- Testimonials -->
            <h3 class="section-title" style="margin-top: 4rem; font-size: 2rem;">Отзывы наших клиентов</h3>
            <div class="testimonials">
                <div class="testimonial">
                    <p class="testimonial-text">"После внедрения ObRason CRM мы увеличили количество обработанных заказов на 45%. Система окупилась за первый месяц работы!"</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">АИ</div>
                        <div class="author-info">
                            <h5>Алексей Иванов</h5>
                            <p>Директор, AquaLife</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial">
                    <p class="testimonial-text">"Удобная система для управления подписками. Клиенты довольны автоматическими напоминаниями, а мы забыли про Excel таблицы."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">МС</div>
                        <div class="author-info">
                            <h5>Мария Соколова</h5>
                            <p>Владелец, WaterPro</p>
                        </div>
                    </div>
                </div>

                <div class="testimonial">
                    <p class="testimonial-text">"Отличная аналитика! Теперь мы видим все узкие места бизнеса и можем быстро реагировать на изменения спроса."</p>
                    <div class="testimonial-author">
                        <div class="testimonial-avatar">ДП</div>
                        <div class="author-info">
                            <h5>Дмитрий Петров</h5>
                            <p>CEO, Crystal Water</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing scroll-reveal" id="pricing">
        <div class="container">
            <h2 class="section-title">Выберите подходящий план</h2>
            <p class="section-subtitle">Гибкие тарифы для бизнеса любого масштаба</p>

            <div class="pricing-grid">
                <div class="pricing-card">
                    <h3>Старт</h3>
                    <div class="pricing-price">$49</div>
                    <p class="pricing-period">в месяц</p>
                    <ul class="pricing-features">
                        <li>До 100 клиентов</li>
                        <li>До 500 заказов/месяц</li>
                        <li>Базовая аналитика</li>
                        <li>Email поддержка</li>
                        <li>1 пользователь</li>
                    </ul>
                    <button class="btn btn-outline btn-large" style="width: 100%;" onclick="alert('Регистрация на тариф Старт...')">Начать</button>
                </div>

                <div class="pricing-card featured">
                    <div class="pricing-badge">Популярный</div>
                    <h3>Профессионал</h3>
                    <div class="pricing-price">$99</div>
                    <p class="pricing-period">в месяц</p>
                    <ul class="pricing-features">
                        <li>До 500 клиентов</li>
                        <li>До 2000 заказов/месяц</li>
                        <li>Расширенная аналитика</li>
                        <li>Приоритетная поддержка</li>
                        <li>До 5 пользователей</li>
                        <li>Автоматизация доставки</li>
                        <li>Управление подписками</li>
                    </ul>
                    <button class="btn btn-primary btn-large" style="width: 100%;" onclick="alert('Регистрация на тариф Профессионал...')">Начать</button>
                </div>

                <div class="pricing-card">
                    <h3>Корпоративный</h3>
                    <div class="pricing-price">$249</div>
                    <p class="pricing-period">в месяц</p>
                    <ul class="pricing-features">
                        <li>Неограниченно клиентов</li>
                        <li>Неограниченно заказов</li>
                        <li>Полная аналитика + BI</li>
                        <li>Персональный менеджер</li>
                        <li>Неограниченно пользователей</li>
                        <li>API интеграции</li>
                        <li>Кастомизация системы</li>
                        <li>Обучение команды</li>
                    </ul>
                    <button class="btn btn-outline btn-large" style="width: 100%;" onclick="alert('Связь с менеджером для корпоративного тарифа...')">Связаться</button>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta scroll-reveal">
        <div class="cta-content">
            <h2>Начните управлять бизнесом доставки воды прямо сейчас</h2>
            <p>Присоединяйтесь к сотням бизнесов, которые уже используют ObRason CRM</p>
            <div class="hero-buttons">
                <button class="btn btn-success btn-large" onclick="alert('Активация демо-версии...')">Попробовать демо</button>
                <button class="btn btn-large" style="background: white; color: var(--primary);" onclick="alert('Менеджер свяжется с вами в ближайшее время!')">Связаться с менеджером</button>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact">
        <div class="footer-container">
            <div class="footer-section">
                <h4>ObRason CRM</h4>
                <p>Профессиональная система управления бизнесом доставки воды</p>
                <div class="social-icons">
                    <a href="#" class="social-icon">📘</a>
                    <a href="#" class="social-icon">📷</a>
                    <a href="#" class="social-icon">✈️</a>
                    <a href="#" class="social-icon">🔗</a>
                </div>
            </div>

            <div class="footer-section">
                <h4>Контакты</h4>
                <p>📧 sales@obrason-crm.tj</p>
                <p>📞 +992 123 456 789</p>
                <p>💬 Онлайн чат поддержки</p>
                <p>📍 г. Худжанд, ул. Ленина, 123</p>
            </div>

            <div class="footer-section">
                <h4>Ресурсы</h4>
                <a href="#">FAQ - Часто задаваемые вопросы</a>
                <a href="#">Документация API</a>
                <a href="#">Видео-уроки</a>
                <a href="#">База знаний</a>
                <a href="#">Блог</a>
            </div>

            <div class="footer-section">
                <h4>Компания</h4>
                <a href="#">О нас</a>
                <a href="#">Тарифы</a>
                <a href="#">Партнёрская программа</a>
                <a href="#">Политика конфиденциальности</a>
                <a href="#">Условия использования</a>
            </div>
        </div>

        <div class="footer-bottom">
            <p>© 2025 ObRason CRM. Все права защищены.</p>
        </div>
    </footer>

    <script>
        // Scroll reveal animation
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.scroll-reveal').forEach(el => {
            observer.observe(el);
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Header scroll effect
        let lastScroll = 0;
        window.addEventListener('scroll', () => {
            const header = document.querySelector('.header');
            const currentScroll = window.pageYOffset;

            if (currentScroll > 100) {
                header.style.padding = '0.5rem 0';
                header.style.boxShadow = '0 4px 30px rgba(0,0,0,0.15)';
            } else {
                header.style.padding = '1rem 0';
                header.style.boxShadow = '0 2px 20px rgba(0,0,0,0.08)';
            }

            lastScroll = currentScroll;
        });

        // Animate preview bars
        setInterval(() => {
            const bars = document.querySelectorAll('.preview-bar');
            bars.forEach(bar => {
                const randomHeight = Math.floor(Math.random() * 60) + 30;
                bar.style.height = randomHeight + '%';
                bar.style.transition = 'height 0.5s ease';
            });
        }, 3000);
    </script>
</body>
</html>

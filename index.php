<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Простая валидация телефона
    $phone = $_POST['phone'];
    if (!preg_match("/^[0-9+\-\s()]+$/", $phone)) {
        echo '<div style="background:#f8d7da; padding:1.5rem; border-radius:8px; margin-bottom:2rem; text-align:center;color:#721c24;">
              Ошибка: некорректный формат телефона!</div>';
    } else {
        // существующий код вывода успеха
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ДДТ "Радуга" — Мир творчества</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <div class="header-content">
        <div class="logo-icon"><i class="fas fa-rainbow"></i></div>
        <h1>Дом детского творчества "Радуга"</h1>
        <p>Творчество • Развитие • Радость</p>
        <a href="#enroll" class="btn btn-white">Записаться сейчас</a>
    </div>
    <div class="wave"></div>
</header>

<div class="container">

    <section id="programs">
        <div class="section-header">
            <h2>Наши кружки и секции</h2>
            <p class="subtitle">Выберите направление, которое раскроет талант вашего ребенка</p>
        </div>
        
        <div class="cards">
   <?php
$programs = [
    [
        'title' => 'Художественная студия',
        'age' => '6–14 лет',
        'desc' => 'Рисование, лепка, аппликация. Развиваем творческое мышление и мелкую моторику.',
        'img_file' => 'photos/1.jpg' // Файл для первой карточки
    ],
    [
        'title' => 'Танцевальный кружок',
        'age' => '5–12 лет',
        'desc' => 'Современные и народные танцы. Грация, ритм и хорошее настроение!',
        'img_file' => 'photos/2.jpg' // Файл для второй карточки
    ],
    [
        'title' => 'Робототехника и программирование',
        'age' => '8–15 лет',
        'desc' => 'Собираем роботов на LEGO, учимся программировать на Scratch и Python.',
        'img_file' => 'photos/3.jpg' // Файл для третьей карточки
    ],
    [
        'title' => 'Театральная студия',
        'age' => '7–16 лет',
        'desc' => 'Актерское мастерство, сценическая речь, постановка спектаклей.',
        'img_file' => 'photos/4.jpg' // Файл для четвертой карточки
    ]
];

foreach ($programs as $prog) {
    echo '
    <div class="card">
        <div class="card-img" style="background-image: url(\''.$prog['img_file'].'\'); background-size: cover; background-position: center;"></div>
        <div class="card-body">
            <h3>'.$prog['title'].'</h3>
            <p><strong>Возраст:</strong> '.$prog['age'].'</p>
            <p>'.$prog['desc'].'</p>
            <a href="#enroll" class="btn">Записаться</a>
        </div>
    </div>';
}
?>
</div>
    </section>

    <section id="enroll">
        <div class="form-wrapper">
            <div class="form-text">
                <h2>Запись на кружок</h2>
                <p>Оставьте заявку, и наши преподаватели свяжутся с вами для уточнения расписания.</p>
                <div class="contact-info">
                    <p><i class="fas fa-phone-alt"></i> +7 (999) 123-45-67</p>
                    <p><i class="fas fa-map-marker-alt"></i> ул. Творческая, д. 1</p>
                </div>
            </div>

            <div class="form-container">
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    echo '<div class="success-message">
                          <i class="fas fa-check-circle"></i>
                          <div>
                              <strong>Заявка принята!</strong><br>
                              Ждем <strong>'.htmlspecialchars($_POST['child_name']).'</strong> на занятиях!
                          </div>
                          </div>';
                }
                ?>

                <form method="POST" action="#enroll">
                    <div class="form-group">
                        <label for="child_name">ФИО ребёнка</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-child"></i>
                            <input type="text" id="child_name" name="child_name" placeholder="Иванов Иван" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="age">Возраст</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-birthday-cake"></i>
                            <input type="number" id="age" name="age" min="5" max="18" placeholder="Лет" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="program">Выберите кружок</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-shapes"></i>
                            <select id="program" name="program" required>
                                <option value="">— Направление —</option>
                                <option>Художественная студия</option>
                                <option>Танцевальный кружок</option>
                                <option>Робототехника и программирование</option>
                                <option>Театральная студия</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="parent_name">ФИО родителя</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-user"></i>
                            <input type="text" id="parent_name" name="parent_name" placeholder="Иванова Мария" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone">Телефон</label>
                        <div class="input-icon-wrap">
                            <i class="fas fa-mobile-alt"></i>
                            <input type="tel" id="phone" name="phone" placeholder="+7 (___) ___-__-__" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        Отправить заявку <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </section>

</div>

<footer>
    <div class="footer-content">
        <p>&copy; 2025 Дом детского творчества "Радуга".</p>
        <div class="socials">
            <a href="#"><i class="fab fa-vk"></i></a>
            <a href="#"><i class="fab fa-telegram"></i></a>
        </div>
    </div>
</footer>

</body>
</html>
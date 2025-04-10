
<header class="header contain-to-grid">
    <nav class="top-bar" data-topbar>

        <section class="top-bar-section">
            <!-- Left Nav Section -->
            <ul class="left">
                <li class="name">
                    <h1><a href="/">SMS</a></h1>
                </li>
                <li class="item "><a href="studentsPage.php">Students</a></li>
                <li class="item "><a href="sectionsPage.php">Sections</a></li>
                <?php
                if ($connected)
                    echo '<li class="item "><a href="logout.php">Logout ('.$_SESSION['user'].')</a></li>';
                else
                    echo '<li class="item "><a href="login.php">Login</a></li>';
                ?>
            </ul>
        </section>
    </nav>
</header>

<?php session_start(); ?>
<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="/Pluers.github.io/style/header.css">
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/gh/wazybr/fluentui-system-icons-font/webfonts/css/fluent-icons-filled-20.css">
        <link rel="stylesheet" href="/Pluers.github.io/fonts/icons.woff">
    </head>

    <nav>
        <div>
            <ul class="main_panel">
                <li class="calendar">
                    <a href="/Pluers.github.io/"><i class="fluent-icons-filled-20">calendar</i> Calendar</a>
                </li>
            </ul>


            <ul class="admin_panel">
                <?php
                if (isset($_SESSION['username'])) {
                    ?>
                    <li class="link_event_band">
                        <a href="/Pluers.github.io/pages/link_event_band.php">
                            Link Event & Band</a>
                    </li>
                    <li class="create_event">
                        <a href="/Pluers.github.io/pages/create_event.php">
                            Create Event</a>
                    </li>
                    <li class="create_band">
                        <a href="/Pluers.github.io/pages/create_band.php"><span class="icon-guitar"></span>
                            Create Band</a>
                    </li>

                    <?php
                }
                if (isset($_SESSION['username'])) { ?>
                    <li class="account">
                        <a href="/Pluers.github.io/admin/account.php"><i class="fluent-icons-filled-20">person</i>
                            <?php echo ' ' . $_SESSION['username']; ?>
                        </a>
                    </li>
                    <?php
                } else { ?>
                    <li class="login">
                        <a href="/Pluers.github.io/admin/login.php"><i class="fluent-icons-filled-20">person_arrow_right</i>
                            log in</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </nav>

</html>
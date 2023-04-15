<?php session_start(); ?>
<!DOCTYPE html>
<html>

    <head>
        <link rel="stylesheet" href="/Pluers.github.io/style/header.css">
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/gh/wazybr/fluentui-system-icons-font/webfonts/css/fluent-icons-filled-20.css">
        <link rel="stylesheet"
            href="https://cdn.jsdelivr.net/gh/wazybr/fluentui-system-icons-font/webfonts/css/fluent-icons-regular-20.css">
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

                            <svg width="20" height="20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M7.586 8.004H4a1 1 0 0 1 0-2h4a1 1 0 0 1 .707.293L13.414 11h5.17l-3.29-3.289a1 1 0 0 1 1.413-1.414l5 4.996a1 1 0 0 1 0 1.414l-5 5a1 1 0 0 1-1.414-1.414L18.586 13h-5.172l-4.707 4.707A1 1 0 0 1 8 18H4a1 1 0 0 1 0-2h3.586l4-4-4-3.996Z"
                                    fill="#212121" />
                            </svg>
                            Link Event & Band</a>
                    </li>
                    <li class="create_event">
                        <a href="/Pluers.github.io/pages/create_event.php"><i class="fluent-icons-filled-20">balloon</i>
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
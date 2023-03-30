<!DOCTYPE html>
<html>

    <style>
        :root {
            --navbar-padding: 1rem;
            --border-radius: 11px;
            --border-radius-small: 6px;
            --navbar-height: 14px;
            --navbar-main-color: #e4e4e4;
            --navbar-admin-color: #c4f3ff;
            --button-transition: filter ease-in-out 0.2s;
            --button-filter-brightness: brightness(0.9);
        }

        body {
            margin: unset;
            padding: unset;
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Main bar */
        ul {
            list-style-type: none;
            margin: unset;
            overflow: hidden;
            background-color: var(--navbar-main-color);
            padding: var(--navbar-padding);
            border-radius: 0 0 var(--border-radius-small) var(--border-radius-small);
        }


        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: var(--navbar-height) 16px;
            text-decoration: none;
            font-weight: bold;
        }

        li,
        li a,
        div {
            border-radius: var(--border-radius-small);
        }

        /*buttons */
        /*calendar button */
        .calendar:hover {
            filter: var(--button-filter-brightness);
            -webkit-transition: var(--button-transition);
        }

        .calendar {
            background-color: grey;
            -webkit-transition: var(--button-transition);
        }

        /* Admin */

        .admin_panel {
            background-color: var(--navbar-admin-color);
            border-radius: var(--border-radius-small);
            position: absolute;
            right: 0;
            top: 0;
        }



        /*buttons */
        .admin_panel li {
            margin: 0 5px;
        }

        .admin_panel li,
        .admin_panel li a {
            -webkit-transition: var(--button-transition);
        }

        .admin_panel li:hover,
        .admin_panel li a:hover {
            filter: var(--button-filter-brightness);
            -webkit-transition: var(--button-transition);
        }

        .link_event_band,
        .link_event_band a {
            background-color: #a6affe;
            color: #000b67;
        }

        .create_event,
        .create_event a {
            background-color: #feeca6;
            color: #777700;
        }

        .create_band,
        .create_band a {
            background-color: #a6fea6;
            color: #047e00;
        }

        .login,
        .login a {
            background-color: #ff8b8b;
            color: #7a0000;
        }
    </style>

    <head>
        <div>
            <ul>
                <li class="calendar">
                    <a href="/Pluers.github.io/">Calendar</a>
                </li>
            </ul>
            <ul class="admin_panel">
                <li class="link_event_band">
                    <a href="/Pluers.github.io/pages/link_event_band.php">Link Event & Band</a>
                </li>
                <li class="create_event">
                    <a href="/Pluers.github.io/pages/create_event.php">Create Event</a>
                </li>
                <li class="create_band">
                    <a href="/Pluers.github.io/pages/create_band.php">Create Band</a>
                </li>
                <li class="login">
                    <a href="/Pluers.github.io/admin/login.php">log in</a>
                </li>
            </ul>
        </div>
    </head>

</html>
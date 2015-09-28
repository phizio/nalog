<header>
    <div class="container">
        <div class="logo"><a class="brand" href="/"> <img src="images/cleanstart_logo.png" alt="optional logo"> <span class="logo_title">ТатЮрЗащита</span></a></div>

        <!-- MAIN MENU -->

        <div id="mainmenu" class="menu_container">
            <label class="mobile_collapser">MENU</label>
            <!-- Mobile menu title -->
            <ul>
                <li class="<?= ($self == 'index.php') ? 'active' : '' ?>"><a href="/">Главная</a></li>
                <li class="<?= ($self == 'ceny.php') ? 'active' : '' ?>"><a href="/ceny">Цены</a></li>

                <?  if ($user['id']) { ?>
                    <li class="<?= ($self == 'profile.php') ? 'active' : '' ?>">
                        <a href="/profile">
                            <?= $user['name'] ?>
                        </a>
                    </li>
                    <li><a href="?act=quit" title="Выход"><i class="fa fa-sign-out"></i></a></li>
                <?  } else { ?>
                    <li class="<?= ($self == 'login.php') ? 'active' : '' ?>">
                        <a href="/login">
                            <i class="fa fa-power-off"></i> Кабинет
                        </a>
                    </li>
                <?  } ?>
            </ul>
        </div>

        <!-- /MAIN MENU -->

        <div class="triangle-up-left"></div>
        <div class="triangle-up-right"></div>
    </div>
</header>

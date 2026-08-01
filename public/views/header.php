<header class="padding">
    <h1>Plankton <?= get_version()?></h1>
    <nav>
        <a class="<?= activeIfRouteActive(['home'])?>" href="/">Home</a>
        <a class="<?= activeIfRouteActive(['help'])?>" href="/help">Help</a>
        <a class="<?= activeIfRouteActive(['editor'])?>" href="/editor?gameName=test_game_name">Editor</a>
        <a class="<?= activeIfRouteActive(['login', 'register'])?>" href="/login">Login</a>
    </nav>
</header>

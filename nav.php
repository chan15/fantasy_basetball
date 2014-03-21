<div class="navbar">
    <div class="navbar-inner">
        <ul class="nav">
            <li <?php if ($page == 'match') { ?>class="active"<?php } ?>><a href="index.php">Match Data</a></li>
            <li class="divider-vertical"></li>
            <li <?php if ($page == 'injury') { ?>class="active"<?php } ?>><a href="injury.php">Injury Data</a></li>
            <li class="divider-vertical"></li>
            <li <?php if ($page == 'player') { ?>class="active"<?php } ?>><a href="player.php">Player Data</a></li>
        </ul>
    </div>
</div>

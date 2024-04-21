<?php
require_once('Game.php');

list($players, $name) = \SubmitQuest\Game::preparation();

\SubmitQuest\Game::war($players, $name);

<?php
require_once('Game.php');

list($players, $name) = Game::preparation();

Game::war($players, $name);

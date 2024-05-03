<?php
require_once('Game.php');

$players = Game::preparation();

Game::war($players);

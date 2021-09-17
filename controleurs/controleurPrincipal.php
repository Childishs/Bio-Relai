<?php

$_SESSION['controleurN1'] = 'visiteurs';

include_once dispatcher::dispatch($_SESSION['controleurN1']);
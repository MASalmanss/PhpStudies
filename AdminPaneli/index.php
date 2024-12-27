<?php
include_once("./Class/FU.php");
include_once("./Class/VT.php");
VT::select(["Ela", "Lale", "El", "Ele"]);
print_r(VT::$select);

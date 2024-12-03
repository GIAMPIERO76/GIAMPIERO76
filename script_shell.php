<!--script shell_exec inserimento comandi shell linux-->
<?php
$result1=shell_exec("dmesg | grep usb");
$result2=shell_exec("ls -la/dev/ttyS*");
$result3=shell_exec("gcc -O lptout.c -o lptout.c ");
$result4=shell_exec("cp lptout / usr / sbin / lptout ");
$result5=shell_exec("chmod + s / usr / sbin / lptout ");
echo($result1);
echo($result2);
echo($result3);
echo($result4);
echo($result5);

?>
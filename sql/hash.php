<?php
    echo password_hash('admin',PASSWORD_DEFAULT);   //user: userdemo, pass: userdemo
    // $2y$10$93ofAraZ0hv7p1G8Awbr1OyTlB9MOncR6iWvJ/DbihaksaLgIySI6
    printf("        /////      "); 
    echo password_hash('test1',PASSWORD_DEFAULT);   //user: testone, pass: test
    printf("m      /////       "); 
    echo password_hash('username',PASSWORD_DEFAULT);  //user: testtwo, pass: 12345
?>
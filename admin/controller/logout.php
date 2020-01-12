<?php

session_destroy();//sonlandır
header('Location:' . admin_url('login'));//logine yönlendir
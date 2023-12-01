<?php
session_start();
session_unset();
echo '<script>
    alert("Admin has been successfully logged out!!!!");
    window.location.href="admin.html";

</script>'



?>
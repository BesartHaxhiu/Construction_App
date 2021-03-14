<?php session_start() ?>
<nav>
        <div class="container">
        <a style="color: white">Home</a>
        <a href="./includes/machines/machines.php">Machines</a>
        <a href="./includes/tools/tools.php">Tools</a>
        <?php if(isset($_SESSION['id']) && $_SESSION['id']): ?>
        <a href="./includes/auth/logout.php" class="authLink">Logout</a>
        <?php else: ?>
        <a href="./includes/auth/login.php" class="authLink">Login</a>
        <?php endif; ?>
        </div>
</nav>


                                
                  
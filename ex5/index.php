<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    div{
        width:fit-content;
        height:fit-content;
        margin:auto;
        padding:20px;
    }
    button{
        float:right;
    }
    a{
        position:absolute;
        bottom:0;
        right:0;
    }

</style>
<body>
    <div class="alert alert-info">
        <form method='post' action='login.php'>
            email:<br>
            <input type="email" name="email">
            <br>
            password:<br>
            <input type="password" name="password">
            <br>
            <br>
            <button type="submit">Login</button>
            <br>
        </form>
    </div>
    <a href="./addUserForm.php">
        <button>Add user</button>
    </a>
</body>
<?php


?>
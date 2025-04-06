<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    div{
        width:fit-content;
        height:fit-content;
        margin:auto;
        margin-top: 5%;
        text-align: left;
        padding:20px;
    }
    #loginButton{
        float:right;
    }
    

</style>
<body class="text-center">
    <div class="alert alert-info">
        <form method='post' action='login.php'>
            email:<br>
            <input type="email" name="email">
            <br>
            password:<br>
            <input type="password" name="password">
            <br>
            <br>
            <button type="submit" id="loginButton" class="btn btn-primary">Login</button>
            <br>
        </form>
    </div>
    <a href="./addUserForm.php">
        <button class="btn btn-primary">Sign up</button>
    </a>
</body>
<?php


?>
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
    p{
        color:red;
    }

</style>
<body>
    <div class="alert alert-warning">
        <?php
            if( isset($_GET['errorMsg']) ){
                echo "<p>$_GET[errorMsg]<p>";
            }
        ?>
        <form method='post' action='addUser.php'>
            
            username:<br>
            <input type="text" name="username">
            <br>
            user:
            <input type="radio" name="role" value="user" checked=true>
            admin:
            <input type="radio" name="role" value="admin">
            <br>
            <br>
            email:<br>
            <input type="email" name="email">
            <br>
            password:<br>
            <input type="password" name="password1">
            <br>
            retype password:<br>
            <input type="password" name="password2">
            <br>
            <br>
            <button type="submit" class="btn btn-primary">Add user</button>
            <br>
        </form>
    </div>
    <a href="./index.php">
        <button class="btn btn-primary">go back</button>
    </a>
</body>

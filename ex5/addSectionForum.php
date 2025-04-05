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
        <form method='post' action='addSection.php'>
            designation:<br>
            <input type="text" name="designation" required>
            <br>
            
            description:<br>
            <input type="text" name="description" required>
            <br>
            <button type="submit">Add Section</button>
            <br>
        </form>
    </div>
    <a href="./sectionList.php">
        <button>go back</button>
    </a>
</body>

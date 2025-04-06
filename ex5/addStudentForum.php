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
        <form method='post' action='addStudent.php' enctype="multipart/form-data">
            Student name:<br>
            <input type="text" name="StudentName" required>
            <br>
            birthday:<br>
            <input type="date" name="birthday" required>
            <br>
            image:<br>
            <input type="file" class="form-control" name="image" required>
            Section:<br>
            <input type="number" name="Section" required>
            <br>
            <button type="submit" class="btn btn-primary">Add Student</button>
            <br>
        </form>
    </div>
    <a href="./studentList.php">
        <button class="btn btn-primary">go back</button>
    </a>
</body>

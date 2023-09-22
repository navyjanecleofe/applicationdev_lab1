<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #FFFEC4;
        }

        .container {
            width: 80%; /* Changed container width to a reasonable value */
            margin: 0 auto;
            padding: 20px; /* Increased padding for better spacing */
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Add a shadow */
        }

        h1 {
            text-align: center;
        }

        form {
            margin-top: 20px; /* Adjusted margin-top */
            text-align: center; /* Center align form content */
            
        }

        label {
            display: block;
            margin-bottom: 5px;
            margin-right: 850px;
            font-size: 20px;
        }

        input[type="text"], select {
        width: 85%;
        padding: 8px;
        margin: 5px auto; /* Center horizontally and add some vertical margin */
        border: 1px solid #ccc;
        border-radius: 3px;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.3); /* Add a shadow */
        }


        input[type="submit"] {
            background-color: #FF6969;
            width: 20%;
            height: 35px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            margin-top: 10px; /* Added margin-top for spacing */
            margin-right: 720px;
        }

        input[type="submit"]:hover {
            background-color: #FF4040;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 2px solid #000;
        }

        th {
            background-color: #FEA1A1;
            color: black;
        }

        div {
            width: 80%;
            margin: 20px auto; /* Center the div horizontally */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            
        }

        /* Define button styles */
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-right: 10px;
        }

        /* Style for delete button */
        .delete-button {
            background-color: #ff0000;
        }

        /* Style for update button */
        .update-button {
            background-color: #4caf50;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Students Information</h1>
    <form action="<?= base_url("Save") ?>" method="post">
        <?php if(isset($d['id'])){?>
            <input type="hidden" name="id" value="<?=$d['id']?>">
        <?php }?>

        <label for="StudName">Name:</label>
        <input type="text" id="StudName" name="StudName" required value="<?= isset($d['StudName']) ? $d['StudName'] : '' ?>">
       
        <label for="StudGender">Gender:</label>
        <select id="StudGender" name="StudGender" required>
            <option value=" " <?= isset($d['StudGender']) && $d['StudGender'] === '' ? 'selected' : '' ?>></option>
            <option value="MALE" <?= isset($d['StudGender']) && $d['StudGender'] === 'MALE' ? 'selected' : '' ?>>MALE</option>
            <option value="FEMALE" <?= isset($d['StudGender']) && $d['StudGender'] === 'FEMALE' ? 'selected' : '' ?>>FEMALE</option>
        </select>

        <label for="StudCourse">Course:</label>
        <input type="text" id="StudCourse" name="StudCourse" required value="<?= isset($d['StudCourse']) ? $d['StudCourse'] : '' ?>">

        <label for="StudSection">Section:</label>
        <select id="StudSection" name="StudSection" required>
            <option value=" " <?= isset($d['StudGender']) && $d['StudGender'] === '' ? 'selected' : '' ?>></option>
            <option value="F1" <?= isset($d['StudSection']) && $d['StudSection'] === 'F1' ? 'selected' : '' ?>>F1</option>
            <option value="F2" <?= isset($d['StudSection']) && $d['StudSection'] === 'F2' ? 'selected' : '' ?>>F2</option>
            <option value="F3" <?= isset($d['StudSection']) && $d['StudSection'] === 'F3' ? 'selected' : '' ?>>F3</option>
            <option value="F4" <?= isset($d['StudSection']) && $d['StudSection'] === 'F4' ? 'selected' : '' ?>>F4</option>
        </select>

        <label for="StudYear">Year:</label>
        <input type="text" id="StudYear" name="StudYear" required value="<?= isset($d['StudYear']) ? $d['StudYear'] : '' ?>">

        <input type="submit" value="Save">
    </form>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Course</th>
            <th>Section</th>
            <th>Year</th>
            <th>Action</th>
        </tr>

        <?php foreach($main as $student): ?>
            <tr>
                <td><?= $student['StudName'] ?></td>
                <td><?= $student['StudGender'] ?></td>
                <td><?= $student['StudCourse'] ?></td>
                <td><?= $student['StudSection'] ?></td>
                <td><?= $student['StudYear'] ?></td>
                <td>
                    <a href="delete/<?= $student['id'] ?>" class="button delete-button">Delete</a>
                    <a href="/update/<?= $student['id'] ?>" class="button update-button">Update</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
</body>
</html>

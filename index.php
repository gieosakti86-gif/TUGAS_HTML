<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mads web - Gunung Fuji</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Gunung Fuji di Jepang Indahnyoo</h1> 
    
    <div id="fuji-container">
        <div id="fuji-moving"></div>
    </div>

    <div style="text-align: center; margin: 20px 0;">
        <button id="btnStart">Start Animasi</button>
    </div>

    <table border="1">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Umur</th>
            </tr>
        </thead>
        <tbody id="table-body">
            <?php
            $query = mysqli_query($conn, "SELECT * FROM users ORDER BY id DESC");
            if (mysqli_num_rows($query) > 0) {
                while($data = mysqli_fetch_array($query)){
                    echo "<tr>
                            <td>".htmlspecialchars($data['nama'])."</td>
                            <td>".htmlspecialchars($data['umur'])."</td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='2'>Belum ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <br>

    <form id="myForm" action="proses.php" method="POST">
        <h3>Isi Data Dulu Ya:</h3>
        <label for="name">Nama:</label>
        <input type="text" id="name" name="name" required><br><br>
        
        <label for="age">Umur:</label>
        <input type="number" id="age" name="age" required><br><br>
        
        <input type="submit" value="Submit Data"> 
    </form>
            
    <script src="script.js"></script>
</body>
</html>
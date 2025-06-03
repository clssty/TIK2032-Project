<?php
include 'db_connect.php'; // Memasukkan file koneksi database

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $song_title = $_POST['song_title'];
    $your_name = $_POST['your_name'];
    // $comment = $_POST['comment']; // Baris ini harus dihapus atau dikomentari

    // Menyiapkan dan menjalankan query INSERT
    // Perhatikan: ada 2 tanda tanya (?) di VALUES, dan "ss" (2 string) di bind_param
    // Ini cocok dengan 2 variabel: $song_title dan $your_name
    $stmt = $conn->prepare("INSERT INTO song_submissions (song_title, your_name) VALUES (?, ?)");
    $stmt->bind_param("ss", $song_title, $your_name);

    if ($stmt->execute()) {
        //echo "Terima kasih! Lagu Anda telah berhasil disimpan.";
    } else {
        //echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    
    header("Location: blog.php"); // Redirect kembali ke halaman blog
    exit();
}
?>
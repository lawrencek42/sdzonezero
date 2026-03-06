<!doctype html>
<?php
if(isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];

    // Optional: save lead info
    $file = fopen("leads.csv","a");
    fputcsv($file, [$name, $email, date("Y-m-d H:i:s")]);
    fclose($file);

    // Serve the PDF for download
    $pdf = 'zone-zero-assessment.pdf'; // path to your PDF
    if(file_exists($pdf)){
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="zone-zero-assessment.pdf"');
        readfile($pdf);
        exit;
    } else {
        echo "Sorry, the file is not available.";
    }
} else {
    echo "Please fill out the form.";
}
?>
<?php
// Specify the local directory path
$imageDir = "/home/y/y909076y/y909076y.beget.tech/public_html/iptvimages/imagespl/"; // Adjust this path if needed
$baseUrl = "https://y909076y.beget.tech/iptvimages/imagespl/"; // Public URL for images

// Output text file
$outputFile = $imageDir . "image_links.txt";

// Define valid image extensions
$validExtensions = ['png', 'jpg', 'jpeg', 'gif', 'bmp', 'webp', 'svg'];

// Check if the directory exists and is readable
if (is_dir($imageDir)) {
    if (is_readable($imageDir)) {
        // Open the output file for writing
        $fileHandle = fopen($outputFile, "w");
        if ($fileHandle === false) {
            die("Unable to open output file for writing.");
        }

        // Open the image directory
        $dirHandle = opendir($imageDir);
        if ($dirHandle) {
            // Loop through the files in the directory
            while (($file = readdir($dirHandle)) !== false) {
                // Get the file extension and check if it is a valid image file
                $fileExtension = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (in_array($fileExtension, $validExtensions)) {
                    // Generate the full URL
                    $fullUrl = $baseUrl . $file;
                    // Write the image name and URL to the output file
                    fwrite($fileHandle, $file . " - " . $fullUrl . "\n");
                }
            }
            // Close the directory handle
            closedir($dirHandle);
        } else {
            die("Unable to open the specified directory.");
        }

        // Close the output file handle
        fclose($fileHandle);
        echo "Text file created: $outputFile\n";
    } else {
        die("Specified directory is not readable. Check permissions.");
    }
} else {
    die("Specified directory does not exist: $imageDir");
}
?>

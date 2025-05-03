<?php
// Function to scan directory and get images, including subfolders (one level deep)
function getImagesFromDirectory($dir) {
    $images = [];
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    
    // Try different possible paths
    $possible_paths = [
        $dir,
        '../' . $dir,
        './' . $dir,
        __DIR__ . '/../' . $dir
    ];
    
    $found_path = null;
    foreach ($possible_paths as $path) {
        if (is_dir($path)) {
            $found_path = $path;
            break;
        }
    }
    
    if (!$found_path) {
        echo "<!-- Debug: Could not find directory. Tried paths: " . implode(', ', $possible_paths) . " -->";
        return $images;
    }
    
    // Check the gallery directory
    $gallery_dir = $found_path . '/gallery';
    if (!is_dir($gallery_dir)) {
        echo "<!-- Debug: Gallery directory not found at: $gallery_dir -->";
        return $images;
    }
    
    $folders = array_diff(scandir($gallery_dir), ['.', '..']);
    echo "<!-- Debug: Found " . count($folders) . " folders in gallery directory -->";
    
    foreach ($folders as $folder) {
        $folder_path = $gallery_dir . '/' . $folder;
        if (is_dir($folder_path)) {
            // Check if this folder contains images (album)
            $files = array_diff(scandir($folder_path), ['.', '..']);
            $images_in_folder = [];
            foreach ($files as $file) {
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (in_array($ext, $allowed_types)) {
                    $relative_path = 'images/gallery/' . $folder . '/' . $file;
                    $images_in_folder[] = [
                        'src' => $relative_path,
                        'alt' => ucwords(str_replace(['-', '_'], ' ', $folder)) . ' - ' . ucwords(str_replace(['-', '_'], ' ', pathinfo($file, PATHINFO_FILENAME))),
                        'category' => $folder
                    ];
                }
            }
            if (!empty($images_in_folder)) {
                $images[$folder] = $images_in_folder[0];
            }
            // Check for subfolders (nested albums)
            $subfolders = array_diff(scandir($folder_path), ['.', '..']);
            foreach ($subfolders as $subfolder) {
                $subfolder_path = $folder_path . '/' . $subfolder;
                if (is_dir($subfolder_path)) {
                    $sub_files = array_diff(scandir($subfolder_path), ['.', '..']);
                    $sub_images_in_folder = [];
                    foreach ($sub_files as $file) {
                        $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                        if (in_array($ext, $allowed_types)) {
                            $relative_path = 'images/gallery/' . $folder . '/' . $subfolder . '/' . $file;
                            $sub_images_in_folder[] = [
                                'src' => $relative_path,
                                'alt' => ucwords(str_replace(['-', '_'], ' ', $subfolder)) . ' - ' . ucwords(str_replace(['-', '_'], ' ', pathinfo($file, PATHINFO_FILENAME))),
                                'category' => $subfolder
                            ];
                        }
                    }
                    if (!empty($sub_images_in_folder)) {
                        $images[$folder . '/' . $subfolder] = $sub_images_in_folder[0];
                    }
                }
            }
        }
    }
    
    return $images;
}

// Get one featured image per folder/category
$featured_images = getImagesFromDirectory('images');
echo "<!-- Debug: Found " . count($featured_images) . " featured categories -->";

// Display the featured images as covers
if (!empty($featured_images)) {
    echo '<div class="gallery-grid">';
    foreach ($featured_images as $category => $image) {
        $album_slug = urlencode(str_replace(' ', '-', $category));
        echo '<div class="gallery-item animate-fade-in" data-category="' . htmlspecialchars($category) . '">';
        echo '<a href="gallery.php?album=' . $album_slug . '" class="gallery-link">';
        echo '<img src="' . htmlspecialchars($image['src']) . '" alt="' . htmlspecialchars($image['alt']) . '" class="gallery-image">';
        echo '<div class="gallery-overlay">';
        echo '<h3>' . htmlspecialchars(basename($category)) . '</h3>';
        echo '</div>';
        echo '</a>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<p class="no-images animate-fade-in">No images found in the gallery. Please check the images directory structure.</p>';
    echo '<!-- Debug: Current working directory: ' . getcwd() . ' -->';
}
?> 
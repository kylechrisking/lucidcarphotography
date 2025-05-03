<?php
// Helper: Convert album name to slug
function albumToSlug($name) {
    return str_replace(['/', ' '], '-', $name);
}
// Helper: Convert slug to album name
function slugToAlbum($slug) {
    return str_replace('-', ' ', str_replace('-', '/', $slug));
}

// Helper function to get album covers, including subfolders (two levels deep)
function getAlbumCovers($gallery_dir = 'images/gallery/') {
    $albums = [];
    if (is_dir($gallery_dir)) {
        $folders = array_diff(scandir($gallery_dir), ['.', '..']);
        foreach ($folders as $folder) {
            $folder_path = $gallery_dir . $folder;
            if (is_dir($folder_path)) {
                // Check if this folder contains images (album)
                $images = glob($folder_path . "/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
                if (!empty($images)) {
                    $albums[] = [
                        'name' => $folder,
                        'cover' => $images[0],
                        'is_event' => stripos($folder, 'event') !== false || stripos($folder, 'coffee') !== false
                    ];
                }
                // Check for subfolders (nested albums)
                $subfolders = array_diff(scandir($folder_path), ['.', '..']);
                foreach ($subfolders as $subfolder) {
                    $subfolder_path = $folder_path . '/' . $subfolder;
                    if (is_dir($subfolder_path)) {
                        $sub_images = glob($subfolder_path . "/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
                        if (!empty($sub_images)) {
                            $albums[] = [
                                'name' => $folder . '/' . $subfolder,
                                'cover' => $sub_images[0],
                                'is_event' => stripos($folder, 'event') !== false || stripos($subfolder, 'event') !== false || stripos($folder, 'coffee') !== false || stripos($subfolder, 'coffee') !== false
                            ];
                        }
                    }
                }
            }
        }
    }
    return $albums;
}

// Helper function to get all images in an album
function getAlbumImages($album, $gallery_dir = 'images/gallery/') {
    $folder = $gallery_dir . $album;
    $images = [];
    if (is_dir($folder)) {
        $images = glob($folder . "/*.{jpg,jpeg,png,gif}", GLOB_BRACE);
    }
    return $images;
}

$albums = getAlbumCovers();
$selected_album = null;
$album_images = [];
if (isset($_GET['album'])) {
    $album_slug = $_GET['album'];
    // Convert slug back to album path (replace - with / and spaces)
    $album_name = str_replace('-', ' ', str_replace('-', '/', $album_slug));
    foreach ($albums as $album) {
        if (albumToSlug($album['name']) === $album_slug) {
            $selected_album = $album['name'];
            break;
        }
    }
    if ($selected_album) {
        $album_images = getAlbumImages($selected_album);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery - Lucid Car Photography</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Add lightbox2 for image gallery -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">
</head>
<body>
    <?php include 'includes/header.php'; ?>

    <main class="gallery-page">
        <div class="gallery-container">
            <?php if ($selected_album && !empty($album_images)): ?>
                <h1><?php echo htmlspecialchars($selected_album); ?></h1>
                <p>Browse all photos from this album.</p>
                <div class="gallery-grid">
                    <?php foreach ($album_images as $img): ?>
                        <?php $title = pathinfo($img, PATHINFO_FILENAME); ?>
                        <div class="gallery-item">
                            <a href="<?php echo $img; ?>" data-lightbox="album" data-title="<?php echo htmlspecialchars($title); ?>">
                                <img src="<?php echo $img; ?>" alt="<?php echo htmlspecialchars($title); ?>" class="gallery-image">
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div style="margin-top:2rem;"><a href="gallery.php" class="cta-button">Back to Albums</a></div>
            <?php else: ?>
                <h1>Our Portfolio</h1>
                <p>Explore our collection of automotive photography</p>

                <div class="gallery-filters">
                    <button class="filter-btn active" data-filter="all">All</button>
                    <button class="filter-btn" data-filter="cars">Cars (entire gallery)</button>
                    <button class="filter-btn" data-filter="events">Events</button>
                </div>

                <div class="gallery-grid" id="album-grid">
                    <?php foreach ($albums as $album): ?>
                        <div class="gallery-item" data-category="<?php echo $album['is_event'] ? 'events' : 'cars'; ?>">
                            <a href="gallery.php?album=<?php echo urlencode(albumToSlug($album['name'])); ?>" class="gallery-link">
                                <img src="<?php echo $album['cover']; ?>" alt="<?php echo htmlspecialchars($album['name']); ?>" class="gallery-image">
                                <div class="gallery-overlay">
                                    <h3><?php echo htmlspecialchars(basename($album['name'])); ?></h3>
                                </div>
                            </a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
    <script src="js/main.js"></script>
    <script>
        // Album filtering
        document.addEventListener('DOMContentLoaded', function() {
            const filterButtons = document.querySelectorAll('.filter-btn');
            const galleryItems = document.querySelectorAll('#album-grid .gallery-item');
            filterButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const filterValue = button.getAttribute('data-filter');
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    button.classList.add('active');
                    galleryItems.forEach(item => {
                        if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html> 
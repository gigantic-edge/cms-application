<!DOCTYPE html>
<html lang="en">

<head>
    <?= $head; ?>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen bg-gray-100 flex flex-col text-xs"> <!-- Extra small font size globally -->
    <div class="flex flex-1 flex-col lg:flex-row">
        <!-- Sidebar -->
        <div class="lg:w-64">
            <?= $sidebar; ?>
        </div>
        <!-- Sidebar -->
        <div class="flex-1">
            <header class="bg-white shadow p-4 flex justify-between items-center lg:sticky top-0 z-10">
                <?= $header; ?>
            </header>
            <!-- Content Area -->
                <?= $maincontent; ?>
            <!-- Content Area -->
        </div>
    </div>
    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-auto">
        <?= $footer; ?>
    </footer>
    <!-- Footer -->
</body>

</html>

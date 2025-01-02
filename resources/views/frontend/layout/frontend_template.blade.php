<!DOCTYPE html>
<html lang="en">

<head>
    <?= $head ?>
</head>

<body class="bg-gray-100 font-sans min-h-screen flex flex-col">
    <!-- Navbar -->
    <nav class="bg-white shadow-md sticky top-0 z-10">
        <?= $navbar ?>
    </nav>

    <main class="flex-grow">
        <?= $maincontent ?>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-6 mt-auto">
        <?= $footer ?>
    </footer>

</body>

</html>

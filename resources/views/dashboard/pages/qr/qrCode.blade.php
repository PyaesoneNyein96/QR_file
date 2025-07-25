<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>QR Code Download</title>
    @vite(['resources/css/app.css'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-md text-center" x-data="{ copied: false }">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">📱 Scan to Download</h1>

        <div class="flex justify-center mb-4">
            <img src="{{ asset($file->qr_code) }}" alt="QR Code" class="w-32 h-32" />
        </div>

        <p class="text-gray-600 mb-4">Scan the QR code above to download the file directly to your device.</p>

        <div class="mt-4">
            <input type="text"
                class="w-full border px-4 py-2 rounded text-gray-500 text-sm bg-gray-100 cursor-pointer" readonly
                value="{{ asset($file->path) }}"
                @click="
                       navigator.clipboard.writeText($event.target.value);
                       copied = true;
                       setTimeout(() => copied = false, 1500);
                   " />

            <span x-show="copied" class="text-green-600 text-sm mt-1 block">Copied to clipboard!</span>
        </div>

        <a href="{{ route('dashboard.fileDownload', $file->id) }}"
            class="mt-6 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Download File
        </a>

        <a href="{{ route('dashboard.qrDownload', $file->id) }}"
            class="mt-6 inline-block bg-green-800 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Download QR Code
        </a>
    </div>

</body>

</html>

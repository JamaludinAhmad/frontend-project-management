
<?php
    $lokasi = $lokasi['data'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url('public/style/output.css'); ?>">
    <title>Create Proyek</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8">
        <div class="bg-white shadow-md rounded-lg p-6 max-w-md mx-auto">
            <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">Create New Lokasi</h2>
            <form method="POST" action="<?php echo site_url('index.php/lokasi/update/'.$lokasi['id']); ?>">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="nama_lokasi" id="nama_lokasi" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="<?php echo($lokasi['namaLokasi'])?>">
                    <label for="nama_lokasi" class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Lokasi</label>
                </div>
                
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="kota" id="kota" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="<?php echo($lokasi['kota'])?>">
                    <label for="kota" class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">Kota</label>
                </div>
                
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="provinsi" id="provinsi" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="<?php echo($lokasi['provinsi'])?>">
                    <label for="provinsi" class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">Provinsi</label>
                </div>
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="negara" id="negara" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="<?php echo($lokasi['negara'])?>">
                    <label for="negara" class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">Negara</label>
                </div>

                <button type="submit" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>
</html>

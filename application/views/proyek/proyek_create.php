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
            <h2 class="text-2xl font-semibold mb-6 text-center text-gray-800">Create New Proyek</h2>
            <form method="POST" action="<?php echo site_url('index.php/proyek/store'); ?>">
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="nama_proyek" id="nama_proyek" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
                    <label for="nama_proyek" class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">Nama Proyek</label>
                </div>
                
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="pimpinan_proyek" id="pimpinan_proyek" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
                    <label for="pimpinan_proyek" class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">Pimpinan Proyek</label>
                </div>
                
                <div class="relative z-0 w-full mb-6 group">
                    <input type="text" name="client" id="client" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required>
                    <label for="client" class="absolute text-sm text-gray-500 transform -translate-y-6 scale-75 top-3 peer-placeholder-shown:translate-y-0 peer-placeholder-shown:scale-100 peer-focus:scale-75 peer-focus:-translate-y-6">Client</label>
                </div>

                <div class="mb-6">
                    <label for="datepicker-start-date" class="block mb-2 text-sm font-medium text-gray-700">Start Date</label>
                    <div class="relative">
                        <input datepicker type="text" name="start-date" id="datepicker-start-date" class="block w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>
                
                <div class="mb-6">
                    <label for="datepicker-end-date" class="block mb-2 text-sm font-medium text-gray-700">End Date</label>
                    <div class="relative">
                        <input datepicker type="text" name="end-date" id="datepicker-end-date" class="block w-full px-4 py-2 border border-gray-300 rounded-lg text-gray-900 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                    </div>
                </div>

                <div x-data="multiSelect()" class="mb-6">
                    <label for="lokasi" class="block text-sm font-medium text-gray-700">Lokasi Proyek</label>
                    <div class="relative">
                        <input type="text" placeholder="Search..." class="block w-full px-4 py-2 mt-1 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                               x-model="search" @focus="isOpen = true" @keydown.escape="isOpen = false" @click.away="closeDropdown()">
                        <div class="absolute z-10 w-full mt-1 bg-white border border-gray-300 rounded-lg shadow-lg" 
                             x-show="isOpen" 
                             @mousedown.away="isOpen = false" 
                             style="display: none;">
                            <ul class="max-h-48 overflow-y-auto">
                                <template x-for="lokasi in filteredLokasi()" :key="lokasi.id">
                                    <li @click="selectLokasi(lokasi)" class="px-4 py-2 cursor-pointer hover:bg-gray-200" x-text="lokasi.label"></li>
                                </template>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-2">
                        <template x-for="selected in selectedLokasi" :key="selected.id">
                            <span class="inline-flex items-center px-3 py-0.5 mr-2 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                <span x-text="selected.label"></span>
                                <button type="button" class="ml-1 text-blue-500 hover:text-blue-800" @click="removeLokasi(selected.id)">
                                    &times;
                                </button>
                            </span>
                        </template>
                    </div>
                    <template x-for="selected in selectedLokasi" :key="selected.id">
                        <input type="hidden" name="lokasi[]" :value="selected.id">
                    </template>
                </div>

                <button type="submit" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg">Submit</button>
            </form>
        </div>
    </div>

    <script>
        function multiSelect() {
            return {
                isOpen: false,
                search: '',
                lokasiOptions: <?php echo json_encode(array_map(function($lokasi) {
                    return ['id' => $lokasi['id'], 'label' => $lokasi['namaLokasi'] . ', ' . $lokasi['kota'] . ', ' . $lokasi['provinsi'] . ', ' . $lokasi['negara']];
                }, $lokasi_list['data'])); ?>,
                selectedLokasi: [],
                
                filteredLokasi() {
                    return this.lokasiOptions.filter(option => option.label.toLowerCase().includes(this.search.toLowerCase()));
                },
                
                selectLokasi(lokasi) {
                    const alreadySelected = this.selectedLokasi.some(item => item.id === lokasi.id);
                    if (!alreadySelected) {
                        this.selectedLokasi.push(lokasi);
                    }
                    this.search = ''; 
                    this.isOpen = false;  
                },
                
                removeLokasi(id) {
                    this.selectedLokasi = this.selectedLokasi.filter(item => item.id !== id);
                },
                
                closeDropdown() {
                    if (!this.isOpen) return;
                    this.isOpen = false;
                },
                
                get selectedLokasiIds() {
                    console.log(this.selectedLokasi.map(item => item.id));
                    return this.selectedLokasi.map(item => item.id);
                }
            };
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</body>
</html>
